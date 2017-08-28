<?php
$yearslist= array();
for($i=2000; $i<=2025; $i++)
{
    $yearslist[$i]=$i;
}
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = 'Create Project';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <?php //echo $this->render('_form', ['model' => $model,]); ?>

    <?php $form = ActiveForm::begin(['id' => 'project-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php echo  $form->field($model, 'title') ?>
    <?php echo  $form->field($model, 'category')->dropdownList($cat_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'keywords') ?>
    <?php //echo  $form->field($model, 'starting_year') ?>
    <?php //echo  $form->field($model, 'ending_year') ?>
    <?php echo  $form->field($model, 'starting_year')->dropdownList($yearslist, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'ending_year')->dropdownList($yearslist, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'country')->dropdownList($count_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'city') ?>

    <?php echo  $form->field($model, 'status')->dropdownList([
        '1' => 'Active',
        '0' => 'InActive'
    ],
        ['prompt'=>'Select']
    ); ?>
    <?php echo  $form->field($model, 'post_date') ?>
    <?php echo  $form->field($model, 'user_id')->dropdownList($user_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'user_vendors_id')->dropdownList($vendors_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'user_vendors_id1')->dropdownList($manufacturers_row, ['prompt'=>'Select']); ?>
    <?php echo  $form->field($model, 'user_builders_id')->dropdownList($builders_row, ['prompt'=>'Select']); ?>
    <div class = "form-group">
        <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary',
            'name' => 'button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
