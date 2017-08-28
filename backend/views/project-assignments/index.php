<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectAssignmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-assignments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Assignments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_created',
            'status',
            'projects_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
