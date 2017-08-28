<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Leeds;

/**
 * LeedsSearch represents the model behind the search form about `backend\models\Leeds`.
 */
class LeedsSearch extends Leeds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['location', 'size', 'building_size', 'service_required', 'finish_type', 'construction_priority', 'construction_type', 'lead_type', 'project_type', 'status', 'date_created', 'interior_design_required'], 'safe'],
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
        $query = Leeds::find();

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
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'building_size', $this->building_size])
            ->andFilterWhere(['like', 'service_required', $this->service_required])
            ->andFilterWhere(['like', 'finish_type', $this->finish_type])
            ->andFilterWhere(['like', 'construction_priority', $this->construction_priority])
            ->andFilterWhere(['like', 'construction_type', $this->construction_type])
            ->andFilterWhere(['like', 'lead_type', $this->lead_type])
            ->andFilterWhere(['like', 'project_type', $this->project_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'interior_design_required', $this->interior_design_required]);

        return $dataProvider;
    }
}
