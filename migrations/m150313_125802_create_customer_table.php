<?php

use yii\db\Schema;
use yii\db\Migration;

class m150313_125802_create_customer_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'customer',
            array(
               'id' => 'pk',
                'name' => 'string',
                'birth_date' => 'date',
                'notes' => 'text'
            ),
            'Engine=MyISAM'
        );
    }

    public function down()
    {
        $this->dropTable('customer');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
