<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductRatingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-ratings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Product Ratings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'rating',
            /*'status',*/
            [
                'label' => 'Status',
                'value' => function ($model) {
                    if ($model->status == 1) {
                        return "Approved";
                    } else {
                        return "Pending";

                    }
                }
            ],
            /*'products_id',*/
            [
                'label' => 'Product',
                'value' => function ($model) {
                        return \backend\models\Products::getinfo('id', $model->products_id, "products", 'name');
                }
            ],
            [
                'label' => 'Phone Numebr',
                'value' => 'ratingphonenumebr'
            ],

            'date_added',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
