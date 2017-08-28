<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user_profiles".
 *
 * @property integer $id
 * @property string $date_created
 * @property string $status
 * @property string $logo
 * @property string $cover
 * @property string $website
 * @property string $address
 * @property string $about
 * @property string $phone
 * @property string $full_name
 * @property string $city
 * @property string $country
 * @property string $profile_type
 * @property integer $user_id
 *
 * @property ProfileRatings[] $profileRatings
 * @property Users $user
 */
class UserProfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profiles';
    }
    public $logo;
    public $cover;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['address', 'about'], 'string'],
            [['logo','cover'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png', 'maxFiles' => 1],
            [['date_created', 'status', 'logo', 'cover', 'website', 'phone', 'full_name', 'city', 'country', 'profile_type', 'business_type', 'registration_number'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'date_created'  => 'Date Created',
            'status'        => 'Status',
            'logo'          => 'Logo',
            'cover'         => 'Cover',
            'cataloguefile' => 'Catalogue File',
            'dealerlistfile'=> 'Dealer Listfile',
            'website'       => 'Website',
            'address'       => 'Address',
            'about'         => 'About',
            'phone'         => 'Phone',
            'full_name'     => 'Full Name',
            'city'          => 'City',
            'country'       => 'Country',
            'profile_type'  => 'Profile Type',
            'business_type' => 'Business Type',
            'user_id'       => 'Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileRatings()
    {
        return $this->hasMany(ProfileRatings::className(), ['user_profiles_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function upload() {
        $path = Yii::getAlias('@backend') .'/web/uploads/';
        /*if ($this->validate()) {*/
            //echo $path;exit;
            $this->logo->saveAs($path . $this->logo->baseName . '.' .
                $this->logo->extension);
            return true;
        /*} else {
            return false;
        }*/
    }
}
