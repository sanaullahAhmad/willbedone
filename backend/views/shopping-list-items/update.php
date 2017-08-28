<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ShoppingListItems */

$this->title = 'Update Shopping List Items: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shopping List Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_shopping_list_id' => $model->user_shopping_list_id, 'user_shopping_list_user_id' => $model->user_shopping_list_user_id, 'products_id' => $model->products_id, 'products_product_categories_id' => $model->products_product_categories_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shopping-list-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
