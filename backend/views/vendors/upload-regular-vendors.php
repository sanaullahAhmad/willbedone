<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendors */

$this->title = 'Upload Regular Vendors: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Upload Regular vendors'];
$this->params['breadcrumbs'][] = 'Upload';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>
<?php $form = ActiveForm::begin(['id' => 'registration-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Upload Regular Vendors</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Upload Vendors</h3>

        <div class="form-group">
            <label>&nbsp;Upload</label>
            <input type="file" name="regular_vendors_file" accept=".xlsx">
        </div>
    </div>
</div>
<div class = "form-group">
    <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary',
        'name' => 'submit-button']) ?>
</div>
<?php ActiveForm::end();