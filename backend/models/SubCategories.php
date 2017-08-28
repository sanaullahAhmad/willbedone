<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $category
 * @property string $description
 * @property string $date_created
 * @property string $status
 *
 * @property ProductCategories[] $productCategories
 */
class SubCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id'], 'required'],
            [['id'], 'integer'],*/
            [['category', 'description', 'date_created', 'status', 'parent'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'category'      => 'Sub Category',
            'description'   => 'Description',
            'date_created'  => 'Date Created',
            'status'        => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategories::className(), ['categories_id' => 'id']);
    }

    public function getCatParent($id)
    {
        $category = (new \yii\db\Query())
            ->select(['category'])
            ->from('categories')
            ->where(['id' => $id])
            ->one();
        return $category['category'];
    }
    public static function getCategParent($id)
    {
        $category = (new \yii\db\Query())
            ->select(['category'])
            ->from('categories')
            ->where(['id' => $id])
            ->one();
        return $category['category'];
    }

}
