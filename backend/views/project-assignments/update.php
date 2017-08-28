<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectAssignments */

$this->title = 'Update Project Assignments: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'projects_id' => $model->projects_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-assignments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
