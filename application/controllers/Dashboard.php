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

    /**
     * Root page
     */
    public function index(){
        // Get products
        $products = $this->db->from('produits')->get()->result() ;

        // Get flash data
        $flashData = $this->session->flashdata();
        $this->load->view('produit/produit', ['produits'=> $products, 
                                              'data'=> $flashData,
                                             ]);
    }

    /**
     * Edit page
     */
    public function edit($id){
        // Get products
        $products = $this->db->from('produits')->get()->result() ;

        // Get The Product
        $the_product = $this->db->from('produits')->where('id', $id)->get()->result()[0] ;

        // Get flash data
        $flashData = $this->session->flashdata();

        // Pass data to view
        $this->load->view('produit/produit', ['produits'    => $products,
                                              'data'        => $flashData,
                                              'the_product' => $the_product
                                            ]);
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

         // Set Data in FlashData
         $this->session->set_flashdata(['showModal'=> true,
                                        'msgModal'=> 'new_product_inserted', 
                                        'data'=> $data
                                      ]);

         redirect("dashboard");
    }

    /**
     * Update product
     * @param $id - product ID
     */
    public function update(){
        
        $img_src = null ;

        // Upload the file
        $uploaded = $this->do_upload('img_produit');

        // Check either Uploade or Not
        if($uploaded["isUploaded"])
           $img_src = $uploaded["uploaded_data"]["file_name"] ;

       // Prepare inputs
       $data   =  ['id'              => $this->input->post('id', true),
                   'nom'             => $this->input->post('nom', true),
                   'libelle'         => $this->input->post('libelle', true),
                   'prix'            => $this->input->post('prix', true),
                   'description'     => $this->input->post('description', true),
                   'img_src'         => $img_src
                  ];

        // Img not uploaded - Unset IMG_SRC
        if(!$uploaded["isUploaded"])
            unset($data['img_src']);
        
        // Update the produit
        $this->db->where('id', $data['id']);
        $this->db->update('produits', $data);

        // Set Data in FlashData
        $this->session->set_flashdata(['showModal'=> true,
                                       'msgModal'=> 'product_modified', 
                                       'data'=> $data
                                     ]);

        redirect("dashboard");
    }

    /**
     * delete product
     * 
     */
    public function delete($id){
        // Get products
        $products = $this->db->from('produits')->get()->result() ;

        // Remove The Product
        $this->db->delete('produits', ['id'=> $id]);

        // Set Data in FlashData
        $this->session->set_flashdata(['showModal'=> true,
                                       'msgModal'=> 'product_deleted',
                                     ]);

        redirect("dashboard");

    }

    ///////////////////////////////////////////////////////
    // Followed Methodes are Methodes used inside controller
    ///////////////////////////////////////////////////////

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