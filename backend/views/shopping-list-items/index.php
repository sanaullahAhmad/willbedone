<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShoppingListItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping List Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shopping List Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_created',
            'user_shopping_list_id',
            'user_shopping_list_user_id',
            'products_id',
            // 'products_product_categories_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
