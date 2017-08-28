<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeedsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leeds-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'size') ?>

    <?= $form->field($model, 'building_size') ?>

    <?= $form->field($model, 'service_required') ?>

    <?php // echo $form->field($model, 'finish_type') ?>

    <?php // echo $form->field($model, 'construction_priority') ?>

    <?php // echo $form->field($model, 'construction_type') ?>

    <?php // echo $form->field($model, 'lead_type') ?>

    <?php // echo $form->field($model, 'project_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'interior_design_required') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
