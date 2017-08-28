<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeedsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leeds-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Leeds', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'lead_type',
            [
                'label' => 'User Name',
                'value' => function ($model) {
                    return $model->getUserinfo($model->user_id, 'username');
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    return $model->getUserinfo($model->user_id, 'phone');
                }
            ],
            'location',
            'size',
            'building_size',
            //'service_required',
            // 'finish_type',
            // 'construction_priority',
            // 'construction_type',
            // 'project_type',
            // 'status',
            // 'date_created',
            // 'interior_design_required',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
