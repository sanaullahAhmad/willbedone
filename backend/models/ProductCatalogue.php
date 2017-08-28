<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_catalogue".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $catalogue
 * @property string $date_created
 *
 * @property User $product
 */
class ProductCatalogue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_catalogue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'name', 'catalogue', 'date_created'], 'required'],
            [['product_id'], 'integer'],
            [['date_created'], 'safe'],
            [['name', 'catalogue', 'product_catalogue','catalogue_image'], 'string', 'max' => 100],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'catalogue' => 'Catalogue',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(User::className(), ['id' => 'product_id']);
    }
}
