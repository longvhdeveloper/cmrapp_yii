<?php

use yii\db\Schema;
use yii\db\Migration;

class m150317_093114_create_table_user extends Migration
{
    public function up()
    {
    	$this->createTable('user', array(
    			'id' => 'pk',
    			'username' => 'string Unique',
    			'password' => 'string'
    	));
    }

    public function down()
    {
       $this->dropTable('user');
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
