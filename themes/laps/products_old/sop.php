<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\ProductInfusionSops;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Product SOPs';
?>



<div class="row">
    <div class="col-md-6">
        <div class="heading-block">
            <h2>Products</h2>
        </div>
    </div>
    <div class="col-md-6">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['products/sopsearch']
        ]);
        ?>
        <input type="text" name="sopquery" class="form-control" placeholder="Search SOP's by their MSCID">
        <input type="hidden" name="sop" value="<?php echo $sopnum; ?>">
<?php ActiveForm::end(); ?>
    </div>
</div>
<div class="cleafix"></div>
<?php
if (count($products) > 0) {
    ?>
    <table class="table table-striped table-hover panel panel-gray">
        <tr>
            <th>Sr. #</th>
            <th>MSCID</th>
            <th>Product Status</th>
            <th>SOP Status</th>
            <th>Current SOP</th>
        </tr>

        <?php
        $count = 1;
        foreach ($products as $product) {
            $productsop = ProductInfusionSops::find()->where(['sop_id' => $sops->id, 'products_id' => $product->id])->one();
            ?>
            <tr>
                <td> <?php echo $count; ?></td>
                <td> <?= Html::a($product->MSCID, Url::to(['products/sopdetail', 'id' => $product->id, 'sopnum' => $sopnum]), ['class' => 'sop_mscid_link']) ?></td>
                <td> <?php echo $product->status; ?></td>
                <td> <?php echo $productsop->status; ?></td>
                <td> <?= Html::a($sops->description, Url::to(['products/sopdetail', 'id' => $product->id, 'sopnum' => $sopnum]), ['class' => 'sop_sopdetail']) ?></td>


            </tr>


            <?php
            $count++;
        }
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
    } else {
        ?>
        <div class="row">
            <h4>There are no Products with this SOP listed.</h4>
        </div>
        <?php
    }
    ?>
</table>




