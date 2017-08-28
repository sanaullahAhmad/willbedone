<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Architects */

$this->title = 'Create Architect';
$this->params['breadcrumbs'][] = ['label' => 'Architect', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="architects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
