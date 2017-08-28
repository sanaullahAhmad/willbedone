<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'covers')->fileInput(); ?>

<?= Html::submitButton('Upload') ?>

<?php ActiveForm::end() ?>