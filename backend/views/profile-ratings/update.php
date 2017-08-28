<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfileRatings */

$this->title = 'Update Profile Ratings: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_profiles_id' => $model->user_profiles_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-ratings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
