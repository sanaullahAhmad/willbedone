<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "leed_assignments".
 *
 * @property integer $id
 * @property string $date_created
 * @property string $status
 * @property integer $leeds_id
 * @property integer $leeds_user_id
 *
 * @property Leeds $leeds
 */
class LeedAssignments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leed_assignments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'leeds_id', 'leeds_user_id'], 'required'],
            [['id', 'leeds_id', 'leeds_user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['status'], 'string', 'max' => 45],
            [['leeds_id', 'leeds_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leeds::className(), 'targetAttribute' => ['leeds_id' => 'id', 'leeds_user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_created' => 'Date Created',
            'status' => 'Status',
            'leeds_id' => 'Leeds ID',
            'leeds_user_id' => 'Leeds user ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeeds()
    {
        return $this->hasOne(Leeds::className(), ['id' => 'leeds_id'/*, 'user_id' => 'leeds_user_id'*/]);
    }
}
