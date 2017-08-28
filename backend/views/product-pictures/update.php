<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductPictures */

$this->title = 'Update Product Pictures: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'products_id' => $model->products_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-pictures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
