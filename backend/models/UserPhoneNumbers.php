<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_phone_numbers".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $phone_number
 * @property string $date_created
 *
 * @property User $user
 */
class UserPhoneNumbers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_phone_numbers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'phone_number', 'date_created'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['phone_number'], 'string', 'max' => 100],
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
            'phone_number' => 'Phone Number',
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
