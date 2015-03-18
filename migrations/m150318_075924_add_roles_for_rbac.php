<?php

use yii\db\Schema;
use yii\db\Migration;

class m150318_075924_add_roles_for_rbac extends Migration
{
    public function up()
    {
        $rbac = \Yii::$app->authManager;
        
        //create role user
        $guest = $rbac->createRole('guest');
        $guest->description = 'Nobody';
        $rbac->add($guest);
        
        // create role user
        $user = $rbac->createRole('user');
        $user->description = 'Can use query UI and nothing else';
        $rbac->add($user);
        
        //create role manager
        $manager = $rbac->createRole('manager');
        $manager->description = 'Can manage entities in database, not user';
        $rbac->add($manager);
        
        //create role admin
        $admin = $rbac->createRole('admin');
        $admin->description = 'Can manage anything include maning user';
        $rbac->add($admin);
        
        
        //assign user for role
        $rbac->assign($user, \app\models\user\UserRecord::findOne(['username' => 'longheartfree'])->id);
        
        $rbac->assign($manager, \app\models\user\UserRecord::findOne(['username' => 'jackiewu'])->id);
        
        $rbac->assign($admin, \app\models\user\UserRecord::findOne(['username' => 'admin'])->id);
        
    }

    public function down()
    {
        $authManager = Yii::$app->authManager;
        $authManager->removeAll();
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
