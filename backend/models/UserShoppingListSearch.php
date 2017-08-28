<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserShoppingList;

/**
 * UserShoppingListSearch represents the model behind the search form about `backend\models\UserShoppingList`.
 */
class UserShoppingListSearch extends UserShoppingList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'date_created', 'status', 'user_id'], 'safe'],
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
        $query = UserShoppingList::find()->orderBy('id DESC');

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
            /*'user_id' => $this->user_id,*/
        ]);


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'date_created', $this->date_created]);
        if($this->user_id!=''  ){
            $user = (new \yii\db\Query())
                ->select(['id'])
                ->from('user')
                ->where(['username' => $this->user_id])
                ->one();
            $query->andFilterWhere(['like', 'user_id', $user['id']]);
            //echo "<pre>";print_r($query);exit;
        }
        return $dataProvider;
    }
}
