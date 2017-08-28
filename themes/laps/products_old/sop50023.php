<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.002 III';
?>

<div class="row text-center">
    <?php echo $product->MSCID; ?>
</div>



<!-- page content header -->
<?php
if ($approvedflag == 'true') {
    ?>
    <div id="approvedflag" class="row">
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
        <h1 class="text-center "> Media Preparation Form: Freeze Media 1 and Freeze Media 2 </h1>
        <h2 class="text-center text-primary">Attachment III: Media Preparation Form: Freeze Media 1 and Freeze Media 2</h2>
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
                            <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="8"><h4 class="mailn-processing-hadding">FREEZE MEDIA 1</h4></th>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Date of preparation:
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden datetimepicker4 border-hidden" name="fm1_date_of_prep"  value="<?php Products::getValue('fm1_date_of_prep', $sopdata) ?>">
                                    </label>
                                </p>
                            </td>
                            <td colspan="3"><p class="col-md-12">Expiration date:
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden datetimepicker4 border-hidden" name="fm1_date_of_exp" value="<?php Products::getValue('fm1_date_of_exp', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Product #: <?php echo $product->MSCID; ?></p></td>
                            <td rowspan="2" colspan="3"><p class="col-md-12">Volume prepared:
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden border-hidden" name="fm1_vol_prep" value="<?php Products::getValue('fm1_vol_prep', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Prepared by:
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden border-hidden" name="fm1_prep_by" value="<?php Products::getValue('fm1_prep_by', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr class="processing-table-background">
                            <th><h4 class="mailn-processing-hadding">Reagents</h4></th>
                            <th w=""><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                            <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                            <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                            <th><h4 class="mailn-processing-hadding">Volume for 1L</h4></th>
                            <th><h4 class="mailn-processing-hadding">Volume used</h4></th>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Hespan 6%</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_hespan_manf" value="<?php Products::getValue('fm1_hespan_manf', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_hespan_lotno" value="<?php Products::getValue('fm1_hespan_lotno', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fm1_hespan_exp_date" value="<?php Products::getValue('fm1_hespan_exp_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">960 ml</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_hespan_vol_used" value="<?php Products::getValue('fm1_hespan_vol_used', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">GPS
                                    (1% final concentration) </p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_gps_manf" value="<?php Products::getValue('fm1_gps_manf', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_gps_lotno" value="<?php Products::getValue('fm1_gps_lotno', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fm1_gps_exp_date" value="<?php Products::getValue('fm1_gps_exp_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">40 ml</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="fm1_gps_vol_used" value="<?php Products::getValue('fm1_gps_vol_used', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                        </tr><tr>
                            <td colspan="5"><p class="col-md-12">Comments:</p></td>
                            <td><div class="col-md-12">
                                    <textarea class="detail-content-form border-hidden rcom" name="fm1_comments"><?php Products::getValue('fm1_comments', $sopdata) ?></textarea>
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
                    <textarea rows="6" name="50023_s1_comments" class="form-control rcom"><?php Products::getValue('50023_s1_comments', $sopdata) ?></textarea>
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
                                <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="8"><h4 class="mailn-processing-hadding">FREEZE MEDIA 2</h4></th>
                            </tr>
                            <tr>
                                <td colspan="3"><p class="col-md-12">Date of preparation:
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden border-hidden datetimepicker4" name="fm12_date_of_prep" value="<?php Products::getValue('fm12_date_of_prep', $sopdata) ?>">
                                        </label>
                                    </p></td>
                                <td colspan="3"><p class="col-md-12">Expiration date:
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden border-hidden datetimepicker4" name="fm2_exp_date" value="<?php Products::getValue('fm2_exp_date', $sopdata) ?>">
                                        </label>
                                    </p></td>
                            </tr>
                            <tr>
                                <td colspan="3"><p class="col-md-12">Product #: <?php echo $product->MSCID; ?></p></td>
                                <td rowspan="2" colspan="3"><p class="col-md-12">Volume prepared:
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden border-hidden" name="fm2_vol_prep" value="<?php Products::getValue('fm2_vol_prep', $sopdata) ?>">
                                        </label>
                                    </p></td>
                            </tr>
                            <tr>
                                <td colspan="3"><p class="col-md-12">Prepared by:
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden border-hidden" name="fm2_prep_by" value="<?php Products::getValue('fm2_prep_by', $sopdata) ?>">
                                        </label>
                                    </p></td>
                            </tr>
                            <tr class="processing-table-background">
                                <th><h4 class="mailn-processing-hadding">Reagents</h4></th>
                                <th w=""><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                                <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                                <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                                <th><h4 class="mailn-processing-hadding">Volume for 1L</h4></th>
                                <th><h4 class="mailn-processing-hadding">Volume used</h4></th>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Hespan 6%</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hespan_manf" value="<?php Products::getValue('fm2_hespan_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hespan_lotno" value="<?php Products::getValue('fm2_hespan_lotno', $sopdata) ?>"c>
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fm2_hespan_exp_date" value="<?php Products::getValue('fm2_hespan_exp_date', $sopdata) ?>">
                                    </div></td>
                                <td><p class="col-md-12 text-center">960 ml</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hespan_vol_used" value="<?php Products::getValue('fm2_hespan_vol_used', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">HSA 25%
                                        (2% final concentration) </p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hsa_manf" value="<?php Products::getValue('fm2_hsa_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hsa_lotno" value="<?php Products::getValue('fm2_hsa_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fm2_hsa_exp_date" value="<?php Products::getValue('fm2_hsa_exp_date', $sopdata) ?>">
                                    </div></td>
                                <td><p class="col-md-12 text-center">40 ml</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_hsa_vol_used" value="<?php Products::getValue('fm2_hsa_vol_used', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                            </tr><tr>
                                <td><p class="col-md-12">DMSO
                                        (10% final concentration) </p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_dmso_manf" value="<?php Products::getValue('fm2_dmso_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_dmso_lotno" value="<?php Products::getValue('fm2_dmso_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="fm2_dmso_exp_date" value="<?php Products::getValue('fm2_dmso_exp_date', $sopdata) ?>">
                                    </div></td>
                                <td><p class="col-md-12 text-center">40 ml</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="fm2_dmso_vol_used" value="<?php Products::getValue('fm2_dmso_vol_used', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td colspan="5"><p class="col-md-12">Comments:</p></td>
                                <td><div class="col-md-12">
                                        <textarea class="detail-content-form border-hidden rcom" name="fm2_comments"><?php Products::getValue('fm2_comments', $sopdata) ?></textarea>
                                    </div></td>
                            </tr>
                        </tbody></table>
                    <div class="col-md-12">
                        <h2 class="col-md-12"><b>NOTE: Expiration 2 days. Media must be kept cold at all time.</b></h2>
                    </div>

                    <?php
                    if (Yii::$app->user->can('reviewer')) {
                        ?>
                        <div class="col-md-6">
                            <div class="input-group btn-group-lg">
                                <label class="btn"> Review by: </label>
                                <label class="btn col-md">
                                    <input type="text" class="mrg-hidden " name="50023_review_by" value="<?php Products::getValue('50023_review_by', $sopdata) ?>" id="reviewed_by">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group btn-group-lg">
                                <label class="btn"> Date: </label>
                                <label class="btn col-md">
                                    <input type="text" class=" mrg-hidden datetimepicker4" name="50023_date" value="<?php Products::getValue('50023_date', $sopdata) ?>">
                                </label>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="50023_s2_comments" class="form-control rcom"><?php Products::getValue('50023_s2_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>



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
            </div>
            <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">
            <?php ActiveForm::end(); ?>

