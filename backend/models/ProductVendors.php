<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_vendors".
 *
 * @property integer $id
 * @property integer $vendors_id
 * @property integer $products_id
 *
 * @property Products $products
 * @property Vendors $vendors
 */
class ProductVendors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_vendors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vendors_id', 'products_id'], 'required'],
            [['id', 'vendors_id', 'products_id'], 'integer'],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id']],
            [['vendors_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendors::className(), 'targetAttribute' => ['vendors_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendors_id' => 'Vendors ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasOne(Vendors::className(), ['id' => 'vendors_id']);
    }
}
