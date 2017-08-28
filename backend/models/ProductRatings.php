<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_ratings".
 *
 * @property integer $id
 * @property string $rating
 * @property string $date_added
 * @property string $status
 * @property integer $products_id
 *
 * @property Products $products
 */
class ProductRatings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'products_id'], 'required'],
            [['id', 'products_id'], 'integer'],
            [['date_added'], 'safe'],
            [['rating', 'status'], 'string', 'max' => 45],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rating' => 'Rating',
            'date_added' => 'Date Added',
            'status' => 'Status',
            'products_id' => 'Products ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
