<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_testimonials".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $description
 * @property string $date_created
 *
 * @property User $user
 */
class UserTestimonials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_testimonials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','user_from', 'description', 'date_created'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['description'], 'string', 'max' => 150],
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
            'user_id' => 'Testimonial About',
            'user_from' => 'Testimonial Author',
            'description' => 'Testimonial',
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
    public function getUserFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'user_from']);
    }
    public function getUsername($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        return $user['username'];
    }
}
