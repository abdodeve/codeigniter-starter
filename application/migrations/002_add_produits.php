<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_produits extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nom' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
                'libelle' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
            ),
            'prix' => array(
                'type' => 'FLOAT',
                'null' => TRUE,
            ),
            'description' => array(
                'type' => 'text',
                'null' => TRUE,
            ),
            'img_src' => array(
                'type' => 'text',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('produits');
    }

    public function down()
    {
        $this->dbforge->drop_table('produits');
    }
}