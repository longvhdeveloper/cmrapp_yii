<?php
use yii\helpers\Html;
use \yii\helpers\Url;

echo Html::beginForm(Url::home() . 'customers', 'get');
echo Html::label('Phone number to search', 'phone_number');
echo Html::textInput('phone_number');
echo Html::submitButton('Search', array('btn btn-success'));
echo Html::endForm();