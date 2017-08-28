<?php

namespace backend\models;


use Yii;
use backend\models\User;

/**
 * This is the model class for table "vendors".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property Users $user
 */
class Vendors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_id'], 'required'],
            [['id', 'user_id', 'vendor_type'], 'integer'],

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
            'user_id' => 'Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProductVendors()
    {
         $val = $this->hasMany(ProductVendors::className(), ['vendors_id' => 'id']);
        // echo "<pre>";print_r($val);echo "</pre>";
        return $val;
    }
    public static function vendorsandproduct()
    {
        $items = (new \yii\db\Query())
            ->select('*,product_pictures.id as product_pictures_id, product_pictures.file as product_pictures_file')
            ->from('vendors')
            ->innerJoin('product_vendors','product_vendors.vendors_id=vendors.id')
            ->innerJoin('product_pictures','product_vendors.products_id=product_pictures.products_id')
            ->innerJoin('products','product_vendors.products_id=products.id')
            ->innerJoin('user_profiles','vendors.user_id=user_profiles.user_id')
            ->all();
        //echo "<pre>";print_r($items);exit;
        return $items;
    }
    public static function homepagevendors()
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('vendors')
            ->all();
        return $items;
    }
    public static function homepagevendorsproducts($vendor_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('product_vendors')
            ->where(['vendors_id' => $vendor_id])
            ->one();
        return $items;
    }
    public static function homepagevendorsprofile($user_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('user_profiles')
            ->where(['user_id' => $user_id])
            ->one();
        return $items;
    }
    public static function homepagevendorsproductspictures($product_id)
    {
        $items = (new \yii\db\Query())
            ->select('*')
            ->from('product_pictures')
            ->where(['products_id' => $product_id])
            ->all();
        return $items;
    }
    public function getUserProfiles()
    {
        return $this->hasOne(UserProfiles::className(), ['user_id' => 'user_id']);
    }

    public function getsingleUsers()
    {
        $myreturn = $this->hasOne(User::className(), ['id' => 'user_id']);
        return $myreturn->primaryModel->attributes['user_id'];
    }
    public function getVendorname($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['username'];
    }
    public function getVendoremail($id)
    {
        $user = (new \yii\db\Query())
            ->select(['email'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['email'];
    }
    public function getVendorphone($id)
    {
        $user = (new \yii\db\Query())
            ->select(['phone'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        //var_dump($user);exit;
        return $user['phone'];
    }
}
