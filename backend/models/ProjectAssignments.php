<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project_assignments".
 *
 * @property integer $id
 * @property string $date_created
 * @property string $status
 * @property integer $projects_id
 *
 * @property Projects $projects
 */
class ProjectAssignments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_assignments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'projects_id'], 'required'],
            [['id', 'projects_id'], 'integer'],
            [['date_created', 'status'], 'string', 'max' => 45],
            [['projects_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['projects_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'date_created'  => 'Date Created',
            'status'        => 'Status',
            'projects_id'   => 'Projects ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasOne(Projects::className(), ['id' => 'projects_id']);
    }
}
