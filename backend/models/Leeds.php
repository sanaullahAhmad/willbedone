<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "leeds".
 *
 * @property integer $id
 * @property string $location
 * @property string $size
 * @property string $building_size
 * @property string $service_required
 * @property string $finish_type
 * @property string $construction_priority
 * @property string $construction_type
 * @property string $lead_type
 * @property string $project_type
 * @property string $status
 * @property string $date_created
 * @property string $interior_design_required
 * @property integer $user_id
 *
 * @property LeedAssignments[] $leedAssignments
 * @property user $user
 */
class Leeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['location', 'size', 'building_size', 'service_required', 'finish_type', 'construction_priority', 'construction_type', 'lead_type', 'project_type', 'status', 'interior_design_required'], 'string', 'max' => 45],
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
            'location' => 'Location',
            'size' => 'Size',
            'building_size' => 'Building Size',
            'service_required' => 'Service Required',
            'finish_type' => 'Finish Type',
            'construction_priority' => 'Construction Priority',
            'construction_type' => 'Construction Type',
            'lead_type' => 'Lead Type',
            'project_type' => 'Project Type',
            'status' => 'Status',
            'date_created' => 'Date Created',
            'interior_design_required' => 'Interior Design Required',
            'user_id' => 'user ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeedAssignments()
    {
        return $this->hasMany(LeedAssignments::className(), ['leeds_id' => 'id', 'leeds_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser()
    {
        return $this->hasOne(user::className(), ['id' => 'user_id']);
    }

    public function getUserinfo($id, $field)
    {
        $user = (new \yii\db\Query())
            ->select([$field])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user[$field];
    }
}
