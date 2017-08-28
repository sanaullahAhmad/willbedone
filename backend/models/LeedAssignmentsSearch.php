<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LeedAssignments;

/**
 * LeedAssignmentsSearch represents the model behind the search form about `backend\models\LeedAssignments`.
 */
class LeedAssignmentsSearch extends LeedAssignments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'leeds_id', 'leeds_user_id'], 'integer'],
            [['date_created', 'status'], 'safe'],
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
        $query = LeedAssignments::find();

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
            'leeds_id' => $this->leeds_id,
            'leeds_user_id' => $this->leeds_user_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
