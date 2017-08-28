<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileRatingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-ratings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_added') ?>

    <?= $form->field($model, 'rating') ?>

    <?= $form->field($model, 'comments') ?>

    <?= $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'user_profiles_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
