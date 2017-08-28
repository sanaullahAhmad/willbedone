<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Projects;

/**
 * ProjectsSearch represents the model behind the search form about `backend\models\Projects`.
 */
class ProjectsSearch extends Projects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_vendors_id', 'user_vendors_id1', 'user_builders_id'], 'integer'],
            [['title', 'category', 'keywords', 'starting_year', 'ending_year', 'country', 'city', 'status', 'date_created', 'post_date'], 'safe'],
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
        $query = Projects::find()->where("status != '00'");
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
            'date_created' => $this->date_created,
            'post_date' => $this->post_date,
            'user_id' => $this->user_id,
            'user_vendors_id' => $this->user_vendors_id,
            'user_vendors_id1' => $this->user_vendors_id1,
            'user_builders_id' => $this->user_builders_id,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'starting_year', $this->starting_year])
            ->andFilterWhere(['like', 'ending_year', $this->ending_year])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'status', $this->status]);
        return $dataProvider;
    }
}