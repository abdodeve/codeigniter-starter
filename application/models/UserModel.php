<?php

Class UserModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

// Read data using email and password
    public function login($data) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $data['email']);
        $this->db->limit(1);
        $query = $this->db->get();

        // Check if no row matche
        if ($query->num_rows() == 0)
            return 0;

        // Check if password matches
        $isPasswordsMatch = password_verify($data['password'], $query->result()[0]->password);
        if(!$isPasswordsMatch){
            return 0;
        }


        return true;
    }

}

?>