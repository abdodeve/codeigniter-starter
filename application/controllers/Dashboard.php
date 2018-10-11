<?php

// session_start(); //we need to start session in order to access it through CI

Class Dashboard extends CI_Controller {

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
    }

    public function index(){
        $products = $this->db->from('produits')->get()->result() ;
        $this->load->view('produit/produit', ['produits'=> $products]);
    }

    /**
     * Insert product
     * 
     */
    public function insert(){
        $img_src = null ;

         // Upload the file
         $uploaded = $this->do_upload('img_produit');

         // Check either Uploade or Not
         if($uploaded["isUploaded"])
            $img_src = $uploaded["uploaded_data"]["file_name"] ;

        // Prepare inputs
        $data   =  ['nom'             => $this->input->post('nom', true),
                    'libelle'         => $this->input->post('libelle', true),
                    'prix'            => $this->input->post('prix', true),
                    'description'     => $this->input->post('description', true),
                    'img_src'         => $img_src
                   ];

         // Insert the produit
         $this->db->insert('produits', $data);
         redirect("dashboard");
    }

    /**
     * Update product
     * 
     */
    public function update(){

    }

    /**
     * delete product
     * 
     */
    public function delete(){

    }

    /**
     * Upload file
     */
    protected function do_upload($fileName = 'img_produit'){
        // Load upload library
        $this->load->library('upload', ['upload_path'=> './uploads/', 'allowed_types'=> 'jpg|png']);

        // Check if file Not Uploaded
        if ( ! $this->upload->do_upload($fileName)){
            $error = $this->upload->display_errors() ;
            return ['isUploaded'=> false, 'error'=> $error] ;
        }

        return ['isUploaded'=> true, 'uploaded_data' => $this->upload->data()] ;
    }
}
?>