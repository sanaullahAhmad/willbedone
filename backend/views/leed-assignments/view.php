<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LeedAssignments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leed Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leed-assignments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'leeds_id' => $model->leeds_id, 'leeds_user_id' => $model->leeds_user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'leeds_id' => $model->leeds_id, 'leeds_user_id' => $model->leeds_user_id], [
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
            'status',
            'leeds_id',
            'leeds_user_id',
        ],
    ]) ?>

</div>
