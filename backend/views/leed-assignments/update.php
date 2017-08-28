<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LeedAssignments */

$this->title = 'Update Leed Assignments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leed Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'leeds_id' => $model->leeds_id, 'leeds_user_id' => $model->leeds_user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leed-assignments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
