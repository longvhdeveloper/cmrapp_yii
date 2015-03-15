<?php

use yii\db\Schema;
use yii\db\Migration;

class m150313_130015_create_phone_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'phone',
            array(
                'customer_id' => 'int unique',
                'id' => 'pk',
                'number' => 'string'
            ),
            'Engine=MyISAM'
        );
    }

    public function down()
    {
        $this->dropTable('phone');
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
