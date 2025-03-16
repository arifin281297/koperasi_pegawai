<?php
class Model extends CI_Model
{
	private $id = 0;
	private $table;
	private $fields = array();

	//function to select to database
	function query($query)
	{
		if ($this->session->userdata('logged_in') == true) {
			$return = $this->db->query($query);
			if ($return) {
				return $return->result();
			} else {
				echo 'failed to execute data';
			}
		} else {
			header("Refresh:0; url=" . base_url());
		}
	}

	function rendQuick($query, $data)
	{

		$page	  	= $data['page'] ?? 0;
		$pageSize 	= $data['pageSize'] ?? 0;
		$filters  	= $data['filter'] ?? '';
		$sort	  	= $data['sort'] ?? '';
		$aggregate	= $data['aggregate'] ?? '';

		$filterCondition = '';

		if (is_array($filters) && isset($filters['filters'])) {
			$logic = $filters['logic'] ?? '';
			$filterCount = count($filters['filters']);

			if ($filterCount > 0) {
				$filterCondition .= "WHERE (";
				for ($i = 0; $i < $filterCount; $i++) {
					if ($i > 0) {
						$filterCondition .= " $logic ";
					}

					if (isset($filters['filters'][$i]['filters'])) {
						$subFilterCount = count($filters['filters'][$i]['filters']);

						if ($subFilterCount > 0) {
							$filterCondition .= "(";
							for ($x = 0; $x < $subFilterCount; $x++) {
								if ($x > 0) {
									$subLogic = $filters['filters'][$i]['logic'] ?? '';
									$filterCondition .= " $subLogic ";
								}

								$field = $filters['filters'][$i]['filters'][$x]['field'];
								$operator = $filters['filters'][$i]['filters'][$x]['operator'];
								$value = $filters['filters'][$i]['filters'][$x]['value'];

								$filtering = $this->filterOperator($field, $operator, $value);

								// Modify the filter condition based on your database structure and the field being filtered
								$filterCondition .= "($filtering)";
							}
							$filterCondition .= ")";
						}
					} else {
						$field = $filters['filters'][$i]['field'];
						$operator = $filters['filters'][$i]['operator'];
						$value = $filters['filters'][$i]['value'];

						$filtering = $this->filterOperator($field, $operator, $value);

						// Modify the filter condition based on your database structure and the field being filtered
						$filterCondition .= "($filtering)";
					}
				}
				$filterCondition .= ")";
			}
		}

		$sortField = '';
		$sortDir = '';
		$sortCondition = '';

		if ($sort != '') {
			$sortCondition = 'ORDER BY ';

			foreach ($sort as $sortItem) {
				$sortField = $sortItem['field'];
				$sortDir = $sortItem['dir'];

				$sortCondition .= "$sortField $sortDir, ";
			}

			$sortCondition = rtrim($sortCondition, ', ');
		}

		// Aggregate conditions
		$aggregateField = '';
		$aggregateType = '';

		if ($aggregate != '') {
			$aggregateSql = "SELECT ";

			foreach ($aggregate as $aggregateItem) {
				$aggregateField = $aggregateItem['field'];
				$aggregateType = $aggregateItem['aggregate'];

				$aggregateSql .= "IFNULL($aggregateType($aggregateField),0) AS $aggregateField" . ", ";
			}

			$aggregateSql = rtrim($aggregateSql, ", ");
			$aggregateSql .= " FROM ($query) t_temp $filterCondition";

			$aggregateResult = $this->query($aggregateSql);

			// Create a new array to store the aggregate values
			$aggregatesData = array();

			if ($aggregateResult) {
				foreach ($aggregateResult as $aggregateRow) {
					// Loop through the aggregate rows and store them in the $aggregatesData array
					foreach ($aggregateRow as $field => $value) {
						$aggregatesData[$field] = $value;
					}
				}
			}

			$return['aggregates'] = $aggregatesData;
		}

		$sql = "SELECT * 
				FROM ($query) t_temp
				$filterCondition
				$sortCondition";

		// Apply pagination to the query
		$offset = ($page - 1) * $pageSize;
		$sql .= " LIMIT " . $offset . ", " . $pageSize;
		$return['data'] = $this->query($sql);

		// Get the total count of records
		$countSql = "SELECT COUNT(*) AS total_count
					FROM ($query) t_temp
					$filterCondition";
		$countResult = $this->query($countSql);
		if (!empty($countResult)) {
			$return['total'] = $countResult[0];
		}

		return $return;
	}

	function filterOperator($field, $operator, $value)
	{
		$date = DateTime::createFromFormat('D M d Y H:i:s e+', $value);
		if ($date !== false) {
			$value = $date->format('Y-m-d');
		} else {
			$value = $value;
		}

		// Check if $value contains '%'
		if (strpos($value, '%') !== false) {
			$value = str_replace('%', '\%', $value);
		}

		// Check if $value contains "'"
		if (strpos($value, "'") !== false) {
			$value = str_replace("'", "\'", $value);
		}

		if ($operator == 'contains') {
			$filtering = "$field LIKE '%$value%'";
		} else if ($operator == 'doesnotcontain') {
			$filtering = "$field NOT LIKE '%$value%'";
		} else if ($operator == 'neq') {
			$filtering = "$field != '$value'";
		} else if ($operator == 'gte') {
			$filtering = "$field >= '$value'";
		} else if ($operator == 'gt') {
			$filtering = "$field > '$value'";
		} else if ($operator == 'lte') {
			$filtering = "$field <= '$value'";
		} else if ($operator == 'lt') {
			$filtering = "$field < '$value'";
		} else if ($operator == 'isempty') {
			$filtering = "$field = ''";
		} else if ($operator == 'isnotempty') {
			$filtering = "$field != ''";
		} else if ($operator == 'isnull') {
			$filtering = "$field IS NULL OR $field = ''";
		} else if ($operator == 'isnotnull') {
			$filtering = "$field IS NOT NULL AND $field != ''";
		} else {
			$filtering = "$field = '$value'";
		}

		return $filtering;
	}
}
