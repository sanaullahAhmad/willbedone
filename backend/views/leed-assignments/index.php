<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeedAssignmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leed Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leed-assignments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Leed Assignments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_created',
            'status',
            'leeds_id',
            'leeds_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
