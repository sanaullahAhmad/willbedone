<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductRatings;

/**
 * ProductRatingsSearch represents the model behind the search form about `backend\models\ProductRatings`.
 */
class ProductRatingsSearch extends ProductRatings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'products_id'], 'integer'],
            [['rating', 'date_added', 'status'], 'safe'],
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
        $query = ProductRatings::find();

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
            'date_added' => $this->date_added,
            'products_id' => $this->products_id,
        ]);

        $query->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
