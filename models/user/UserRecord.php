<?php

namespace app\models\user;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class UserRecord extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'string', 'max' => 255],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * Method login , remember me
     */
    public function getId()
    {
        return $this->id;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    
    public function getAuthKey() 
    {
        return $this->auth_key;
    }
    
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() == $authKey;
    }

    public function beforeSave($insert)
    {
    	$return = parent::beforeSave($insert);

        //check is new record to add auth_key
        if ($this->isNewRecord)
        {
            $this->auth_key = Yii::$app->security->generateRandomKey($length = 255);
        }

    	if ($this->isAttributeChanged('password')) {
            $this->password = \Yii::$app->security->generatePasswordHash($this->password);
    	}

    	return $return;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_toke' => $token]);
    }
}