<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "configurations".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $date_created
 * @property string $status
 */
class Configurations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configurations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name', 'value', 'date_created', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'date_created' => 'Date Created',
            'status' => 'Status',
        ];
    }
}
