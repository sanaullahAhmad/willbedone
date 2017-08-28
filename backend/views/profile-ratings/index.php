<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileRatingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-ratings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile Ratings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_added',
            'rating',
            'comments',
            'ip',
            // 'user_profiles_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
