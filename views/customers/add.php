<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\customer\CustomerRecord;
use app\models\customer\PhoneRecord;

/**
 * add Customer UI
 */
$form = ActiveForm::begin(
    array(
        'id' => 'add-customer-form'
    )
);

echo $form->errorSummary(array($customerRecord, $phoneRecord));
echo $form->field($customerRecord, 'name');
echo $form->field($customerRecord, 'birth_date');
echo $form->field($customerRecord, 'notes');
echo $form->field($phoneRecord, 'number');

echo Html::submitButton('Create', array('class' => 'btn btn-primary'));

$form->end();