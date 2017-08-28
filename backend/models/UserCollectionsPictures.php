<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_collections_pictures".
 *
 * @property integer $id
 * @property string $file
 * @property string $date_created
 * @property string $status
 * @property integer $user_collections_id
 *
 * @property UserCollections $userCollections
 */
class UserCollectionsPictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_collections_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_collections_id'], 'required'],
            [['user_collections_id'], 'integer'],
            [['file', 'date_created', 'status'], 'string', 'max' => 45],
            [['user_collections_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCollections::className(), 'targetAttribute' => ['user_collections_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'date_created' => 'Date Created',
            'status' => 'Status',
            'user_collections_id' => 'User Collections ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCollections()
    {
        return $this->hasOne(UserCollections::className(), ['id' => 'user_collections_id']);
    }
}
