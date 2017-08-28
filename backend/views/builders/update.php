<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendors */

$this->title = 'Update Builder: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Builders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $builder_id, 'user_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>

<?php /*echo  $this->render('_form', [
        'model' => $model,
    ])*/ ?>

<?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Update Builder</a></li>
    <li><a data-toggle="tab" href="#menu1">Update Profile</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Update Builder</h3>
        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'phone') ?>
    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Update Profile</h3>
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
        <?php //echo  $form->field($profilemodel, 'logo')->fileInput() ?>
        <?php //echo $form->field($profilemodel, 'cover')->fileInput() ?>
        <?php echo  $form->field($logouploadmodel, 'logo')->fileInput([ 'accept' => 'image/*']) ?>
        <?php if($profilemodel->getAttribute('logo') !=''){?>
            <div class = "form-group">
                <img style="width: 200px;" src="../../frontend/web/uploads/builders/<?php echo $builder_id;?>/<?php echo $profilemodel->getAttribute('logo');?>">
            </div>
        <?php }?>
        <?php echo  $form->field($coveruploadmodel, 'cover')->fileInput([ 'accept' => 'image/*']) ?>
        <?php if($profilemodel->getAttribute('cover') !=''){?>
            <div class = "form-group">
                <img style="width: 200px;" src="../../frontend/web/uploads/builders/<?php echo $builder_id;?>/<?php echo $profilemodel->getAttribute('cover');?>">
            </div>
        <?php }?>
    </div>
</div>
<div class = "form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
        'name' => 'profile-button']) ?>
</div>
<?php ActiveForm::end(); ?>

