<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_manufacturers".
 *
 * @property integer $id
 * @property integer $manufacturers_id
 * @property integer $products_id
 *
 * @property Manufacturers $manufacturers
 * @property Products $products
 */
class ProductManufacturers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_manufacturers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'manufacturers_id', 'products_id'], 'required'],
            [['id', 'manufacturers_id', 'products_id'], 'integer'],
            [['manufacturers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturers::className(), 'targetAttribute' => ['manufacturers_id' => 'id']],
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
            'manufacturers_id' => 'Manufacturers ID',
            'products_id' => 'Products ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasOne(Manufacturers::className(), ['id' => 'manufacturers_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
