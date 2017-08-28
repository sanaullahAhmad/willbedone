<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use frontend\models\Sops;

$this->title = 'Pending SOPs';
?>

<div class="row">
    <div class="col-md-6"> <h3>Pending SOPs</h3></div>
</div>





<?php
if (count($pending_sops) > 0) {
    ?>
    <table class="table table-striped table-hover panel panel-gray">

        <tr>
            <th>Sr. #</th>
            <th>Product Status</th>
            <th>SOP Status</th>
            <th>SOP #</th>
            <th>Product MSCID</th>
            <th>Actions</th>
        </tr>
        <?php
        $count = 1;
        foreach ($pending_sops as $ps) {
            $product = Products::findOne($ps->products_id);
            $sop = Sops::findOne($ps->sop_id);
            ?>
            <tr>
                <td><?= $count; ?></td>
                <td><?= $product->status ?></td>
                <td><?= $ps->status; ?></td>
                <td><?= $sop->description ?></td>
                <td><?= $product->MSCID ?></td>
                <td><?= Html::a('View SOPs', Url::to(['products/sopdetail', 'id' => $product->id, 'sopnum' => substr($sop->title, 3)]), ['class' => 'sop_sopdetail']); ?></td>
            </tr>

            <?php
            $count++;
        }
        ?>
    </table>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
} else {
    ?>
    <div class="row">No Pending SOPs</div>
    <?php
}
?>



