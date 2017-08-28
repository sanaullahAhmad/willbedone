<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProjectAssignments */

$this->title = 'Create Project Assignments';
$this->params['breadcrumbs'][] = ['label' => 'Project Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-assignments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
