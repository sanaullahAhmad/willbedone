<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'product_categories_id' => $model->product_categories_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'product_categories_id' => $model->product_categories_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'name',
            'sku',
            'date_created',
            /*'status',*/
            ['attribute' => 'status',
                'label'=>'Status',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->status==1)
                    {
                        return "Active";
                    }
                    else{
                        return "InActive";
                    }
                }
            ],
            [
                'label'=>'Veiw Product',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/product&id='.$model->id, "http").'">Click Here</a>';
                },
            ],
            /*'product_categories_id',*/
        ],
    ]) ?>

</div>
