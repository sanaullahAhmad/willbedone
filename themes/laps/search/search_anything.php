<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Sops;

$this->title = 'Search Results';
?>



<div class="row">
    <div class="col-md-6">
        <div class="heading-block">
            <h2>Search Results</h2>
        </div>
    </div>
</div>
<div class="cleafix"></div>
<?php
if (count($results) > 0) {
    ?>
    <table class="table table-striped table-hover panel panel-gray">
        <tr>
            <th>Sr. #</th>
            <th>Product MSCID</th>
            <th>Product Status</th>
            <th>Current SOP</th>
            <th>View Detail</th>
        </tr>

        <?php
        $count = 1;
        foreach ($results as $result) {
            $sop = Sops::findOne($result[current_sop]);
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $result[MSCID] ?></td>
                <td><?php echo $result[status] ?></td>
                <td><?php echo $sop->description; ?></td>
                <td><?= Html::a('View Detail', Url::to(['search/viewdetail', 'prodID' => $result[prodID]])) ?></td>
            </tr>
            <?php
            $count++;
        }
    } else {
        ?>
        <div class="row">
            <h4>There are no Products with this SOP listed.</h4>
        </div>
        <?php
    }
    ?>
</table>




