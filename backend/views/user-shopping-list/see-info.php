<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserShoppingList */

$this->title = 'Information requested : ' . $model->shopping_list_item_id;
$this->params['breadcrumbs'][] = ['label' => 'User Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Information requested';
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);

?>
<?php $form = ActiveForm::begin(); ?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php /*echo $this->render('_form', [
        'model'     => $model,
        'users_row' => $users_row,
    ])*/ ?>
</div>
<div class="form-group">
    <a class="btn btn-primary" onclick="window.history.back();">Go Back</a>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Information Requested</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Requested Information</h3>
        <?php // echo $form->field($model, 'shopping_list_item_id')->textInput(['maxlength' => true])
        //   $form->field($model, 'date_created')->textInput(['maxlength' => true]);
        ?>
        <?=  $form->field($model, 'is_send_price_qoute')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        )->label('I have a general request, please call me'); ?>
        <?=  $form->field($model, 'is_general_request')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        ); ?>
        <?=  $form->field($model, 'is_send_catalogue')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        )->label('Please send me your catalogue'); ?>
        <?=  $form->field($model, 'is_send_more_info')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        )->label('Please send me more product information'); ?>
        <?=  $form->field($model, 'is_nearest_dealer')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        )->label('Where can I find the nearest dealers?'); ?>
        <?=  $form->field($model, 'is_send_spec_sheet')->dropdownList([
                '1' => 'Yes',
                '0' => 'No'
            ]
        )->label('Please send me spec sheet'); ?>
        <?= $form->field($model, 'message')->textarea(['maxlength' => true]) ?>
        <?= $form->field($model, 'who_are_you')->textInput(['maxlength' => true]) ?>


    </div>
</div>
<?php ActiveForm::end(); ?>
