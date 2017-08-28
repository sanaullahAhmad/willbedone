<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property integer $id
 * @property string $related_to
 * @property integer $related_id
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $date_added
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['related_to', 'related_id', 'url', 'title', 'description', 'date_added'], 'required'],
            [['related_id'], 'integer'],
            [['description'], 'string'],
            [['date_added'], 'safe'],
            [['related_to', 'title'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'related_to' => 'Related To',
            'related_id' => 'Related ID',
            'url' => 'Url',
            'title' => 'Title',
            'description' => 'Description',
            'date_added' => 'Date Added',
        ];
    }
}
