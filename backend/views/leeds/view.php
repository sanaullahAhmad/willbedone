<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Leeds */

$this->title = $model->lead_type;
$this->params['breadcrumbs'][] = ['label' => 'Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leeds-view">

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
            /*'id',*/
            'location',
            'size',
            'building_size',
            'service_required',
            'finish_type',
            'construction_priority',
            'construction_type',
            'lead_type',
            'project_type',
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
            'interior_design_required',
            /*'user_id',*/
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
            [
                'label' => 'Email',
                'value' => function ($model) {
                    return $model->getUserinfo($model->user_id, 'email');
                }
            ],
        ],
    ]) ?>

</div>
