<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

class CustomerRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        return array(
            array('id', 'number'),
            array('name', 'required'),
            array('name', 'string', 'max' => 255),
            array('birth_date', 'date', 'format' => 'php:Y-m-d'), // using date format of php :)
            array('notes', 'safe') //ignore when validate
        );
    }
} 