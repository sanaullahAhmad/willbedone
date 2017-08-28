<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LeedAssignments */

$this->title = 'Create Leed Assignments';
$this->params['breadcrumbs'][] = ['label' => 'Leed Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leed-assignments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
