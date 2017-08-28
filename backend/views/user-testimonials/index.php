<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserTestimonialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Testimonials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-testimonials-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Testimonials', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_from',*/

            [
                'label' => 'Testimonial from',
                'value' => function ($model) {
                    return $model->getUsername($model->user_from);
                }
            ],
            [
                'label' => 'Testimonial about',
                'value' => function ($model) {
                    return $model->getUsername($model->user_id);
                }
            ],

            'description',
            'date_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
