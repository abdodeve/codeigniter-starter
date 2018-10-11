<?php

// session_start(); //we need to start session in order to access it through CI

Class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load database instance
        $this->load->database();

        //Loading url helper
        $this->load->helper('url');

        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
                $this->load->library('session');

        // Load UserModel
        $this->load->model('UserModel');
    }

// Show login page
    public function index() {
        $data = $this->session->flashdata();
        return $this->load->view('template', ['v'=> 'login', 'data'=> $data]);
    }

    /**
     * insert
     * Insert a new user
     *
     * @return $user
     */
    public function insert() {
        $data   =  ['name'      => $this->input->post('name', true),
                    'email'     => $this->input->post('email', true),
                    'password'  => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                  ];
        // Check if email already exist
        $query = $this->db->query("SELECT count(*) as count
                                   FROM users
                                   WHERE email = '{$data['email']}'");
        if($query->result() > 0){
            $this->session->set_flashdata(['showModal'=> true, 'msgModal'=> 'user_exist']);
            redirect("user");
           // return $this->load->view('template', ['v'=> 'login', 'showModal'=> true, 'msgModal'=> 'user_exist']);
        }

        $res = $this->db->insert('users', $data);
        return $this->load->view('template', ['v'=> 'login', 'showModal'=> true, 'msgModal'=> 'new_user_inserted','data'=> $data]);
    }

// Check for user login process
    public function userLogin() {

        $this->form_validation->set_rules('emailLogin', 'Email of user', 'trim|required');
        $this->form_validation->set_rules('passwordLogin', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
            return $this->load->view('template', ['v' => 'login', 'showModal'=>true, 'msgModal'=> 'form_validation']);


        $data = array(
            'email' => $this->input->post('emailLogin'),
            'password' => $this->input->post('passwordLogin')
        );
            $isValid = $this->UserModel->login($data, true);

        // If Credentials incorrecte
        if($isValid == FALSE){
            $this->session->set_flashdata(['showModal'=>true, 'msgModal'=> 'invalid_credentials']);
            redirect("user");
           //  return $this->load->view('template', ['v' => 'login', 'showModal'=>true, 'msgModal'=> 'invalid_credentials']);
        }

        // Credential correcte
            $session_data = ['email' => $this->input->post('email', true)];

            // Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            return $this->load->view('welcome_message');
    }

// Logout from admin page
    public function logout() {
    // Removing session data
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        return $this->load->view('template', array('v'=> 'login'));
    }

}

?>