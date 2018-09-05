<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "returns".
 *
 * @property string $id
 * @property string $prod_id
 * @property integer $qty
 * @property string $date_returned
 */
class Returns extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'returns';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prod_id', 'qty', 'date_returned'], 'required'],
            [['qty'], 'integer'],
            [['id'], 'unique'],
            [['date_returned'], 'safe'],
            [['id', 'prod_id'], 'string', 'max' => 20],
            array('id', 'filter', 'filter' => 'ucwords'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID:',
            'prod_id' => 'Prod ID:',
            'qty' => 'Quantity:',
            'date_returned' => 'Date Returned:',
        ];
    }
     public function getProducts(){
        return $this->hasOne(Products::className(),['id'=>'prod_id']);
    }
}