<?php

use yii\db\Schema;
use yii\db\Migration;

class m150318_031257_add_auth_key_to_users extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'auth_key', 'string UNIQUE');
    }

    public function down()
    {
        $this->dropColumn('auth_key');
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
