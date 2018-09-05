<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $lastname
 * @property string $firstname
 * @property integer $department_id
 * @property string $birthdate
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lastname', 'firstname', 'department_id', 'birthdate'], 'required'],
            [['id', 'department_id'],'integer'],
            [['id'], 'unique'],
            [['birthdate'], 'safe'],
            [['lastname', 'firstname'], 'string', 'max' => 50],
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
            'id' => 'Student ID:',
            'lastname' => 'Lastname:',
            'firstname' => 'Firstname:',
            'department_id' => 'Department ID:',
            'birthdate' => 'Birthdate:',
        ];
    }

    public function getDepartment(){
        return $this->hasOne(Department::className(),['id'=>'department_id']);
    }

public function getFullname(){
    return $this->lastname. ", ".$this->firstname;
}
}
