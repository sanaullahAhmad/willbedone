<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update Customer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>
    <?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Update Customer</a></li>
        <li><a data-toggle="tab" href="#menu1">Update Profile</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Update Customer</h3>
            <?= $form->field($model, 'username') ?>

            <?php /*echo  $form->field($model, 'user_type')->dropdownList([
                'admin' => 'Admin',
                'normal' => 'Normal'
            ],
                ['prompt'=>'Select Customer Type']
            );*/ ?>
            <?= $form->field($model, 'email')->input('email') ?>
            <?= $form->field($model, 'phone') ?>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Update Profile</h3>
            <?php //echo "<pre>";print_r($model);exit;?>
            <?= $form->field($profilemodel, 'website') ?>
            <?= $form->field($profilemodel, 'address') ?>
            <?= $form->field($profilemodel, 'about') ?>
            <?= $form->field($profilemodel, 'phone') ?>
            <?= $form->field($profilemodel, 'full_name') ?>
            <?= $form->field($profilemodel, 'city') ?>
            <?= $form->field($profilemodel, 'country') ?>
            <?php echo  $form->field($profilemodel, 'profile_type')->dropdownList([
                'Type 1' => 'Type 1',
                'Type 2' => 'Type 2'
            ],
                ['prompt'=>'Select Profile Type']
            ); ?>
            <?php echo  $form->field($profilemodel, 'status')->dropdownList([
                '1' => 'Active',
                '0' => 'InActive'
            ],
                ['prompt'=>'Select']
            ); ?>
            <?php echo  $form->field($logouploadmodel, 'logo')->fileInput([ 'accept' => 'image/*']) ?>
            <?php if($profilemodel->getAttribute('logo') !=''){?>
                <div class = "form-group">
                    <img style="width: 200px;" src="../../frontend/web/uploads/customers/<?php echo $model->getAttribute('id');?>/<?php echo $profilemodel->getAttribute('logo');?>">
                </div>
            <?php }?>
            <?php echo  $form->field($coveruploadmodel, 'cover')->fileInput([ 'accept' => 'image/*']) ?>
            <?php if($profilemodel->getAttribute('cover') !=''){?>
                <div class = "form-group">
                    <img style="width: 200px;" src="../../frontend/web/uploads/customers/<?php echo $model->getAttribute('id');?>/<?php echo $profilemodel->getAttribute('cover');?>">
                </div>
            <?php }?>
        </div>
    </div>
<div class = "form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
        'name' => 'profile-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php //echo "<pre>";print_r($model);exit;?>
<?php /* echo  $this->render('_form', [
        'model' => $model,
    ])*/ ?>

<!--<div class="user-update">
</div>
<div class="user-profile">
    <h1>Profile</h1>
</div>-->
