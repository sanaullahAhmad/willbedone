<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ShoppingListItems */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shopping List Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_shopping_list_id' => $model->user_shopping_list_id, 'user_shopping_list_user_id' => $model->user_shopping_list_user_id, 'products_id' => $model->products_id, 'products_product_categories_id' => $model->products_product_categories_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_shopping_list_id' => $model->user_shopping_list_id, 'user_shopping_list_user_id' => $model->user_shopping_list_user_id, 'products_id' => $model->products_id, 'products_product_categories_id' => $model->products_product_categories_id], [
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
            'id',
            'date_created',
            'user_shopping_list_id',
            'user_shopping_list_user_id',
            'products_id',
            'products_product_categories_id',
        ],
    ]) ?>

</div>
