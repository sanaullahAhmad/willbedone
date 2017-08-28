<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $title
 * @property string $category
 * @property string $keywords
 * @property string $starting_year
 * @property string $ending_year
 * @property string $country
 * @property string $city
 * @property string $status
 * @property string $date_created
 * @property string $post_date
 * @property integer $user_id
 * @property integer $user_vendors_id
 * @property integer $user_vendors_id1
 * @property integer $user_builders_id
 *
 * @property ProjectAssignments[] $projectAssignments
 * @property Users $user
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city', 'user_id', 'user_vendors_id', 'user_vendors_id1', 'user_builders_id'], 'required'],
            [['id', 'user_id', 'user_vendors_id', 'user_vendors_id1', 'user_builders_id'], 'integer'],
            [['date_created', 'post_date'], 'safe'],
            [['title', 'category', 'keywords', 'starting_year', 'ending_year', 'country', 'city', 'status'], 'string', 'max' => 45],
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
            'title' => 'Title',
            'category' => 'Category',
            'keywords' => 'Keywords',
            'starting_year' => 'Starting Year',
            'ending_year' => 'Ending Year',
            'country' => 'Country',
            'city' => 'city',
            'status' => 'Status',
            'date_created' => 'Date Created',
            'post_date' => 'Post Date',
            'user_id' => 'User',
            'user_vendors_id' => 'Vendor',
            'user_vendors_id1' => 'Manufacturer',
            'user_builders_id' => 'Builder',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAssignments()
    {
        return $this->hasMany(ProjectAssignments::className(), ['projects_id' => 'id']);
    }
    public function getProjectPictures()
    {
        return $this->hasMany(ProjectPictures::className(), ['projects_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }



    public function getCategoryname($id)
    {
        $user = (new \yii\db\Query())
            ->select(['category'])
            ->from('categories')
            ->where(['id' => $id])
            ->one();
        return $user['category'];
    }
    public function getCountryname($id)
    {
        if(is_numeric ($id)) {
            $country = (new \yii\db\Query())
                ->select(['country_name'])
                ->from('countries')
                ->where(['id' => $id])
                ->one();
            return $country['country_name'];
        }
        else
        {
            return $id;
        }
    }

    public function getUsername($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        return $user['username'];
    }
    //

    public function getVendorname($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        return $user['username'];
    }
    //

    public function getManufacturerename($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        return $user['username'];
    }
    //

    public function getBuildername($id)
    {
        $user = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $id])
            ->one();
        return $user['username'];
    }

}
