<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductCategories;

/**
 * ProductCategoriesSearch represents the model behind the search form about `backend\models\ProductCategories`.
 */
class ProductCategoriesSearch extends ProductCategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categories_id', 'products_id'], 'integer'],
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
        $query = ProductCategories::find();

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
            'categories_id' => $this->categories_id,
            'products_id' => $this->products_id,
        ]);

        return $dataProvider;
    }
}
