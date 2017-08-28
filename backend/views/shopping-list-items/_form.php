<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ShoppingListItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shopping-list-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'user_shopping_list_id')->textInput() ?>

    <?= $form->field($model, 'user_shopping_list_user_id')->textInput() ?>

    <?= $form->field($model, 'products_id')->textInput() ?>

    <?= $form->field($model, 'products_product_categories_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
