<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function UserRow($id_user)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }
}

/* End of file M_auth.php */
