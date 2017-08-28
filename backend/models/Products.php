<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $sku
 * @property string $date_created
 * @property string $status
 * @property integer $product_categories_id
 *
 * @property ProductCategories[] $productCategories
 * @property ProductPictures[] $productPictures
 * @property ProductRatings[] $productRatings
 * @property ShoppingListItems[] $shoppingListItems
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'id',*/'product_categories_id'], 'required'],
            [['id'/*, 'product_categories_id'*/], 'integer'],
            [['date_created'], 'safe'],
            [['name', 'sku', 'status', 'availability', 'sizweight', 'material', 'style'/*, 'product_vendors_id', 'brand_id'*/, 'manufacturers_id', 'is_recommended', 'banjaiga_price', 'actual_price', 'starting_from', 'is_multiple', 'unit_id'], 'string', 'max' => 45],
            [['description', 'long_description'], 'string', 'max' => 4500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                    => 'ID',
            'sku'                   => 'Sku',
            'name'                  => 'Name',
            'style'                 => 'Style',
            'status'                => 'Status',
            'unit_id'               => 'Unit',
            /*'brand_id'              => 'Brand',*/
            'material'              => 'Material',
            'sizweight'             => 'Siz Weight',
            'description'           => 'Description',
            'date_created'          => 'Date Created',
            'long_description'      => 'Long Description',
            'manufacturers_id'      => 'Manufacturer',
            'product_vendors_id'    => 'Vendors',
            'product_categories_id' => 'Categories',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategories::className(), ['products_id' => 'id']);
    }
    public function getProductVendors()
    {
        return $this->hasMany(ProductVendors::className(), ['products_id' => 'id']);
    }
    public function getProductManufacturers()
    {
        return $this->hasMany(ProductManufacturers::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPictures()
    {
        return $this->hasMany(ProductPictures::className(), ['products_id' => 'id']);
    }
    public function getProductManufacturerprofile()
    {
        return $this->hasOne(UserProfiles::className(), ['user_id' => 'manufacturers_id']);
    }
    public function getProductCatalogue()
    {
        return $this->hasMany(ProductCatalogue::className(), ['product_id' => 'id']);
    }
    public function getProductBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductRatings()
    {
        return $this->hasMany(ProductRatings::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingListItems()
    {
        return $this->hasMany(ShoppingListItems::className(), ['products_id' => 'id', 'products_product_categories_id' => 'product_categories_id']);
    }
    public static function getinfo($field, $value, $table, $targetfiled)
    {
        $user = (new \yii\db\Query())
            ->select([$targetfiled])
            ->from($table)
            ->where([$field => $value])
            ->one();
        if($user)
        {
            return $user[$targetfiled];
        }
        else{
            return false;
        }
    }
}
