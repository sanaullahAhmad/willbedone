<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_shopping_list".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_created
 * @property string $status
 * @property integer $user_id
 *
 * @property ShoppingListItems[] $shoppingListItems
 * @property User $user
 */
class UserShoppingList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_shopping_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['name', 'date_created', 'status'], 'string', 'max' => 45],
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
            'name' => 'Name',
            'date_created' => 'Date Created',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingListItems()
    {
        return $this->hasMany(ShoppingListItems::className(), ['user_shopping_list_id' => 'id', 'user_shopping_list_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getInfo($id, $field, $table)
    {
        $user = (new \yii\db\Query())
            ->select([$field])
            ->from($table)
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user[$field];
    }
}
