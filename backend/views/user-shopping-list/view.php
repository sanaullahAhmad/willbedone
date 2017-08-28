<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\UserShoppingList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-shopping-list-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
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
            'name',
            'date_created',
            ['attribute' => 'status',
                'label'=>'Status',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->status==1)
                    {
                        return "Processed";
                    }
                    else{
                        return "Pending";
                    }
                }
            ],
            [
                'label' => 'User Name',
                'value' => function ($model) {
                    return $model->getInfo($model->user_id,'username', 'user');
                }
            ],
        ],
    ]) ?>

</div>
