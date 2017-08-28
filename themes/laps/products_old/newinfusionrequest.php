

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\ProductSops;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'New Infusion Request';
?>



<div class="row">
    <div class="col-md-6">
        <div class="heading-block">
            <h2>New Infusion Request</h2>
        </div>
    </div>
</div>
<div class="cleafix"></div>
<?php
if (Yii::$app->session->hasFlash('nomoreinf')) {
    ?>
    <div class="row alert alert-danger">
        <?php echo Yii::$app->session->getFlash('nomoreinf'); ?>
    </div>
    <?php
}
?>

<?php
if (count($products) > 0) {
    ?>
    <table class="table table-striped table-hover panel panel-gray">
        <tr>
            <th>Sr. #</th>
            <th>Product MSCID</th>
            <th>Options</th>
        </tr>

        <?php
        $count = 1;
        foreach ($products as $product) {
            ?>
            <tr>
                <td> <?php echo $count; ?></td>
                <td> <?= $product->MSCID ?></td>
                <td> <?= Html::a('Generate Infusion Request', Url::to(['products/newinfusionrequest', 'id' => $product->id])) ?></td>
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
            <h4>There are no Products Approved Yet</h4>
        </div>
        <?php
    }
    ?>
</table>




