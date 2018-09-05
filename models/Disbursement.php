<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disbursement".
 *
 * @property integer $id
 * @property integer $stud_id
 * @property string $prod_id
 * @property integer $qty
 * @property string $unit
 * @property string $reason
 * @property string $date_released
 */
class Disbursement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disbursement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_id', 'prod_id', 'qty', 'unit', 'reason', 'date_released'], 'required'],
            [['stud_id', 'qty'], 'integer'],
            [['reason'], 'string'],
            [['date_released'], 'safe'],
            [['prod_id', 'unit'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stud_id' => 'Student ID:',
            'prod_id' => 'Product ID:',
            'qty' => 'Quantity:',
            'unit' => 'Unit:',
            'reason' => 'Reason:',
            'date_released' => 'Date Released:',
        ];
    }
     public function getStudent(){
        return $this->hasOne(Student::className(),['id'=>'stud_id']);
        return $this->hasOne(Student::className(),['lastname' .',' . 'firstname'=>'stud_name']);
}
    public function getFullname(){
    return $this->id;
}
 public function getProducts(){
        return $this->hasOne(Products::className(),['id'=>'prod_id']);
  
}
    public function getName(){
    return $this->name;
}
}