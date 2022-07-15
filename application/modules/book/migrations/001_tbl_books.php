<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tbl_books extends CI_Migration {

    public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'book_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'book_author' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'book_publication' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                                'constraint' => '100',
                        ),
                        'book_description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                                
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('tbl_books');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbl_books');
        }

}

/* End of file Class_name.php */
