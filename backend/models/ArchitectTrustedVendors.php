<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "architect_trusted_vendors".
 *
 * @property integer $id
 * @property integer $vendors_id
 * @property integer $architects_id
 *
 * @property Architects $architects
 * @property Vendors $vendors
 */
class ArchitectTrustedVendors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'architect_trusted_vendors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vendors_id', 'architects_id'], 'required'],
            [['id', 'vendors_id', 'architects_id'], 'integer'],
            [['architects_id'], 'exist', 'skipOnError' => true, 'targetClass' => Architects::className(), 'targetAttribute' => ['architects_id' => 'id']],
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
            'architects_id' => 'Architects ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchitects()
    {
        return $this->hasOne(Architects::className(), ['id' => 'architects_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasOne(Vendors::className(), ['id' => 'vendors_id']);
    }
}
