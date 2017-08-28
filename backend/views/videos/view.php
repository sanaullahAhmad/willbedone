<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'title',
            'related_to',
            [
                'label' => 'Related With',
                'value' => function ($model) {
                    if ($model->related_to == 'products') {
                        return \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'name');
                    } else {
                        $user_id = \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'user_id');
                        return \backend\models\Products::getinfo('user_id', $user_id, 'user_profiles', 'full_name');

                    }
                }
            ],
        ],
    ]) ?>

</div>
