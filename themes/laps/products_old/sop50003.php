<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.000 III';
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
        <h1 class="text-center ">Media Preparation Form: Wash Media</h1>
        <h2 class="text-center text-primary">Attachment III: Media Preparation Form: Complete Media with Antibiotics</h2>
        <br>




        <?php
        if ($productsopflag == 'true') {
            ?>
            <div id="section1" class="col-md-12">
                <?php
            } else {
                ?>
                <div class="col-md-12">
                    <?php
                }
                ?>
                <table width="100%" border="1" class="processing-table">
                    <tbody><tr>
                            <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="8"><h4 class="mailn-processing-hadding">COMPLETE MEDIA WITH ANTIBIOTICS</h4></th>
                        </tr>
                        <tr>
                            <td colspan="3"><label class="btn bold"> Date of preparation: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden datetimepicker4 border-hidden" name="cma_date_of_prep" value="<?php Products::getValue('cma_date_of_prep', $sopdata) ?>">
                                </label></td>

                            <td colspan="3">
                                <label class="btn bold"> Expiration date: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden datetimepicker4 border-hidden" name="cma_date_of_exp" value="<?php Products::getValue('cma_date_of_exp', $sopdata) ?>">
                                </label>

                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">

                                <label class="btn bold"> Product #: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden  border-hidden" name="product_id" value="<?php echo $product->MSCID; ?>" disabled="true">
                                </label>
                            </td>

                            <td rowspan="2" colspan="3">

                                <label class="btn bold"> Volume prepared: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden  border-hidden" name="cma_vol_prep" value="<?php Products::getValue('cma_vol_prep', $sopdata) ?>">
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">

                                <label class="btn bold"> Prepared by: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden  border-hidden" name="cma_prep_by" value="<?php Products::getValue('cma_prep_by', $sopdata) ?>">
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
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_amem_manf" value="<?php Products::getValue('cma_amem_manf', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_amem_lotno" value="<?php Products::getValue('cma_amem_lotno', $sopdata) ?>"></div></td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="cma_amem_exp_date" value="<?php Products::getValue('cma_amem_exp_date', $sopdata) ?>">
                                </div>
                            </td>
                            <td><p class="col-md-12 text-center">960 ml</p></td>
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_amem_vol_used" value="<?php Products::getValue('cma_amem_vol_used', $sopdata) ?>"></div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">GPS
                                    (1% final concentration)

                                </p></td>
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_gps_manf" value="<?php Products::getValue('cma_gps_manf', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_gps_lotno" value="<?php Products::getValue('cma_gps_lotno', $sopdata) ?>"></div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="cma_gps_exp_date" value="<?php Products::getValue('cma_gps_exp_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">40 ml</p></td>
                            <td><div class="col-md-12"><input type="text" class="detail-content-form border-hidden" name="cma_gps_vol_used" value="<?php Products::getValue('cma_gps_vol_used', $sopdata) ?>"></div></td>
                        </tr>


                        <tr>
                            <td colspan="5"><p class="col-md-12">Comments:</p></td>
                            <td><div class="col-md-12"><textarea class="detail-content-form border-hidden rcom" name="cma_comments"><?php Products::getValue('cma_comments', $sopdata) ?></textarea></div></td>
                        </tr>

                    </tbody></table>

            </div>
            <?php
            if (Yii::$app->user->can('reviewer')) {
                ?>
                <div class="col-md-6">
                    <div class="input-group btn-group-lg">
                        <label class="btn"> Review by: </label>
                        <label class="btn col-md">
                            <input type="text" class="mrg-hidden" name="50003_review_by" value="<?php Products::getValue('50003_review_by', $sopdata) ?>" id="reviewed_by">
                        </label>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="input-group btn-group-lg">
                        <label class="btn"> Date: </label>
                        <label class="btn col-md">
                            <input type="text" class=" mrg-hidden datetimepicker4" name="50003_date" value="<?php Products::getValue('50003_date', $sopdata) ?>">
                        </label>
                    </div>
                </div>
                <?php
            }
            ?>



            <div class="clearfix"></div>
        </div>
        <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">
        <?php
        if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
            ?>
            <div class="row">
                <h3>Comments</h3>
            </div>
            <div class="row">
                <textarea rows="6" name="50003_comments" class="form-control rcom"><?php Products::getValue('50003_comments', $sopdata) ?></textarea>
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

        <?php
        if ($productsopflag == 'true' || $approvedflag == 'true') {
            
        } else {
            ?>
            <div class="clearfix"></div>

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
        <?php ActiveForm::end(); ?>
