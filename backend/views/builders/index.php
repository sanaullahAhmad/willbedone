<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuildersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Builders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('Create Builders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                    $id =  $model->getsingleUsers();
                    return $model->getVendorname($id);
                }
            ],
            [
                'label' => 'Email',
                'value' => function ($model) {
                    $id =  $model->getsingleUsers();
                    return $model->getVendoremail($id);
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    $id =  $model->getsingleUsers();
                    return $model->getVendorphone($id);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
