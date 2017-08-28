<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_pictures".
 *
 * @property integer $id
 * @property string $file
 * @property string $date_created
 * @property string $status
 * @property integer $products_id
 *
 * @property Products $products
 */
class ProductPictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'id',*/ 'products_id'], 'required'],
            [['id', 'products_id'], 'integer'],
            [['file', 'date_created', 'status'], 'string', 'max' => 45],
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
            'file' => 'File',
            'date_created' => 'Date Created',
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
