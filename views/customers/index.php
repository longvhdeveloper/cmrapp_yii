<?php
use yii\helpers\Html;
use yii\widgets\ListView;

$message = Yii::$app->session->getFlash('message');
if ($message != '') {
    echo "<p>$message</p>";
}

echo ListView::widget(
    array(
        'options' => array(
            'class' => 'list-view',
            'id' => 'search_results'
        ),
        'itemView' => '_customer',
        'dataProvider' => $customer
    )
);

echo "<a href='".\yii\helpers\Url::home() . 'customers/add'."'>Add new customer</a>";