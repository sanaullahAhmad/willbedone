<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */

$this->title = 'Update Sub Category: ' . $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categories-update">

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
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-creat']); ?>

            <?php echo  $form->field($model, 'parent')->dropdownList($cat_row,
                ['prompt'=>'Select']
            ); ?>
            <?= $form->field($model, 'category')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'description') ?>

            <?php echo  $form->field($model, 'status')->dropdownList([
                '1' => 'Active',
                '0' => 'InActive'
            ],
                ['prompt'=>'Select']
            ); ?>

            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
