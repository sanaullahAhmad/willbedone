<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shopping_list_items_info".
 *
 * @property integer $id
 * @property string $date_created
 * @property integer $shopping_list_item_id
 * @property integer $status
 * @property integer $is_send_price_qoute
 * @property integer $is_general_request
 * @property integer $is_send_catalogue
 * @property integer $is_send_more_info
 * @property integer $is_nearest_dealer
 * @property integer $is_send_spec_sheet
 * @property string $message
 * @property string $who_are_you
 *
 * @property ShoppingListItems $shoppingListItem
 */
class ShoppingListItemsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shopping_list_items_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_created'], 'safe'],
            [['shopping_list_item_id', 'message', 'who_are_you'], 'required'],
            [['shopping_list_item_id', 'status', 'is_send_price_qoute', 'is_general_request', 'is_send_catalogue', 'is_send_more_info', 'is_nearest_dealer', 'is_send_spec_sheet'], 'integer'],
            [['message'], 'string'],
            [['who_are_you'], 'string', 'max' => 100],
            [['shopping_list_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShoppingListItems::className(), 'targetAttribute' => ['shopping_list_item_id' => 'id']],
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
            'shopping_list_item_id' => 'Shopping List Item ID',
            'status' => 'Status',
            'is_send_price_qoute' => 'Is Send Price Qoute',
            'is_general_request' => 'Is General Request',
            'is_send_catalogue' => 'Is Send Catalogue',
            'is_send_more_info' => 'Is Send More Info',
            'is_nearest_dealer' => 'Is Nearest Dealer',
            'is_send_spec_sheet' => 'Is Send Spec Sheet',
            'message' => 'Message',
            'who_are_you' => 'Who Are You',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingListItem()
    {
        return $this->hasOne(ShoppingListItems::className(), ['id' => 'shopping_list_item_id']);
    }
}
