<?php

use yii\db\Schema;
use yii\db\Migration;

class m150318_070854_add_predefined_users extends Migration
{
    public function up()
    {
        $userPredefiend = [
            ['longheartfree', '2871989'],
            ['jackiewu', '2871989'],
            ['admin', '123456']
        ];
        foreach ($userPredefiend as $item) {
            $user = new app\models\user\UserRecord();
            $user->username = $item[0];
            $user->password = $item[1];
            
            $user->save();
        }
        
    }

    public function down()
    {
        $this->truncateTable('user');
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
