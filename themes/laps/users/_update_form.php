<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 50]) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>
    <label>Status</label>
    <?= Html::activeDropDownList($model, 'status', array('active' => 'Active', 'inactive' => 'In Active'), array('class' => 'form-control', 'value' => $model->status)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
