<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'login-form']);
echo $form->field($user, 'username');
echo $form->field($user, 'password')->passwordInput();
echo $form->field($user, 'rememberMe')->checkbox();

echo Html::submitButton('Login', ['class' => 'btn btn-primary']);

$form->end();