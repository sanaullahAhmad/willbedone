<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductPicturesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Pictures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-pictures-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Pictures', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'file',
            'date_created',
            'status',
            'products_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
