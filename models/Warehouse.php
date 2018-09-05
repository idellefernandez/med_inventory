<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $id
 * @property string $prod_id
 * @property string $unit
 * @property double $unit_cost
 * @property integer $qty
 * @property string $date_added
 * @property string $supplier
 * @property string $received_by
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_id', 'unit', 'unit_cost', 'qty', 'date_added', 'supplier', 'received_by'], 'required'],
            [['unit_cost'], 'number'],
            [['qty'], 'integer'],
            [['date_added'], 'safe'],
            [['prod_id'], 'string', 'max' => 20],
            [['unit'], 'string', 'max' => 15],
            [['supplier', 'received_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prod_id' => 'Product ID:',
            'unit' => 'Unit:',
            'unit_cost' => 'Unit Cost:',
            'qty' => 'Quantity:',
            'date_added' => 'Date Added:',
            'supplier' => 'Supplier:',
            'received_by' => 'Received By:',
        ];
    }
      public function getProducts(){
        return $this->hasOne(Products::className(),['id'=>'prod_id']);
}
  
public function getName(){
    return $this->name;
}
}