<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\user\LoginForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('homepage');
    }

    public function actionDocs()
    {
        return $this->render('docindex.md');
    }
    
    public function actionLogin()
    {
        //if user login redirect to home page
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $user = new LoginForm();
            if ($user->load(\Yii::$app->request->post()) && $user->login()) {
                return $this->goBack();
            }
            
            return $this->render('login', ['user' => $user]);
        }
    }
    
    public function actionLogout()
    {
        \Yii::$app->user->logout(true);
        
        return $this->goHome();
    }
}