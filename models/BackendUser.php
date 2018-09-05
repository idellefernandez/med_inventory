<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backend_user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string $authkey
 */
class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backend_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'password'], 'required'],
            [['firstname'], 'string', 'max' => 15],
            [['lastname'], 'string', 'max' => 20],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 50],
            [['username'], 'unique'],
            array('firstname', 'filter', 'filter' => 'ucwords'),
            array('lastname', 'filter', 'filter' => 'ucwords')
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname:',
            'lastname' => 'Lastname:',
            'username' => 'Username:',
            'password' => 'Password:',
            
        ];
    }
    public function beforeSave($insert){
        $password = md5($this->password);
        $this->password = $password;
        return true;
    }

    public function getAuthKey() {

      throw new \yii\base\NotSupportedException();
    }

     public function getId() {
        return $this->id;
    }

    public function getFullname(){
        return $this->lastname. ", ".$this->firstname;
    }

    public function validateAuthKey($authkey) {
       throw new \yii\base\NotSupportedException();
    }

    public static function findIdentity($id) {
        return self::findOne($id);

    }
    public function validatePassword($password){
        return $this->password === md5($password);
    }
     public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();
     }
     public static function findByUsername($username){
        return self::findOne(['username' => $username]);
     }
}