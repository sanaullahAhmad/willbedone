<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductRatings */

$this->title = 'Update Product Ratings: ' . substr($model->rating, 0, 50);
$this->params['breadcrumbs'][] = ['label' => 'Product Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'products_id' => $model->products_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-ratings-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
