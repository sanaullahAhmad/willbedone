<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "manufacturers".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property user $user
 */
class Manufacturers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturers';
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
            'user_id' => 'user ID',
        ];
    }
    public function getsingleUsers()
    {
        $myreturn = $this->hasOne(User::className(), ['id' => 'user_id']);
        return $myreturn->primaryModel->attributes['user_id'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser()
    {
        return $this->hasOne(user::className(), ['id' => 'user_id']);
    }

    public function getVendorname($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['username'];
    }
    public function getVendoremail($id)
    {
        $user = (new \yii\db\Query())
            ->select(['email'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['email'];
    }
    public function getVendorphone($id)
    {
        $user = (new \yii\db\Query())
            ->select(['phone'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['phone'];
    }
}
