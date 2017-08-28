<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeedAssignmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leed-assignments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'leeds_id') ?>

    <?= $form->field($model, 'leeds_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
