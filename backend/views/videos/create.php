<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = 'Add Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
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
    <?php echo  $form->field($model, 'related_to')->dropdownList([
        'vendors'       => 'Vendors',
        'architects'    => 'Architects',
        'manufacturers' => 'Manufacturers',
        'products'      => 'Products',
    ],
        ['prompt'=>'Select','onchange'=>'
                $.get( "index.php?r=videos/ajax-related-with-list&related_to="+$(this).val(), function( data ) {
                  $( "#videos-related_id" ).html( data );
                });
            ']
    ); ?>
    <?php echo  $form->field($model, 'related_id')->dropdownList([
        ''       => 'Select',
    ]
    )->label('Related With'); ?>

    <?php echo  $form->field($model, 'title') ?>
    <?php echo  $form->field($model, 'url')->textInput( ['onchange'=>'
                url = $(this).val().split("watch?v=");
                $( "#youtubevideo" ).attr("src", "https://www.youtube.com/embed/"+url[1] );
            ']) ?>

    <?php echo  $form->field($model, 'description') ?>
    <div class = "form-group">
        <iframe id="youtubevideo" width="420" height="315"
                src="https://www.youtube.com/embed/4b8ZNOdF3HE">
        </iframe>
    </div>
    <div class = "form-group">
        <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary',
            'name' => 'button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
