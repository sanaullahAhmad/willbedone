<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductCategories */

$this->title = 'Update Product Categories: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'categories_id' => $model->categories_id, 'products_id' => $model->products_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
