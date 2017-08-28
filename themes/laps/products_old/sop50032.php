<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.003 I';
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
        <h1 class="text-center ">MSC THAWING AND WASHING WORKSHEET</h1>

        <br>
        <div class="col-xs-12 col-md-12 ">
            <div class="informations-box">
                <h3> Processing team: </h3>
            </div>
        </div>

        <div class="col-md-12 both-pad-hidden">
            <label class="btn"> Product ID </label>
            <label class="btn">
                <input type="text" class="mrg-hidden  col-md-12" value=" <?php echo $product->MSCID; ?>" disabled="disabled">
            </label>
            <label class="btn">Study# </label>
            <label class="btn">
                <input type="text" class="mrg-hidden  col-md-12" value="<?php echo $donor->study_number; ?>" disabled="disabled">
            </label>
            <label class="btn">IND#</label>
            <label class="btn">
                <input type="text" class="mrg-hidden  col-md-12" value="<?php echo $product->ind_no; ?>" disabled="disabled">
            </label>
            <label class="btn">IRB#: </label>
            <label class="btn">
                <input type="text" class="mrg-hidden  col-md-12" value=" <?php echo $product->irb_no; ?>" disabled="disabled">
            </label>
        </div>




        <div class="clearfix"></div>
        <div class="col-md-12">  <hr>
        </div>

        <?php
        if ($productsopflag == 'true') {
            ?>
            <div class="row" id="section1">
                <?php
            } else {
                ?>
                <div class="row">
                    <?php
                }
                ?>
                <div class="col-md-6">
                    <div class="col-md-12 both-pad-hidden">
                        <label class="btn ">
                            <input type="checkbox" class="checkbox-inline" name="tw_msc_autlogous" <?php
                            if ((Products::getCheckValue('tw_msc_autlogous', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            MSC Autologous (complete test results below)                 
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 both-pad-hidden">
                        <label class="btn ">
                            <input type="checkbox" class="checkbox-inline" name="tw_msc_allogeneic" <?php
                            if ((Products::getCheckValue('tw_msc_allogeneic', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            MSC Allogeneic (complete test results below)
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">  <hr>
                </div>
                <div class="col-md-12">

                    <table width="100%" border="1" class="processing-table">
                        <tbody><tr class="processing-table-background">
                                <th width="41%"><h4 class="mailn-processing-hadding">TEST</h4></th>
                                <th width="17%"><h4 class="mailn-processing-hadding">SPECIFICATION</h4></th>
                                <th width="28%"><h4 class="mailn-processing-hadding">RESULT</h4></th>
                                <th width="14%"><h4 class="mailn-processing-hadding">PASS</h4></th>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Viability
                                        (day of transplant)
                                    </p></td>
                                <td><p class="col-md-12"> &gt;70 %</p></td>
                                <td>
                                    <div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="tw_via_result" value="<?php Products::getValue('tw_via_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_via_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_via_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_via_pass_no" <?php
                                            if ((Products::getCheckValue('tw_via_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Total Cell </p></td>
                                <td><p class="col-md-12">Dose specific</p></td>
                                <td>
                                    <div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="tw_tc_result" value="<?php Products::getValue('tw_tc_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_tc_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_tc_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_tc_pass_no" <?php
                                            if ((Products::getCheckValue('tw_tc_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Gram Stain
                                        (day of transplant, release </p></td>
                                <td><p class="col-md-12">Negative</p></td>
                                <td>
                                    <div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="tw_gstain_result" value="<?php Products::getValue('tw_gstain_result', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_gstain_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_gstain_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_gstain_pass_no" <?php
                                            if ((Products::getCheckValue('tw_gstain_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Sterility</p></td>
                                <td><p class="col-md-12">All Negatives</p></td>
                                <td>
                                    <label class="btn"> Aerobic</label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden col-md-12" name="tw_ster_result_aerobic" value="<?php Products::getValue('tw_ster_result_aerobic', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Anaerobic</label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden col-md-12" name="tw_ster_result_anaerobic" value="<?php Products::getValue('tw_ster_result_anaerobic', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Fungal</label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden col-md-12" name="tw_ster_result_fungal" value="<?php Products::getValue('tw_ster_result_fungal', $sopdata) ?>">
                                    </label>


                                </td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_ster_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_ster_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_ster_pass_no" <?php
                                            if ((Products::getCheckValue('tw_ster_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Endotoxin Level
                                        (day of transplant, release criteria)
                                    </p></td>
                                <td><p class="col-md-12"> &lt; 5EU/kg </p></td>
                                <td><div class="col-md-12 both-pad-hidden">
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result1" value="<?php Products::getValue('tw_endotoxin_result1', $sopdata) ?>">
                                        </label>
                                        <label class="btn"> EU/mL x  </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result2" value="<?php Products::getValue('tw_endotoxin_result2', $sopdata) ?>">
                                        </label>
                                        <label class="btn">x  </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result3" value="<?php Products::getValue('tw_endotoxin_result3', $sopdata) ?>">
                                        </label>
                                        <label class="btn">= </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result4" value="<?php Products::getValue('tw_endotoxin_result4', $sopdata) ?>">
                                        </label>
                                        <label class="btn">EU / x </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result5" value="<?php Products::getValue('tw_endotoxin_result5', $sopdata) ?>">
                                        </label>

                                        <label class="btn">= </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden  xs-input" name="tw_endotoxin_result6" value="<?php Products::getValue('tw_endotoxin_result6', $sopdata) ?>">
                                        </label>
                                    </div></td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_endotoxin_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_endotoxin_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_endotoxin_pass_no" <?php
                                            if ((Products::getCheckValue('tw_endotoxin_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="col-md-12">Mycoplasma (Detection by PCR; sample: supernatant  from the  last passage)</p></td>
                                <td><p class="col-md-12">Negative</p></td>
                                <td>&nbsp;</td>
                                <td><div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_endotoxin_pass_yes" <?php
                                            if ((Products::getCheckValue('tw_endotoxin_pass_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_endotoxin_pass_no" <?php
                                            if ((Products::getCheckValue('tw_endotoxin_pass_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td colspan="3"><p class="col-md-12">Results meet specifications? </p>

                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_rms_yes" <?php
                                            if ((Products::getCheckValue('tw_rms_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-6 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_rms_no" <?php
                                            if ((Products::getCheckValue('tw_rms_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No
                                        </label>
                                    </div>
                                </td>

                                <td>

                                    <label class="btn"> Deviation#</label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden " name="tw_rms_deviation_no" value="<?php Products::getValue('tw_rms_deviation_no', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> (If deviation is not recorded explain)</label></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="col-md-4 both-pad-hidden">  

                                        <label class="btn"> Fungal</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden col-md-12" name="tw_fungal" value="<?php Products::getValue('tw_fungal', $sopdata) ?>">
                                        </label>

                                    </div>
                                    <div class="col-md-4 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_discard" <?php
                                            if ((Products::getCheckValue('tw_discard', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Discard              
                                        </label>
                                    </div>
                                    <div class="col-md-4 both-pad-hidden">
                                        <label class="btn ">
                                            <input type="checkbox" class="checkbox-inline" name="tw_rcu" <?php
                                            if ((Products::getCheckValue('tw_rcu', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Release for clinical use
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>


                </div>
            </div>

            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="50032_s1_comments" class="form-control rcom"><?php Products::getValue('50032_s1_comments', $sopdata) ?></textarea>
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
                            <input type="text" class="mrg-hidden " name="50032_review_by" id="reviewed_by" value="<?php Products::getValue('50032_review_by', $sopdata) ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group btn-group-lg">
                        <label class="btn"> Date: </label>
                        <label class="btn col-md">
                            <input type="text" class=" mrg-hidden datetimepicker4" name="50032_date" value="<?php Products::getValue('50032_date', $sopdata) ?>">
                        </label>
                    </div>
                </div>
                <?php
            }
            ?>




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