<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfilesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'full_name') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'profile_type') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
