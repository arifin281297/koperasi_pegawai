<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
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
            'title' => 'Item',
            'isi'   => 'back/v_item',
            // 'cariStatusCust' => $this->cariStatusCust(),
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

        $sql    = "SELECT  id_item,
						   nama_item,
						   uom,
						   harga_beli,
						   harga_jual
					FROM item";

        $return = $this->Model->rendQuick($sql, $data);

        header("Content-type: application/json");
        echo json_encode($return);
    }

    function INS()
    {
        $id_item            =  $this->input->post('id_item');
        $nama_item          = $this->input->post('nama_item');
        $uom      = $this->input->post('uom');
        $harga_beli         = $this->input->post('harga_beli');
        $harga_jual           = $this->input->post('harga_jual');
        
        $sql_check = $this->db->query("SELECT * FROM item WHERE id_item = '" . $id_item . "'");
        $resData   = $sql_check->result();
        if (!$resData) {
            $sql    = '	INSERT INTO item
						(
                            nama_item,
                            uom,
                            harga_beli,
                            harga_jual
						)
						VALUES
						(
						"' . $nama_item . '",
						"' . $uom . '",
						"' . $harga_beli . '",
						"' . $harga_jual . '"
						)';
        } else {
            $sql    = '	UPDATE item
                            SET             
                            nama_item 		        = "' . $nama_item . '",
        				    uom 		= "' . $uom . '",
        				    harga_beli 		        = "' . $harga_beli . '",
        				    harga_jual 		        = "' . $harga_jual . '"
        				WHERE id_item     = "' . $id_item . '"';
        }
        $return = $this->db->query($sql);
        echo 'success';
    }

    function DEL()
    {
        $id_item    = $this->input->post('id_item');

        $sql1    = "DELETE FROM item WHERE id_item = '" . $id_item . "'";

        $return = $this->db->query($sql1);
        echo 'success';
    }
}
