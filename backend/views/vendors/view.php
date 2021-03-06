<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendors */

$this->title = $model->getVendorname($model->user_id);
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',
            'user_id',*/
            [
                'label' => 'User Name',
                'value' => function ($model) {
                    return $model->getVendorname($model->user_id);
                }
            ],
            [
                'label' => 'Email',
                'value' => function ($model) {
                    return $model->getVendoremail($model->user_id);
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    return $model->getVendorphone($model->user_id);
                }
            ],

            [
                'label'=>'Veiw Porfile',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/vendor-profile&id='.$model->id.'&user_id='.$model->user_id, "http").'">Click Here</a>';
                },
            ],
        ],
    ]) ?>

</div>
