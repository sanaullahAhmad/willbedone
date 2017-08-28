<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\models\User;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    <p>
        <?= Html::a('Create Vendors', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Upload Regular Vendors', ['upload-regular-vendors'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    //$model = new User();
    //echo  "<pre>";print_r($model);exit;
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'label' => 'Vendor Type',
                'value' => function ($model) {
                    if( Products::getInfo('user_id',$model->user_id, 'vendors','vendor_type')==0)
                    {
                        return "Gold";
                    }
                    else{
                        return "Regular";
                    }
                }
            ],
            [
                'label'=>'Veiw Porfile',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/vendor-profile&id='.$model->id.'&user_id='.$model->user_id, "http").'">Profile</a>';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
