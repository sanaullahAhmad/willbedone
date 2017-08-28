<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserProfiles;

/**
 * UserProfilesSearch represents the model behind the search form about `backend\models\UserProfiles`.
 */
class UserProfilesSearch extends UserProfiles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['date_created', 'status', 'logo', 'cover', 'website', 'address', 'about', 'phone', 'full_name', 'city', 'country', 'profile_type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserProfiles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'date_created', $this->date_created])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'profile_type', $this->profile_type]);

        return $dataProvider;
    }
}
