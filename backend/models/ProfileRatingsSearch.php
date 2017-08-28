<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProfileRatings;

/**
 * ProfileRatingsSearch represents the model behind the search form about `backend\models\ProfileRatings`.
 */
class ProfileRatingsSearch extends ProfileRatings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_profiles_id'], 'integer'],
            [['date_added', 'rating', 'comments', 'ip'], 'safe'],
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
        $query = ProfileRatings::find();

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
            'user_profiles_id' => $this->user_profiles_id,
        ]);

        $query->andFilterWhere(['like', 'date_added', $this->date_added])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
