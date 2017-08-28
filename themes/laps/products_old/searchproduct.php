<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = 'Search Results';
?>

<div class="row">
    <div class="col-md-6"> <h3>Search Results</h3></div>
    <div class="col-md-6">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['products/searchproduct']
        ]);
        ?>
        <input type="text" name="product" class="form-control" placeholder="Search Products by their MSCID">
        <?php ActiveForm::end(); ?>

    </div>

</div>



    <?php
    if (count($products) > 0) {
        ?>
        <table class="table table-striped table-hover panel panel-gray">
            <tr>
                <th>Sr. #</th>
                <th>Product</th>
                <th>Product Status</th>
                <th>Actions</th>
            </tr>
            <?php
            $count = 1;
            foreach ($products as $ps) {
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $ps->MSCID; ?></td>
                    <td><?php echo $ps->status; ?></td>
                    <td><?= Html::a('View SOPs', Url::to(['products/viewsop', 'id' => $ps->id]), ['class' => 'sop_sopdetail']); ?></td>
                </tr>

                <?php
                $count++;
            }
            ?>
        </table>
        <?php
    } else {
        ?>
        <div class="row"><h4>No Result Found</h4></div>
        <?php
    }
    ?>


