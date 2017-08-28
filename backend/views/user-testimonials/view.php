<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\UserTestimonials */

$this->title = $model->getUsername($model->user_id);
$this->params['breadcrumbs'][] = ['label' => 'User Testimonials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-testimonials-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            /*'id',
            'user_id',*/

            [
                'label' => 'Testimonial from',
                'value' => function ($model) {
                    return $model->getUsername($model->user_from);
                }
            ],
            [
                'label' => 'Testimonial about',
                'value' => function ($model) {
                    return $model->getUsername($model->user_id);
                }
            ],
            'description',
            'date_created',
        ],
    ]) ?>

</div>
