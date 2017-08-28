<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'name',
            'sku',
            'date_created',
            /*'status',*/
            ['attribute' => 'status',
                'label'=>'Status',
                'format' => 'html',
                'value' => function ($model) {
                    //echo "<pre>";print_r($model->status);exit;
                    if($model->status==1)
                    {
                        return "Active";
                    }
                    else{
                        return "InActive";
                    }
                    //return Html::a($model->customer->first_name." ".$model->customer->last_name, ['customers/view', 'id'=>$model->customer->id]);
                }
            ],

            [
                'label'=>'Veiw Product',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/product&id='.$model->id, "http").'">Click here</a>';
                },
            ],
            // 'product_categories_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
