<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id, 'user_vendors_id' => $model->user_vendors_id, 'user_vendors_id1' => $model->user_vendors_id1, 'user_builders_id' => $model->user_builders_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id, 'user_vendors_id' => $model->user_vendors_id, 'user_vendors_id1' => $model->user_vendors_id1, 'user_builders_id' => $model->user_builders_id], [
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
            /*'id',*/
            'title',
            /*'category',*/
            [
                'label' => 'Category',
                'value' => function ($model) {
                    return $model->getCategoryname($model->category);
                }
            ],
            'keywords',
            'starting_year',
            'ending_year',
            [
                'label' => 'country',
                'value' => function ($model) {
                    return $model->getCountryname($model->country);
                }
            ],
            'city',
            /*'status',*/
            ['attribute' => 'status',
                'label'=>'Status',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->status==1)
                    {
                        return "Active";
                    }
                    else{
                        return "InActive";
                    }
                }
            ],
            'date_created',
            'post_date',/*
            'user_id',
            'user_vendors_id',
            'user_vendors_id1',
            'user_builders_id',*/
            [
                'label' => 'User',
                'value' => function ($model) {
                    return $model->getUsername($model->user_id);
                }
            ],
            [
                'label' => 'Vendor',
                'value' => function ($model) {
                    return $model->getVendorname($model->user_vendors_id);
                }
            ],
            [
                'label' => 'Manufacturer',
                'value' => function ($model) {
                    return $model->getManufacturerename($model->user_vendors_id1);
                }
            ],
            [
                'label' => 'Builder',
                'value' => function ($model) {
                    return $model->getBuildername($model->user_builders_id);
                }
            ],
        ],
    ]) ?>

</div>
