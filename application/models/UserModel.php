<?php

Class UserModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

// Read data using email and password
    public function login($data) {

        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $condition = "email = '{$data['email']}' AND password = '{$password}'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        // Check if not correct
        if ($query->num_rows() != 1)
            return false;

        return true;
    }

// Read data from database to show data in admin page
    public function user_informations($email) {

        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();


        // Check if not correct
        if ($query->num_rows() != 1)
            return false;

        return $query->result();
    }

}

?>