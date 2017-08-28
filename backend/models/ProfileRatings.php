<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile_ratings".
 *
 * @property integer $id
 * @property string $date_added
 * @property string $rating
 * @property string $comments
 * @property string $ip
 * @property integer $user_profiles_id
 *
 * @property UserProfiles $userProfiles
 */
class ProfileRatings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_profiles_id'], 'required'],
            [['id', 'user_profiles_id'], 'integer'],
            [['date_added', 'rating', 'comments', 'ip'], 'string', 'max' => 45],
            [['user_profiles_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfiles::className(), 'targetAttribute' => ['user_profiles_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_added' => 'Date Added',
            'rating' => 'Rating',
            'comments' => 'Comments',
            'ip' => 'Ip',
            'user_profiles_id' => 'User Profiles ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasOne(UserProfiles::className(), ['id' => 'user_profiles_id']);
    }
}
