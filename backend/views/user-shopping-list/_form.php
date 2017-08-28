<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserShoppingList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-shopping-list-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?=  $form->field($model, 'status')->dropdownList([
        '1' => 'Processed',
        '0' => 'Pending'
    ],
        ['prompt'=>'Select']
    ); ?>
    <?=  $form->field($model, 'user_id')->dropdownList($users_row,
        ['prompt'=>'Select User', 'id' => 'user_id']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
