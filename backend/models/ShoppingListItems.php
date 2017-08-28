<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shopping_list_items".
 *
 * @property integer $id
 * @property string $date_created
 * @property integer $user_shopping_list_id
 * @property integer $user_shopping_list_user_id
 * @property integer $products_id
 * @property integer $products_product_categories_id
 *
 * @property Products $products
 * @property UserShoppingList $userShoppingList
 */
class ShoppingListItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shopping_list_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_shopping_list_id', 'user_shopping_list_user_id', 'products_id', 'products_product_categories_id'], 'required'],
            [['id', 'user_shopping_list_id', 'user_shopping_list_user_id', 'products_id', 'products_product_categories_id'], 'integer'],
            [['date_created'], 'safe'],
            [['products_id', 'products_product_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id', 'products_product_categories_id' => 'product_categories_id']],
            [['user_shopping_list_id', 'user_shopping_list_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserShoppingList::className(), 'targetAttribute' => ['user_shopping_list_id' => 'id', 'user_shopping_list_user_id' => 'user_id']],
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
            'user_shopping_list_id' => 'User Shopping List ID',
            'user_shopping_list_user_id' => 'User Shopping List Users ID',
            'products_id' => 'Products ID',
            'products_product_categories_id' => 'Products Product Categories ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id', 'product_categories_id' => 'products_product_categories_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_shopping_list_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserShoppingList()
    {
        return $this->hasOne(UserShoppingList::className(), ['id' => 'user_shopping_list_id', 'user_id' => 'user_shopping_list_user_id']);
    }
    public static function getInfo($id, $field, $table)
    {
        $user = (new \yii\db\Query())
            ->select([$field])
            ->from($table)
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user[$field];
    }
    public static function getCategory($id, $field)
    {
        $user = (new \yii\db\Query())
            ->select([$field])
            ->join('INNER JOIN','categories','categories.id = categories_id')
            ->from('product_categories')
            ->where(['product_categories.id' => $id])
            ->one();
        return $user[$field];
    }
}
