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
        // If user Connected redirect to Dashboard
        if($this->isUserLoggedIn())
            redirect('user/dashboard');

        $data = $this->session->flashdata();
        return $this->load->view('template', ['v'=> 'login', 'data'=> $data]);
    }

    /**
     * Dashboard page
     */
    public function dashboard(){
        // If user disconnected redirect to login
        if(!$this->isUserLoggedIn())
            redirect('/');

        $data = $this->session->userdata();
        return $this->load->view('dashboard', ['data'=> $data]);
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
        $res_q = $query->result()[0] ;
        if($res_q->count > 0){
            $this->session->set_flashdata(['showModal'=> true, 'msgModal'=> 'user_exist']);
            redirect("user");
        }

        // Insert the User
        $this->db->insert('users', $data);

        // User inserted
        $user_data = $this->db->from('users')->where('email', $data['email'])->get()->result_array()[0];

        $this->session->set_flashdata(['showModal'=> true, 'msgModal'=> 'new_user_inserted', 'data'=> $user_data]);
        redirect("/");
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

        $data_test = array(
            'email' => 'abdo@hotmail.com',
            'password' => '123'
        );

        $isValid = $this->UserModel->login($data);



        // If Credentials incorrecte
        if($isValid == FALSE){
            $this->session->set_flashdata(['showModal'=>true, 'msgModal'=> 'invalid_credentials']);
            redirect("user");
        }

        // Credential correcte
        $user_data = $this->db->from('users')->where('email', $data['email'])->get()->result_array()[0];

        // Add user data in session
        $session_data = ['email' => $user_data['email'], 'name'=> $user_data['name']];
        $this->session->set_userdata('logged_in', $session_data);

        redirect("user/dashboard");
    }

// Logout from admin page
    public function logout() {
    // Removing session data
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('/');
    }

    /**
     * isUserLoggedIn
     * Check either user logged in or not
     *
     * @return bool
     */
    public function isUserLoggedIn(){
        $isLoggedIn = $this->session->has_userdata('logged_in');
        return $isLoggedIn ? true : false ;
    }

}

?>