<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.000 V';
?>


<div class="row text-center">
    <?php echo $product->MSCID; ?>
</div>
<!-- page content header -->
<?php
if ($approvedflag == 'true') {
    ?>
    <div class="row" id="approvedflag">
        <?php
    } else {
        ?>
        <div class="row">
            <?php
        }
        ?>
        <?php
        $form = ActiveForm::begin(['options' => [
                        'class' => 'form-signin',
                        'name' => 'nctpform',
                        'enctype' => 'multipart/form-data'
                    ],
                    'action' => ['products/sopsubmit']
        ]);
        ?>
        <h1 class="text-center ">QC SAMPLES REPORTS</h1>
        <h2 class="text-center text-primary">Attachment V: Media Preparation Form: Complete Media with Antibiotics</h2>
        <br>
        <?php
        if ($productsopflag == 'true') {
            ?>
            <div class="col-md-12" id="section1">
                <?php
            } else {
                ?>
                <div class="col-md-12">
                    <?php
                }
                ?>
                <table width="100%" border="1" class="processing-table">
                    <tbody><tr>
                            <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="7"><h4 class="mailn-processing-hadding">STERILITY (Aerobic-Anaerobic-Fungal)</h4></th>
                        </tr>
                        <tr class="processing-table-background">
                            <th><h4 class="mailn-processing-hadding">Sample Name</h4></th>
                            <th><h4 class="mailn-processing-hadding">Date Collected</h4></th>
                            <th><h4 class="mailn-processing-hadding">Collected by</h4></th>
                            <th><h4 class="mailn-processing-hadding">Date Shipped</h4></th>
                            <th><h4 class="mailn-processing-hadding">Report Date</h4></th>
                            <th><h4 class="mailn-processing-hadding">Result</h4></th>
                            <th><h4 class="mailn-processing-hadding">Reported by</h4></th>
                        </tr>
                        <tr>
                            <td><p class="col-md-12"><b>Unique ID+initial BMA</b></p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidib_date_collected" value="<?php Products::getValue('ster_uidib_date_collected', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidib_collected_by" value="<?php Products::getValue('ster_uidib_collected_by', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidib_date_shipped" value="<?php Products::getValue('ster_uidib_date_shipped', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidib_report_date" value="<?php Products::getValue('ster_uidib_report_date', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidib_result" value="<?php Products::getValue('ster_uidib_result', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidib_reported_by" value="<?php Products::getValue('ster_uidib_reported_by', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12"><b>Unique ID+P0</b></p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp0_date_collected" value="<?php Products::getValue('ster_uidp0_date_collected', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp0_collected_by" value="<?php Products::getValue('ster_uidp0_collected_by', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp0_date_shipped" value="<?php Products::getValue('ster_uidp0_date_shipped', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp0_report_date" value="<?php Products::getValue('ster_uidp0_report_date', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp0_result" value="<?php Products::getValue('ster_uidp0_result', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp0_reported_by" value="<?php Products::getValue('ster_uidp0_reported_by', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12"><b>Unique ID+P2/CRYO/set1</b></p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set1_date_collected" value="<?php Products::getValue('ster_uidp2set1_date_collected', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set1_collected_by" value="<?php Products::getValue('ster_uidp2set1_collected_by', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set1_date_shipped" value="<?php Products::getValue('ster_uidp2set1_date_shipped', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set1_report_date" value="<?php Products::getValue('ster_uidp2set1_report_date', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set1_result" value="<?php Products::getValue('ster_uidp2set1_result', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set1_reported_by" value="<?php Products::getValue('ster_uidp2set1_reported_by', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12"><b>Unique ID+P2/CRYO/set2</b></p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set2_date_collected" value="<?php Products::getValue('ster_uidp2set2_date_collected', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set2_collected_by" value="<?php Products::getValue('ster_uidp2set2_collected_by', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set2_date_shipped" value="<?php Products::getValue('ster_uidp2set2_date_shipped', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set2_report_date" value="<?php Products::getValue('ster_uidp2set2_report_date', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set2_result" value="<?php Products::getValue('ster_uidp2set2_result', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set2_reported_by" value="<?php Products::getValue('ster_uidp2set2_reported_by', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12"><b>Unique ID+P2/CRYO/set3</b></p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set3_date_collected" value="<?php Products::getValue('ster_uidp2set3_date_collected', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set3_collected_by" value="<?php Products::getValue('ster_uidp2set3_collected_by', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set3_date_shipped" value="<?php Products::getValue('ster_uidp2set3_date_shipped', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden datetimepicker4" name="ster_uidp2set3_report_date" value="<?php Products::getValue('ster_uidp2set3_report_date', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set3_result" value="<?php Products::getValue('ster_uidp2set3_result', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="ster_uidp2set3_reported_by" value="<?php Products::getValue('ster_uidp2set3_reported_by', $sopdata) ?>">
                                </div></td>
                        </tr>
                    </tbody></table>
            </div>
            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="50005_s1_comments" class="form-control rcom"><?php Products::getValue('50005_s1_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>
            <?php
            if ($productsopflag == 'true') {
                ?>
                <div class="col-md-12" id="section2">
                    <?php
                } else {
                    ?>
                    <div class="col-md-12">
                        <?php
                    }
                    ?>
                    <table width="100%" border="1" class="processing-table">
                        <tbody><tr>
                                <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="7"><h4 class="mailn-processing-hadding">MYCOPLASMA</h4></th>
                            </tr>
                            <tr class="processing-table-background">
                                <th><h4 class="mailn-processing-hadding">Sample Name</h4></th>
                                <th><h4 class="mailn-processing-hadding">Date Collected</h4></th>
                                <th><h4 class="mailn-processing-hadding">Collected by</h4></th>
                                <th><h4 class="mailn-processing-hadding">Date Shipped</h4></th>
                                <th><h4 class="mailn-processing-hadding">Report Date</h4></th>
                                <th><h4 class="mailn-processing-hadding">Result</h4></th>
                                <th><h4 class="mailn-processing-hadding">Reported by</h4></th>
                            </tr>
                            <tr>
                                <td><p class="col-md-12"><b>Unique ID+initial BMA</b></p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidib_date_collected" value="<?php Products::getValue('myco_uidib_date_collected', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidib_collected_by" value="<?php Products::getValue('myco_uidib_collected_by', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidib_date_shipped" value="<?php Products::getValue('myco_uidib_date_shipped', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidib_report_date" value="<?php Products::getValue('myco_uidib_report_date', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidib_result" value="<?php Products::getValue('myco_uidib_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidib_reported_by" value="<?php Products::getValue('myco_uidib_reported_by', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12"><b>Unique ID+P0</b></p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp0_date_collected" value="<?php Products::getValue('myco_uidp0_date_collected', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp0_collected_by" value="<?php Products::getValue('myco_uidp0_collected_by', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp0_date_shipped" value="<?php Products::getValue('myco_uidp0_date_shipped', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp0_report_date" value="<?php Products::getValue('myco_uidp0_report_date', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp0_result" value="<?php Products::getValue('myco_uidp0_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp0_reported_by" value="<?php Products::getValue('myco_uidp0_reported_by', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12"><b>Unique ID+P2/CRYO/set1</b></p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp2_date_collected" value="<?php Products::getValue('myco_uidp2_date_collected', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp2_collected_by" value="<?php Products::getValue('myco_uidp2_collected_by', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp2_date_shipped" value="<?php Products::getValue('myco_uidp2_date_shipped', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden datetimepicker4" name="myco_uidp2_report_date" value="<?php Products::getValue('myco_uidp2_report_date', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp2_result" value="<?php Products::getValue('myco_uidp2_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="myco_uidp2_reported_by" value="<?php Products::getValue('myco_uidp2_reported_by', $sopdata) ?>">
                                    </div></td>
                            </tr>
                        </tbody></table>
                </div>
                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="50005_s2_comments" class="form-control rcom"><?php Products::getValue('50005_s2_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($productsopflag == 'true') {
                    ?>
                    <div class="col-md-12" id="section3">
                        <?php
                    } else {
                        ?>
                        <div class="col-md-12">
                            <?php
                        }
                        ?>
                        <table width="100%" border="1" class="processing-table">
                            <tbody><tr>
                                    <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="7"><h4 class="mailn-processing-hadding">ENDOTOXIN</h4></th>
                                </tr>
                                <tr class="processing-table-background">
                                    <th><h4 class="mailn-processing-hadding">Sample Name</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Date Collected</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Collected by</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Date Shipped</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Report Date</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Result</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Reported by</h4></th>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Unique ID+initial BMA</b></p></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidib_date_collected" value="<?php Products::getValue('end_uidib_date_collected', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidib_collected_by" value="<?php Products::getValue('end_uidib_collected_by', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidib_date_shipped" value="<?php Products::getValue('end_uidib_date_shipped', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidib_report_date" value="<?php Products::getValue('end_uidib_report_date', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidib_result" value="<?php Products::getValue('end_uidib_result', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidib_reported_by" value="<?php Products::getValue('end_uidib_reported_by', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Unique ID+P0</b></p></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp0_date_collected" value="<?php Products::getValue('end_uidp0_date_collected', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp0_collected_by" value="<?php Products::getValue('end_uidp0_collected_by', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp0_date_shipped" value="<?php Products::getValue('end_uidp0_date_shipped', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp0_report_date" value="<?php Products::getValue('end_uidp0_report_date', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp0_result" value="<?php Products::getValue('end_uidp0_result', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp0_reported_by" value="<?php Products::getValue('end_uidp0_reported_by', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Unique ID+P2/CRYO/set1</b></p></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp2_date_collected" value="<?php Products::getValue('end_uidp2_date_collected', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp2_collected_by" value="<?php Products::getValue('end_uidp2_collected_by', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp2_date_shipped" value="<?php Products::getValue('end_uidp2_date_shipped', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden datetimepicker4" name="end_uidp2_report_date" value="<?php Products::getValue('end_uidp2_report_date', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp2_result" value="<?php Products::getValue('end_uidp2_result', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input type="text" class="detail-content-form border-hidden" name="end_uidp2_reported_by" value="<?php Products::getValue('end_uidp2_reported_by', $sopdata) ?>">
                                        </div></td>
                                </tr>
                            </tbody></table>
                    </div>
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="50005_s3_comments" class="form-control rcom"><?php Products::getValue('50005_s3_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($productsopflag == 'true') {
                        ?>
                        <div class="col-md-12" id="section4">
                            <?php
                        } else {
                            ?>
                            <div class="col-md-12">
                                <?php
                            }
                            ?>
                            <div class="input-group btn-group-lg">
                                <label class="btn"> Flow Analysis results (CD105/CD45) Unique ID + <b>MSC/P2/Flow:</b> </label>
                                <label class="btn col-md">
                                    <input type="text" class="mrg-hidden " name="qc_report_flow_analysis" value="<?php Products::getValue('qc_report_flow_analysis', $sopdata) ?>">
                                </label>
                            </div>
                            <div class="input-group btn-group-lg">
                                <label class="btn">Unique ID + <b>MSC/P2/CFU-F:</b></label>
                                <label class="btn col-md">
                                    <input type="text" class="mrg-hidden " name="qc_uidmsc" value="<?php Products::getValue('qc_uidmsc', $sopdata) ?>">
                                </label>
                            </div>

                            <?php
                            if (Yii::$app->user->can('reviewer')) {
                                ?>
                                <div class="input-group btn-group-lg">
                                    <label class="btn"> Review by: </label>
                                    <label class="btn col-md">
                                        <input type="text" class="mrg-hidden " name="50005_review_by" value="<?php Products::getValue('50005_review_by', $sopdata) ?>"  id="reviewed_by">
                                    </label>
                                </div>
                                <div class="input-group btn-group-lg">
                                    <label class="btn"> Date: </label>
                                    <label class="btn col-md">
                                        <input type="text" class=" mrg-hidden datetimepicker4" name="50005_date" value="<?php Products::getValue('50005_date', $sopdata) ?>">
                                    </label>
                                </div>
                                <?php
                            }
                            ?>


                        </div>


                        <div class="clearfix"></div>
                    </div>



                    <?php
                    if ($productsopflag == 'true' || $approvedflag == 'true') {
                        
                    } else {
                        ?>
                        <div class="col-md-12">
                            <p class="submit-view-btn col-md-12">
                                <a href="#" id="nctp-submit-button">
                                    Submit for review
                                    <i class="icon-chevron-right"></i>
                                </a>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (Yii::$app->user->can('reviewer') && $approvedflag != 'true') {
                        ?>
                        <div class="col-md-10">
                            <p class="submit-view-btn col-md-12">
                                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/approve&product_sop_id=<?php echo $product_sop_id; ?>">
                                    Approve
                                    <i class="icon-chevron-right"></i>
                                </a>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p class="submit-view-btn col-md-12">
                                <a href="#">
                                    Disapprove
                                    <i class="icon-chevron-right"></i>
                                </a>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">
                    <?php ActiveForm::end(); ?>

