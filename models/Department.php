<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $shortname
 * @property string $description
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shortname', 'description'], 'required'],
            [['id'], 'integer'],
            [['shortname'], 'unique'],
            [['description'], 'unique'],
            [['id'], 'unique'],
            [['shortname', 'description'], 'string', 'max' => 50],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortname' => 'Shortname:',
            'description' => 'Description:',
        ];
    }
}
