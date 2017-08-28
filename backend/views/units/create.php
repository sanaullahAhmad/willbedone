<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Units */

$this->title = 'Create Units';
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="units-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
