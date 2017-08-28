<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductRatings */

$this->title = substr($model->rating, 0, 50);
$this->params['breadcrumbs'][] = ['label' => 'Product Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-ratings-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'products_id' => $model->products_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'products_id' => $model->products_id], [
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
            'rating',
            'date_added',
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
            [
                'label' => 'Product',
                'value' => function ($model) {
                    return \backend\models\Products::getinfo('id', $model->products_id, "products", 'name');
                }
            ],
            'ratingphonenumebr'
        ],
    ]) ?>

</div>
