<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property integer $qty
 * @property string $qty_unit
 * @property integer $reorder_level
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'type', 'qty', 'qty_unit', 'reorder_level'], 'required'],
            [['qty', 'reorder_level'], 'integer'],
            [['id'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['name', 'type', 'qty_unit'], 'string', 'max' => 50],
            array('id', 'filter', 'filter' => 'ucwords'),
            array('name', 'filter', 'filter' => 'ucwords'),
            array('qty_unit', 'filter', 'filter' => 'ucwords')
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product ID:',
            'name' => 'Product Name:',
            'type' => 'Type:',
            'qty' => 'Quantity:',
            'qty_unit' => 'Quantity Unit:',
            'reorder_level' => 'Reorder Level:',
        ];
    }
}
