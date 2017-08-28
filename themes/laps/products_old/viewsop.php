<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Sops;

if ($search) {
    $this->title = 'Search Results';
} else {
    $this->title = 'Approved SOPs';
}
?>

<div class="row">
    <div class="col-md-6">
        <?php
        if ($search) {
            ?>
            <h3>Search Results</h3>
            <?php
        } else {
            ?>
            <h3>Approved SOPs</h3>
            <?php
        }
        ?>

    </div>
    <div class="col-md-6">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['products/searchsop']
        ]);
        ?>
        <input type="text" name="sop" class="form-control" placeholder="Search SOP by their SOP No">
        <input type="hidden" name="product_id" value="<?= $product_id ?>">
        <?php ActiveForm::end(); ?>
    </div>
</div>


<table class="table table-striped table-hover panel panel-gray">

    <tr>
        <th>Sr. #</th>
        <th>SOP</th>
        <th>SOP Status</th>
        <th>SOP Type</th>
        <th>Actions</th>
    </tr>


    <?php
    if (count($product_sops) > 0) {
        $count = 1;
        foreach ($product_sops as $ps) {
            $sop = Sops::findOne($ps->sop_id);
            ?>
            <tr>
                <td><?= $count; ?></td>
                <td><?= $sop->description; ?></td>
                <td><?= $ps->status; ?></td>
                <td><?= $ps->type; ?></td>
                <td><?= Html::a('View Detail', Url::to(['products/sopdetail', 'id' => $ps->products_id, 'sopnum' => substr($sop->title, 3)]), ['class' => 'sop_sopdetail']); ?></td>
            </tr>
            <?php
            $count++;
        }
    } else {
        ?>
        <div class="row">No Approved SOPs</div>
        <?php
    }
    ?>

</table>
<div>&nbsp;</div>
