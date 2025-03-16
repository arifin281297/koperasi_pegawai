<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);

defined('BASEPATH') or exit('No direct script access allowed');

class Identitas extends CI_Controller
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
            'title' => 'Identitas',
            'isi'   => 'back/v_identitas',
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

        $sql    = "SELECT  id_identitas,
						   nama_identitas,
						   badan_hukum,
						   npwp,
						   email,
                           url,
                           alamat,
                           tlp,
                           fax,
                           rekening,
                           foto
					FROM idetitas";

        $return = $this->Model->rendQuick($sql, $data);

        header("Content-type: application/json");
        echo json_encode($return);
    }

    function INS()
    {
        $id_identitas            =  $this->input->post('id_identitas');
        $nama_identitas          = $this->input->post('nama_identitas');
        $badan_hukum      = $this->input->post('badan_hukum');
        $npwp         = $this->input->post('npwp');
        $email           = $this->input->post('email');
        $url           = $this->input->post('url');
        $alamat           = $this->input->post('alamat');
        $tlp           = $this->input->post('tlp');
        $fax           = $this->input->post('fax');
        $rekening           = $this->input->post('rekening');

        // Perintah untuk membuat folder
        $upload_path = './public/img/identitas/';

        // Membuat folder jika belum ada
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 10120; // 5MB
        $config['file_name'] = $nama_identitas;

        // Upload Image
        $this->upload->initialize($config);
        $foto_uploaded = $this->upload->do_upload('foto');
        $foto_data = $this->upload->data();
        $foto_path = $foto_data['file_name'];

        $sql_check = $this->db->query("SELECT * FROM idetitas WHERE id_identitas = '" . $id_identitas . "'");
        $resData   = $sql_check->result();

        if (!$resData) {
            $sql = 'INSERT INTO idetitas (
                nama_identitas,
                badan_hukum,
                foto,
                npwp,
                email,
                url,
                alamat,
                tlp,
                fax,
                rekening
            ) VALUES (
                "' . $nama_identitas . '",
                "' . $badan_hukum . '",
                "' . $foto_path . '",
                "' . $npwp . '",
                "' . $email . '",
                "' . $url . '",
                "' . $alamat . '",
                "' . $tlp . '",
                "' . $fax . '",
                "' . $rekening . '"
            )';
            $return = $this->db->query($sql);
            echo 'success';
        } else {
            if ($foto_uploaded) {
                // Jika ada file gambar yang diunggah, update kolom foto
                $sql = "UPDATE idetitas
                SET nama_identitas = '" . $nama_identitas . "',
                    badan_hukum = '" . $badan_hukum . "',
                    foto = '" . $foto_path . "',
                    npwp = '" . $npwp . "',
                    email = '" . $email . "',
                    url = '" . $url . "',
                    alamat = '" . $alamat . "',
                    tlp = '" . $tlp . "',
                    fax = '" . $fax . "',
                    rekening = '" . $rekening . "'
                WHERE id_identitas = '" . $id_identitas . "'";
            } else {
                // Jika tidak ada file gambar yang diunggah, jangan update kolom foto
                $sql = "UPDATE idetitas
                SET nama_identitas = '" . $nama_identitas . "',
                    badan_hukum = '" . $badan_hukum . "',
                    npwp = '" . $npwp . "',
                    email = '" . $email . "',
                    url = '" . $url . "',
                    alamat = '" . $alamat . "',
                    tlp = '" . $tlp . "',
                    fax = '" . $fax . "',
                    rekening = '" . $rekening . "'
                WHERE id_identitas = '" . $id_identitas . "'";
            }
            $return = $this->db->query($sql);
            echo 'success';
        }
    }

    function DEL()
    {
        $id_identitas    = $this->input->post('id_identitas');

        $sql1    = "DELETE FROM idetitas WHERE id_identitas = '" . $id_identitas . "'";

        $return = $this->db->query($sql1);
        echo 'success';
    }
}
