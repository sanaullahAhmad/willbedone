<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 7.002 III';
?>
<div class="row text-center">
    <?php echo $product->MSCID; ?>
</div>

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
        <h1 class="text-center ">Media Preparation Form: Wash Media</h1>

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
                <table class="processing-table" border="1" width="100%">
                    <tbody><tr>
                            <th colspan="8" style="background:#666; color:#fff; padding-bottom: 22px;" width="18%"><h4 class="mailn-processing-hadding">	PRODUCT STORAGE MEDIA</h4></th>
                        </tr>
                        <tr>
                            <td colspan="3"><label class="btn bold"> Date of preparation: </label>
                                <label class="btn">
                                    <input class="mrg-hidden datetimepicker4 border-hidden" type="text" name="wm_date_of_prepration"  value="<?php Products::getValue('wm_date_of_prepration', $sopdata) ?>">
                                </label></td>

                            <td colspan="3">
                                <label class="btn bold"> Expiration date: </label>
                                <label class="btn">
                                    <input class="mrg-hidden datetimepicker4 border-hidden" type="text" name="wm_expiration_date"  value="<?php Products::getValue('wm_expiration_date', $sopdata) ?>">
                                </label>

                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">

                                <label class="btn bold"> Product #: </label>
                                <label class="btn">
                                    <input class="mrg-hidden  border-hidden" type="text" name="product_id" value="<?php echo $product->MSCID; ?>" disabled="disabled">
                                </label>
                            </td>

                            <td colspan="3" rowspan="2">

                                <label class="btn bold"> Volume prepared: </label>
                                <label class="btn">
                                    <input class="mrg-hidden  border-hidden" type="text" name="wm_volume_prepared" value="<?php Products::getValue('wm_volume_prepared', $sopdata) ?>">
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">

                                <label class="btn bold"> Prepared by: </label>
                                <label class="btn">
                                    <input class="mrg-hidden  border-hidden" type="text" name="wm_prepared_by" value="<?php Products::getValue('wm_prepared_by', $sopdata) ?>">
                                </label>
                            </td>


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
                            <td><p class="col-md-12">Alpha MEM</p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_amem_manufacturer" value="<?php Products::getValue('wm_amem_manufacturer', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_amem_lot_no" value="<?php Products::getValue('wm_amem_lot_no', $sopdata) ?>"></div></td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="wm_amem_expiration_date" value="<?php Products::getValue('wm_amem_expiration_date', $sopdata) ?>">
                                </div>
                            </td>
                            <td><p class="col-md-12 text-center">960 ml</p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_amem_volume_used" value="<?php Products::getValue('wm_amem_volume_used', $sopdata) ?>"></div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Heparin
                                    (Final concentration: 100 units/ml)


                                </p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hep_manufacturer" value="<?php Products::getValue('wm_hep_manufacturer', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hep_lot_no" value="<?php Products::getValue('wm_hep_lot_no', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="wm_hep_expiration_date" value="<?php Products::getValue('wm_hep_expiration_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">40 ml</p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hep_volume_used" value="<?php Products::getValue('wm_hep_volume_used', $sopdata) ?>"></div></td>
                        </tr>


                        <tr>

                            <td><p class="col-md-12">25% HSA
                                    (1% final concentration)



                                </p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hsa_manufacturer" value="<?php Products::getValue('wm_hsa_manufacturer', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hsa_lot_no" value="<?php Products::getValue('wm_hsa_lot_no', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="wm_hsa_expiration_date" value="<?php Products::getValue('wm_hsa_expiration_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">40 ml</p></td>
                            <td><div class="col-md-12"><input class="detail-content-form border-hidden" type="text" name="wm_hsa_volume_used" value="<?php Products::getValue('wm_hsa_volume_used', $sopdata) ?>"></div></td>
                        </tr>


                        <tr>
                            <td colspan="5"><p class="col-md-12">Comments:</p></td>
                            <td><div class="col-md-12"><textarea class="detail-content-form border-hidden rcom" name="wm_comments"><?php Products::getValue('wm_comments', $sopdata) ?></textarea></div></td>
                        </tr>

                    </tbody></table>
                <?php
                if (Yii::$app->user->can('reviewer')) {
                    ?>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Review by: </label>
                            <label class="btn col-md">
                                <input class="mrg-hidden " type="text" name="wm_review_by" value="<?php Products::getValue('wm_review_by', $sopdata) ?>" id="reviewed_by">
                            </label>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Date: </label>
                            <label class="btn col-md">
                                <input class=" mrg-hidden datetimepicker4" type="text" name="wm_date" value="<?php Products::getValue('wm_date', $sopdata) ?>">
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
                    <textarea rows="6" name="sop70022_comments" class="form-control rcom"><?php Products::getValue('sop70023_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>

            <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">

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

        <?php ActiveForm::end(); ?>