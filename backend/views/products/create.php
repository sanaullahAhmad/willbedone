<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

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

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'sku') ?>

            <?php echo  $form->field($model, 'status')->dropdownList([
                '1' => 'Active',
                '0' => 'InActive'
            ],
                ['prompt'=>'Select']
            ); ?>

            <?= $form->field($model, 'product_categories_id[]')->dropdownList($cat_row, ['prompt'=>'Select',
                'onchange'=>'
                $.get( "index.php?r=products/ajax-subcategory-list&id="+$(this).val(), function( data ) {
                  $( "#subcategory-list" ).html( data );
                });
            ']) ?>
            <div class="form-group" id="subcategory-list">

            </div>
            <?= $form->field($model, 'product_vendors_id[]')->checkboxList($vend_row) ?>

            <?php //echo  $form->field($model, 'product_categories_id')->dropdownList($cat_row, ['prompt'=>'Select']); ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
