<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'title',
            /*'category',
            ['attribute' => 'category',
                'label'=>'Category',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a($model->category->category, ['categories/view', 'id'=>$model->categories->id]);
                }
            ],*/
            'keywords',
            'starting_year',
            // 'ending_year',
             //'country',
            [
                'label' => 'country',
                'value' => function ($model) {
                    return $model->getCountryname($model->country);
                }
            ],
            // 'city',
            // 'status',
            // 'date_created',
            // 'post_date',
            // 'user_id',
            // 'user_vendors_id',
            // 'user_vendors_id1',
            // 'user_builders_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
