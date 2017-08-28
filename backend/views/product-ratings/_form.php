<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductRatings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-ratings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'date_added')->textInput() ?>

    <?php //echo $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?php echo  $form->field($model, 'status')->dropdownList([
            '1'         => 'Approved',
            '0'         => 'Pending',
        ]
    ); ?>

    <?php //echo $form->field($model, 'products_id')->textInput() ?>
    <?php echo  $form->field($model, 'products_id')->dropdownList([
            $model->products_id         => \backend\models\Products::getinfo('id', $model->products_id, "products", 'name'),
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
