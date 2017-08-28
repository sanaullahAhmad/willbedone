<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_team".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $designation
 * @property string $picture
 * @property string $date_created
 */
class UserTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'designation', 'picture'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['name', 'designation', 'picture'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'designation' => 'Designation',
            'picture' => 'Picture',
            'date_created' => 'Date Created',
        ];
    }
}
