<?php

namespace app\models\customer;
use yii\db\ActiveRecord;

class PhoneRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'phone';
    }

    public function rules()
    {
        return array(
            array('number', 'string'),
            array('customer_id', 'number'),
            array(array('number', 'customer_id'), 'required'),
        );
    }
} 