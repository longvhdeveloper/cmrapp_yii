<?php

use yii\db\Schema;
use yii\db\Migration;

class m150314_054415_create_table_service extends Migration
{
    public function up()
    {
        $this->createTable(
            'service',
            array(
                'id' => 'pk',
                'name' => 'string unique',
                'hourly_rate' => 'integer'
            ),
            'engine=MyISAM'
        );
    }

    public function down()
    {
        $this->dropTable('service');
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
