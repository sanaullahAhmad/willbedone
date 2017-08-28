<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserTestimonials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-testimonials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*echo  $form->field($model, 'user_id')->textInput()*/ ?>

    <?php echo  $form->field($model, 'user_id')->dropdownList($vendor_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'user_from')->dropdownList($user_row, ['prompt'=>'Select']); ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?php /*echo  $form->field($model, 'date_created')->textInput()*/ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
