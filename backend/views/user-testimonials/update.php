<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\UserTestimonials */

$this->title = 'Update User Testimonials: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-testimonials-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
        'user_row' => $user_row,
        'vendor_row' => $vendor_row,
    ]) ?>

</div>
