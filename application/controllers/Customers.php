<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        date_default_timezone_set("Asia/Jakarta");
        error_reporting(E_ALL ^ E_DEPRECATED);
        ob_start();
    }

    public function index()
    {
        $data = array(
            'title' => 'Customer',
            'isi'   => 'back/v_customer'
        );
        $this->load->view('back/v_wrapper', $data);
    }

    function INQ()
    {
        $data['page']        = $this->input->post('page'); // Current page number
        $data['pageSize']    = $this->input->post('pageSize'); // Number of records to fetch per page
        $data['filter']     = $this->input->post('filter'); // Filter conditions
        $data['sort']         = $this->input->post('sort'); // Sort conditions
        $data['aggregate']     = $this->input->post('aggregate');

        $sql    = "SELECT  id_customer,
						   nama_customer,
						   alamat,
						   telp,
						   fax,
						   email
					FROM customer";

        $return = $this->Model->rendQuick($sql, $data);

        header("Content-type: application/json");
        echo json_encode($return);
    }

    function INQdataStatus($data)
    {
        $sql    = "	SELECT DISTINCT(" . $data . ") 
					FROM customer 
					ORDER BY CASE WHEN " . $data . " = '' THEN 1 ELSE 0 END, " . $data . " ASC";
        $return = $this->Model->query($sql);
        header("Content-type: application/json");
        echo json_encode(array('data' => $return));
    }

    function Bulan($data)
    {
        switch ($data) {
            case 'January':
                return 'Januari';
            case 'February':
                return 'Februari';
            case 'March':
                return 'Maret';
            case 'April':
                return 'April';
            case 'May':
                return 'Mei';
            case 'June':
                return 'Juni';
            case 'July':
                return 'Juli';
            case 'August':
                return 'Agustus';
            case 'September':
                return 'September';
            case 'October':
                return 'Oktober';
            case 'November':
                return 'November';
            case 'December':
                return 'Desember';
            default:
                return 'bulan tidak valid';
        }
    }

    function INS()
    {
        $id_customer            =  $this->input->post('id_customer');

        $nama_customer          = ucwords($this->input->post('nama_customer'));

        $alamat    = ucwords($this->input->post('alamat'));
        $telp           = $this->input->post('telp');
        $email         = $this->input->post('email');
        $fax        = $this->input->post('fax');

        $sql_check = $this->db->query("SELECT * FROM customer WHERE id_customer = '" . $id_customer . "'");
        $resData   = $sql_check->result();
        if (!$resData) {
            $sql    = '	INSERT INTO customer
						(
                            nama_customer,
                            alamat,
                            telp,
                            fax,
                            email
						)
						VALUES
						(
						"' . $nama_customer . '",
						"' . $alamat . '",
						"' . $telp . '",
						"' . $fax . '",
						"' . $email . '"
						)';
        } else {
            $sql    = '	UPDATE customer
                            SET             
                            nama_customer 		        = "' . $nama_customer . '",
        				    alamat 		= "' . $alamat . '",
        				    telp 		        = "' . $telp . '",
        				    fax 		        = "' . $fax . '",
        				    email 		        = "' . $email . '"
        				WHERE id_customer     = "' . $id_customer . '"';
        }
        $return = $this->db->query($sql);
        echo 'success';
    }

    function DEL()
    {
        $id_customer            =  $this->input->post('id_customer');

        $sql_check = $this->db->query("SELECT * FROM customer WHERE id_customer = '" . $id_customer . "'");
        $resData   = $sql_check->result();
        if ($resData) {
            $sql    = "DELETE FROM customer WHERE id_customer = '" . $id_customer . "'";
        }
        $return = $this->db->query($sql);
        echo 'success';
    }
}
