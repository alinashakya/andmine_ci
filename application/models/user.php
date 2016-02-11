<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('id,username,password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function search($keyword) {
        $this->db->like('username', $keyword);
        $query = $this->db->get('users');
        return $query->result();
    }

}
