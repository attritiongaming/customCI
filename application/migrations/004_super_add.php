<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Super_add extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,

            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 20
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 200
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('004');
    }

    public function down()
    {
        $this->dbforge->drop_table('002');
    }
}