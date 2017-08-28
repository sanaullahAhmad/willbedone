<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_collections".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $date_created
 *
 * @property User $user
 * @property UserCollectionsPictures[] $userCollectionsPictures
 */
class UserCollections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_collections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'description', 'date_created'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['title', 'description'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'description' => 'Description',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCollectionsPictures()
    {
        return $this->hasMany(UserCollectionsPictures::className(), ['user_collections_id' => 'id']);
    }
}
