<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "architectural_categories".
 *
 * @property integer $id
 * @property string $category
 * @property string $description
 * @property string $date_created
 * @property integer $status
 */
class ArchitecturalCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'architectural_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'description', 'date_created', 'status'], 'required'],
            [['description'], 'string'],
            [['date_created'], 'safe'],
            [['status'], 'integer'],
            [['category'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'status' => 'Status',
        ];
    }
}
