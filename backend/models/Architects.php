<?php

namespace backend\models;


use Yii;
use backend\models\User;

/**
 * This is the model class for table "vendors".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property Users $user
 */
class Architects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'architects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],

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
            'user_id' => 'Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function getsingleUsers()
    {
        $myreturn = $this->hasOne(User::className(), ['id' => 'user_id']);
        return $myreturn->primaryModel->attributes['user_id'];
    }
    public function getArchitectname($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['username'];
    }
    public function getArchitectemail($id)
    {
        $user = (new \yii\db\Query())
            ->select(['email'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['email'];
    }
    public function getArchitectphone($id)
    {
        $user = (new \yii\db\Query())
            ->select(['phone'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['phone'];
    }

    public static function homepagearchetics()
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('architects')
            ->all();
        return $items;
    }
    public static function homepagearchetictsprojects($architect_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('projects')
            ->where(['user_id' => $architect_id])
            ->one();
        return $items;
    }
    public static function homepagearcheticprofile($user_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('user_profiles')
            ->where(['user_id' => $user_id])
            ->one();
        return $items;
    }
    public static function homepagearchitectsprojectspictures($project_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('project_pictures')
            ->where(['projects_id' => $project_id])
            ->all();
        return $items;
    }
}
