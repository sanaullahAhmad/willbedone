<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ShoppingListItems;

/**
 * ShoppingListItemsSearch represents the model behind the search form about `backend\models\ShoppingListItems`.
 */
class ShoppingListItemsSearch extends ShoppingListItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_shopping_list_id', 'user_shopping_list_user_id', 'products_id', 'products_product_categories_id'], 'integer'],
            [['date_created'], 'safe'],
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
        $query = ShoppingListItems::find();

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
            'user_shopping_list_id' => $this->user_shopping_list_id,
            'user_shopping_list_user_id' => $this->user_shopping_list_user_id,
            'products_id' => $this->products_id,
            'products_product_categories_id' => $this->products_product_categories_id,
        ]);

        return $dataProvider;
    }
}
