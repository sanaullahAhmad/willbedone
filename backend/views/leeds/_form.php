<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Leeds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="update-leed">
    <div class="row">
        <div class="col-lg-7">
        <?php $form = ActiveForm::begin(); ?>

        <?php /*= $form->field($model, 'id')->textInput() */?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'building_size')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'service_required')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'finish_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'construction_priority')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'construction_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lead_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'project_type')->textInput(['maxlength' => true]) ?>


            <?=  $form->field($model, 'status')->dropdownList([
                '1' => 'Active',
                '0' => 'InActive'
            ],
                ['prompt'=>'Select']
            ); ?>

        <?php /* = $form->field($model, 'date_created')->textInput()*/ ?>

        <?= $form->field($model, 'interior_design_required')->textInput(['maxlength' => true]) ?>

        <?php //echo $form->field($model, 'user_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-5"></div>
    </div>

</div>
