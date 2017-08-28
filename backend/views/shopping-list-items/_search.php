<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShoppingListItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shopping-list-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'user_shopping_list_id') ?>

    <?= $form->field($model, 'user_shopping_list_user_id') ?>

    <?= $form->field($model, 'products_id') ?>

    <?php // echo $form->field($model, 'products_product_categories_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
