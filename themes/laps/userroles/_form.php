<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-roles-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?= Html::activeDropDownList($model, 'role_name', array('' =>'Select Role' ,'clinical-coordinator' => 'Clinical Coordinator','labstaff' => 'Lab Staff', 'reviewer' => 'Reviewer', 'managingdirector' => 'Managing Director', 'admin' => 'Admin'), array('class' => 'form-control')) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>


    <?= Html::activeDropDownList($model, 'status', array('active' => 'Active', 'inactive' => 'In Active'), array('class' => 'form-control')) ?>

    <?= $form->field($model, 'users_id')->hiddenInput(['value' => $user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
