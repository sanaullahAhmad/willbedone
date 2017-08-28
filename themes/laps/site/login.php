<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\LapsAsset;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<div id="login" class="container">
    <div class="row center-panel ">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
            <div class="col-lg-12 white-bg animated fadeInDown panel-body-only custom-check">
                <div class="avatar avatar-md"><img src="../../themes/laps/img/laps.png" alt="LAPS" class="img" width="300"></div>

                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-signin']); ?>
                <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => "Username"])->label(FALSE) ?>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => "Password"])->label(FALSE) ?>
                <?= Html::submitButton('<span class="icon-user text-transparent"></span>&nbsp;&nbsp;&nbsp;Sign in', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
                <label class="checkbox pull-right">
                    <button type="button" class="btn btn-default">Contact Admin</button>
                </label>
                <a href="#" class="pull-left need-help">Forget Password?</a>
                <?php ActiveForm::end(); ?>
                <span class="clearfix"></span>
            </div>
            <br>
        </div>
    </div>
</div>