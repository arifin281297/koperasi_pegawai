<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $sql = $this->db->query("SELECT * FROM petugas WHERE username = '" . $username . "'");

            $result = $sql->result();

            foreach ($result as $show) {
                $id_user = $show->id_user;
                $username = $show->username;
                $nama_user = $show->nama_user;
                $level = $show->level;
                $pass = $show->password;
                
                if ($pass != $password) {
                    $this->session->set_flashdata('error', 'Username Atau Password Salah');
                    redirect(urlencode(base64_encode(site_url() . 'auth/login')));
                } else {
                    $this->session->set_userdata('id_user', $id_user);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('nama_user', $nama_user);
                    $this->session->set_userdata('level', $level);
                    $this->session->set_userdata('logged_in', true);

                    // redirect('dashboard');
                    redirect(urlencode(base64_encode(site_url() . 'dashboard')));
                }
            }
        }

        $data = array(
            'title' => 'Login Admin/User',
        );
        $this->load->view('back/v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->user_login->proteksi_halaman();
        $this->user_login->logout();
    }
}
