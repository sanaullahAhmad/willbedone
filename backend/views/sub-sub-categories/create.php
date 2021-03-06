<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Categories */

$this->title = 'Create Sub Sub Category';
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

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
                ['prompt'=>'Select', 'onchange'=>'
                $.get( "index.php?r=sub-sub-categories/ajax-subcategory-list&id="+$(this).val(), function( data ) {
                  $( ".field-subsubcategories-sub_parent" ).html( data );
                });
            ']
            ); ?>
            <?php echo  $form->field($model, 'sub_parent')->dropdownList($sub_cat_row,
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
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
