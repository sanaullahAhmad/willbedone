<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_catalogue".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $catalogue
 * @property string $date_created
 *
 * @property User $user
 */
class UserCatalogue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_catalogue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'catalogue', 'date_created'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['name', 'catalogue'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'catalogue' => 'Catalogue',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
