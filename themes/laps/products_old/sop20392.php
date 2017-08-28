<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 2.039 II';
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
        <h1 class="text-center ">CLINICAL TRIAL PRODUCT</h1>
        <h2 class="text-center text-primary">REQUEST FOR INFUSION OF MESENCHYMAL STEM CELL</h2>
        <br>

        <!-- DONOR INFORMATION -->
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
                <div class="col-md-12 no-padding">
                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                        <div class="panel-heading">
                            <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                        </div>
                        <div class="panel-body no-padding-top" id="announcement">
                            <h2 class="text-center ">1.	RECIPIENT INFORMATION<br>
                                THIS SECTION MUST BE COMPLETED BY CLINICAL COORDINATOR TEAM </h2>
                            <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border-bottom">
                        <div class="col-md-6">
                            <div class="input-group btn-group-lg">
                                <label class="btn bold"> Name: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden " name="recinfo_name" value="<?php Products::getValue('recinfo_name', $sopdata) ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group btn-group-lg">
                                <label class="btn bold"> DOB: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden datetimepicker4" name="recinfo_dob" value="<?php Products::getValue('recinfo_dob', $sopdata) ?>">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  border-right-light"> 
                    <!-- Name -->
                    <div class="col-xs-12">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold">Date Requested: </label>
                            <label class="btn">
                                <input type="text" class=" mrg-hidden datetimepicker4" name="recinfo_date_req" value="<?php Products::getValue('recinfo_date_req', $sopdata) ?>">
                            </label>
                        </div>
                        <div class="input-group btn-group-lg">
                            <label class="btn bold">Recipient ID# (Check one) </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="recinfo_recid" value="<?php echo $product->recipient_id; ?>">
                            </label>
                        </div>
                        <div class="input-group btn-group-lg">
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="recinfo_jmh" <?php
                                if ((Products::getCheckValue('recinfo_jmh', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                JMH </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="recinfo_va" <?php
                                if ((Products::getCheckValue('recinfo_va', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                VA </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="recinfo_umh" <?php
                                if ((Products::getCheckValue('recinfo_umh', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                UMH </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="recinfo_other" <?php
                                if ((Products::getCheckValue('recinfo_other', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Other</label>
                        </div>
                        <div class="input-group btn-group-lg">
                            <label class="btn bold">Study Name: </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="recinfo_study_name" value="<?php echo $donor->study_name; ?>">
                            </label>
                        </div>
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Study #: </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="recinfo_study_no" value="<?php echo $donor->study_number; ?>">
                            </label>
                        </div>
                    </div>
                    <!-- / Name --> 
                    <!-- Email -->
                    <div class="col-xs-12"> </div>
                    <!-- / email --> 
                    <!-- Password -->
                    <div class="col-xs-12 col-md-12 ">
                        <h3> Product type Received for Processing: </h3>
                    </div>
                    <!-- / password --> 
                </div>
                <div class="col-md-6"> <!-- Birthday -->

                    <div class="input-group btn-group-lg">
                        <label class="btn bold"> Study #: </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden" name="recinfo_study_no2" value="<?php echo $donor->study_number; ?>">
                        </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="text" class="mrg-hidden " name="recinfo_idmtra" value="<?php Products::getValue('recinfo_idmtra', $sopdata) ?>">
                        </label>
                        <label class="btn bold"> Infectious disease markers test results attached </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="text" class="mrg-hidden " name="recinfo_icd" value="<?php Products::getValue('recinfo_icd', $sopdata) ?>">
                        </label>
                        <label class="btn bold">Informed consent document </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="text" class="mrg-hidden " name="recinfo_per" value="<?php Products::getValue('recinfo_per', $sopdata) ?>">
                        </label>
                        <label class="btn bold"> Physical examination results </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn bold"> Transplant Date/Time: </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden datetimepicker4" name="recinfo_trdt" value="<?php Products::getValue('recinfo_trdt', $sopdata) ?>">
                        </label>
                    </div>
                    <div class="input-group btn-group-lg ">
                        <label class="btn bold"> Minimum dose Requested:
                            (if applicable) </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden " name="recinfo_mdr" value="<?php Products::getValue('recinfo_mdr', $sopdata) ?>">
                        </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn bold red-highlight"> CMV status </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="recinfo_cmv_neg" <?php
                            if ((Products::getCheckValue('recinfo_cmv_neg', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Negative </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="recinfo_cmv_pos" <?php
                            if ((Products::getCheckValue('recinfo_cmv_pos', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Positive </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn bold red-highlight"> Penicillinallergy status</label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="recinfo_ps_allergic" <?php
                            if ((Products::getCheckValue('recinfo_ps_allergic', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Allergic </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="recinfo_ps_not" <?php
                            if ((Products::getCheckValue('recinfo_ps_not', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Not </label>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="border-bottom"> </div>
                <div class="border-bottom">
                    <div class="col-md-12">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold">Requesting Physician: </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="recinfo_req_phy" value="<?php Products::getValue('recinfo_req_phy', $sopdata) ?>">
                            </label>
                            <label class="btn bold">Date </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden datetimepicker4" name="recinfo_date" value="<?php Products::getValue('recinfo_date', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="20392_s2_comments" class="form-control rcom"><?php Products::getValue('20392_s2_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>
            <!-- TESTING OF RELEVANT COMMUNICABLE DISEASES -->
            <div class="row">
                <div class="border-bottom">
                    <div class="col-md-12">
                        <h3 class="red-highlight">CAUTION: Federal law prohibits dispensing without prescription". This Form, when properly completed, serves as a prescriptionAND SHOULD ONLY BE COMPLETED BY CLINICAL TEAM. Fax or email the completed form to 305-243-7998 or akhan@med.miami.edu; contact: 304 243 7999 for information or assistance. </h3>
                    </div>
                </div>
            </div>

            <!-- / Tests -->
            <div class="col-md-12 no-padding">
                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                    <div class="panel-heading">
                        <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                    </div>
                    <div class="panel-body no-padding-top" id="announcement">
                        <h2 class="text-center "> 2.	DONOR INFORMATION
                            <p>(Completed by processing Facility)</p>
                        </h2>
                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group btn-group-lg">
                    <label class="btn bold">Product Type </label>
                </div>
            </div>
            <?php
            if ($productsopflag == 'true') {
                ?>
                <div class="col-md-9" id="section2">
                    <?php
                } else {
                    ?>
                    <div class="col-md-9">
                        <?php
                    }
                    ?>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_autologous_check" <?php
                            if ((Products::getCheckValue('di_autologous_check', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            AutologousMSC, confirm with "Request for Processing" to match the donor with recipient's ID and name </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_allogeneic_check" <?php
                            if ((Products::getCheckValue('di_allogeneic_check', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Allogeneic MSC </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn bold red-highlight"> CMV status </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_cmv_neg" <?php
                            if ((Products::getCheckValue('di_cmv_neg', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Negative </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_cmv_pos" <?php
                            if ((Products::getCheckValue('di_cmv_pos', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Positive </label>
                    </div>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_withanti" <?php
                            if ((Products::getCheckValue('di_withanti', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            With antibiotic</label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="di_withoutanti" <?php
                            if ((Products::getCheckValue('di_withoutanti', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Without antibiotic </label>
                    </div>
                </div>
                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="20392_s1_comments" class="form-control rcom"><?php Products::getValue('20392_s1_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <div class="border-bottom"></div>
                <?php
                if (Yii::$app->user->can('reviewer')) {
                    ?>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Review by: </label>
                            <label class="btn col-md">
                                <input type="text" class="mrg-hidden" name="di_review_by" id="reviewed_by"  value="<?php Products::getValue('di_review_by', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn"> Date: </label>
                            <label class="btn col-md">
                                <input type="text" class="mrg-hidden datetimepicker4" name="20392_date"  value="<?php Products::getValue('20392_date', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <?php
                }
                ?>


                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
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