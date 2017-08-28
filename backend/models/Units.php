<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "units".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_created
 */
class Units extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'units';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_created'], 'required'],
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 100],
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
            'date_created' => 'Date Created',
        ];
    }
}
