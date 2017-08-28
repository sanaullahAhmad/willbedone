<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.003 I QC';
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
        <h1 class="text-center ">QC Sample Reports</h1>

    
    


        

       









                    <div class="col-md-12">

                        <h1 class="text-center ">SAMPLES COLLECTED AND RESULTS</h1>
                        <br>
                    </div>

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

                            <table width="100%" border="1" class="processing-table">
                                <tbody>
                                    <tr>
                                        <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"><h4 class="mailn-processing-hadding">Samples collected</h4></th>
                                    </tr>
                                    <tr class="processing-table-background">
                                        <th><h4 class="mailn-processing-hadding">Sample Taken</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Collection Date</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Collected by</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Confirmation of Sample received by Lab (Initials)</h4></th>
                                    </tr>
                                    <tr>
                                        <td height="45"><div class="col-md-12">
                                                <p> Thawed MSC</p>
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pro_tmsc_coll_date" value="<?php Products::getValue('pro_tmsc_coll_date', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input type="text" class="detail-content-form border-hidden" name="pro_tmsc_coll_by" value="<?php Products::getValue('pro_tmsc_coll_by', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden border-hidden" name="pro_tmsc_csrl" value="<?php Products::getValue('pro_tmsc_csrl', $sopdata) ?>">
                                            </div></td>
                                    </tr>

                                </tbody></table>

                            <table width="100%" border="1" class="processing-table">
                                <tbody>
                                    <tr>
                                        <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"><h4 class="mailn-processing-hadding">Results (Release Criteria)</h4></th>
                                    </tr>
                                    <tr class="processing-table-background">
                                        <th><h4 class="mailn-processing-hadding">Sample name</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Report Date</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Endotoxin EU/ml</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Gram Stain</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Reported by</h4></th>
                                    </tr>
                                    <tr>
                                        <td height="45"><div class="col-md-12">
                                                <p> Thawed MSC</p>
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="res_report_date" value="<?php Products::getValue('res_report_date', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input type="text" class="detail-content-form border-hidden" name="res_endotoxin_eu" value="<?php Products::getValue('res_endotoxin_eu', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden border-hidden" name="res_gram_stain" value="<?php Products::getValue('res_gram_stain', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden border-hidden" name="res_reported_by" value="<?php Products::getValue('res_reported_by', $sopdata) ?>">
                                            </div></td>
                                    </tr>

                                </tbody></table>
                            <table width="100%" border="1" class="processing-table">
                                <tbody>
                                    <tr>
                                        <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"><h4 class="mailn-processing-hadding">Final Results</h4></th>
                                    </tr>
                                    <tr class="processing-table-background">
                                        <th><h4 class="mailn-processing-hadding">Sample name</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Report Date</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Endotoxin EU/ml</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Gram Stain</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Reported by</h4></th>
                                    </tr>
                                    <tr>
                                        <td height="45"><div class="col-md-12">
                                                <p> Thawed MSC</p>
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fr_report_date" value="<?php Products::getValue('fr_report_date', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input type="text" class="detail-content-form border-hidden" name="fr_endotoxin_eu" value="<?php Products::getValue('fr_endotoxin_eu', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden border-hidden" name="fr_gram_stain" value="<?php Products::getValue('fr_gram_stain', $sopdata) ?>">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input type="text" class=" mrg-hidden border-hidden" name="fr_reported_by" value="<?php Products::getValue('fr_reported_by', $sopdata) ?>">
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
                                <textarea rows="6" name="50031_s4_comments" class="form-control rcom"><?php Products::getValue('50031_s4_comments', $sopdata) ?></textarea>
                            </div>
                            <?php
                        }
                        ?>


                        <?php
                        if (Yii::$app->user->can('reviewer')) {
                            ?>

                            <div class="col-md-6">
                                <div class="input-group btn-group-lg">
                                    <label class="btn"> Review by: </label>
                                    <label class="btn col-md">
                                        <input type="text" class="mrg-hidden " name="50031_review_by2" value="<?php Products::getValue('50031_review_by2', $sopdata) ?>" id="reviewed_by2">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group btn-group-lg">
                                    <label class="btn"> Date: </label>
                                    <label class="btn col-md">
                                        <input type="text" class=" mrg-hidden datetimepicker4" name="50031_date2" value="<?php Products::getValue('50031_date2', $sopdata) ?>">
                                    </label>
                                </div>
                            </div>
                            <?php
                        }
                        ?>



                        <div class="clearfix"></div>
                        <hr>



                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
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