<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.002 II';
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
        <h1 class="text-center ">Media Preparation Form: Wash Media</h1>
        <h2 class="text-center text-primary">Attachment II: Media Preparation Form: Wash Media</h2>
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
                            <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="8"><h4 class="mailn-processing-hadding">WASH MEDIA</h4></th>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Date of preparation: <input type="text" class="detail-content-form border-hidden datetimepicker4" required="" name="date_of_prep" value="<?php Products::getValue('date_of_prep', $sopdata) ?>"></p></td>
                            <td colspan="3"><p class="col-md-12">Expiration date: <input type="text" class="detail-content-form border-hidden datetimepicker4" required="" name="date_of_exp" value="<?php Products::getValue('date_of_exp', $sopdata) ?>"></p></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Product #:   <?php echo $product->MSCID; ?></p></td>
                            <td rowspan="2" colspan="3"><p class="col-md-12">Volume prepared: <input type="text" class="detail-content-form border-hidden " required="" name="volume_prepared" value="<?php Products::getValue('volume_prepared', $sopdata) ?>"></p></td>
                        </tr>
                        <tr>
                            <td colspan="3"><p class="col-md-12">Prepared by: <input type="text" class="detail-content-form border-hidden " required="" name="prepared_by" value="<?php Products::getValue('prepared_by', $sopdata) ?>"></p></td>
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
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="amem_manf" value="<?php Products::getValue('amem_manf', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="amem_lotno" value="<?php Products::getValue('amem_lotno', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="amem_exp_date" value="<?php Products::getValue('amem_exp_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">960 ml</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="amem_vol_used" value="<?php Products::getValue('amem_vol_used', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                        </tr><tr>
                            <td><p class="col-md-12">GPS
                                    (1% final concentration) </p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="gps_manf" value="<?php Products::getValue('gps_manf', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="gps_lotno" value="<?php Products::getValue('gps_lotno', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="gps_exp_date" value="<?php Products::getValue('gps_exp_date', $sopdata) ?>">
                                </div></td>
                            <td><p class="col-md-12 text-center">40 ml</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="gps_vol_used" value="<?php Products::getValue('gps_vol_used', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td colspan="5"><p class="col-md-12">Comments:</p></td>
                            <td><div class="col-md-12">
                                    <textarea class="detail-content-form border-hidden rcom" name="amemgps_comments"><?php Products::getValue('amemgps_comments', $sopdata) ?></textarea>
                                </div></td>
                        </tr>
                    </tbody></table>


                <?php
                if (Yii::$app->user->can('reviewer')) {
                    ?>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Review by: </label>
                            <label class="btn col-md">
                                <input type="text" class="mrg-hidden" name="50022_review_by" value="<?php Products::getValue('50022_review_by', $sopdata) ?>" id="reviewed_by">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Date: </label>
                            <label class="btn col-md">
                                <input type="text" class=" mrg-hidden datetimepicker4" name="50022_date" value="<?php Products::getValue('50022_date', $sopdata) ?>">
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
                    <textarea rows="6" name="50022_comments" class="form-control rcom"><?php Products::getValue('50022_comments', $sopdata) ?></textarea>
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

