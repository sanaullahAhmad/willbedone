<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 2.010 I';
?>

<div class="row text-center">
    <?php echo $product->MSCID; ?>
</div>

<?php
if ($approvedflag == 'true') {
    ?>
    <div id="approvedflag"> 
        <?php
    } else {
        ?>
        <div> 
            <?php
        }
        ?>


        <!-- page content header -->

        <?php
        $form = ActiveForm::begin(['options' => [
                        'class' => 'form-signin',
                        'name' => 'nctpform',
                        'enctype' => 'multipart/form-data'
                    ],
                    'action' => ['products/sopsubmit']
        ]);
        ?>
        <h2 class="text-center text-primary">INSPECTION OF CELLULAR PRODUCT TO BE PROCESSED</h2>
        <br>
        <?php
        if ($productsopflag == 'true') {
            ?>
            <div id="section1">
                <?php
            } else {
                ?>
                <div class="row">
                    <?php
                }
                ?>
                <!-- DONOR INFORMATION -->
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="col-md-6">
                            <h3>1.	Study Name:
                                <label class="btn">
                                    <input class="mrg-hidden " type="text" name="icpp_study_name" value="<?php echo $donor->study_name ?>">
                                </label>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <h3>2.	Identification of product
                                <label class="btn">
                                    <input class="mrg-hidden " type="text" name="icpp_identification_of_product" value="<?php echo $product->MSCID; ?>">
                                </label>
                            </h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="input-group btn-group-lg">
                                <label class="btn "> Date of Inspection </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input class=" mrg-hidden datetimepicker4" type="text" name="icpp_date_of_inspection" value="<?php Products::getValue('icpp_date_of_inspection', $sopdata) ?>">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group btn-group-lg">
                                <label class="btn "> Time </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input class=" mrg-hidden datetimepicker4" type="text" name="icpp_time" value="<?php Products::getValue('icpp_time', $sopdata) ?>">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group btn-group-lg">
                                <label class="btn "> Collection Institution </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input class=" mrg-hidden" type="text" name="icpp_collection_institution" value="<?php Products::getValue('icpp_collection_institution', $sopdata) ?>">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border-bottom">
                        <div class="col-md-3">
                            <h3>Date of Inspection</h3>
                        </div>
                        <div class="col-md-2">
                            <h3>Time </h3>
                        </div>
                        <div class="col-md-7">
                            <h3>Collection Institution</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  border-right-light"> 
                    <!-- Name -->
                    <div class="col-xs-12"> 

                        <!-- /input-group --> 

                    </div>
                    <!-- / Name --> 
                    <!-- Email -->
                    <div class="col-xs-12"> </div>
                    <!-- / email --> 
                    <!-- Password -->
                    <div class="col-xs-12 col-md-12 ">
                        <h3> Product type Received for Processing: </h3>
                        <div class="input-group btn-group-lg">
                            <label class="btn">
                                <input class="checkbox-inline" type="checkbox" name="prp_blood" <?php
                                if ((Products::getCheckValue('prp_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Blood </label>
                            <label class="btn">
                                <input class="checkbox-inline" type="checkbox" name="prp_cord_blood" <?php
                                if ((Products::getCheckValue('prp_cord_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Cord Blood </label>
                            <label class="btn">
                                <input class="checkbox-inline" type="checkbox" name="prp_bone_marrow" <?php
                                if ((Products::getCheckValue('prp_bone_marrow', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Bone Marrow </label>
                            <label class="btn">
                                <input class="checkbox-inline" type="checkbox" name="prp_peripheral_blood" <?php
                                if ((Products::getCheckValue('prp_peripheral_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Peripheral Blood </label>
                            <label class="btn">
                                <input class="checkbox-inline" type="checkbox" name="prp_others_check" <?php
                                if ((Products::getCheckValue('prp_others_check', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Others </label>
                            <label class="btn">
                                <input class="mrg-hidden" type="text" name="prp_others_comments" value="<?php Products::getValue('prp_others_comments', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <!-- / password --> 
                </div>
                <div class="col-md-6"> <!-- Birthday -->

                    <h3> Final Product type Requested and/or to deliver </h3>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input class="checkbox-inline" type="checkbox" name="fprd_mononuclear_cells"  <?php
                            if ((Products::getCheckValue('fprd_mononuclear_cells', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Mononuclear Cells </label>
                        <label class="btn">
                            <input class="checkbox-inline" type="checkbox" name="fprd_msc" <?php
                            if ((Products::getCheckValue('fprd_msc', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            MSC </label>
                        <label class="btn">
                            <input class="checkbox-inline" type="checkbox" name="fprd_pbsc" <?php
                            if ((Products::getCheckValue('fprd_pbsc', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            PBSC </label>
                        <label class="btn">
                            <input class="checkbox-inline" type="checkbox" name="fprd_others_check" <?php
                            if ((Products::getCheckValue('fprd_others_check', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Others:
                            <label class="btn">
                                <input class="mrg-hidden" type="text" name="fprd_others_comment" value="<?php Products::getValue('fprd_others_comment', $sopdata) ?>">
                            </label>
                        </label>
                    </div>
                    <!-- / birthday --> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Donor ID </label>
                            <label class="btn">
                                <input class="mrg-hidden " type="text" name="donor_id" value="<?php echo $donor->donor_id ?>" disabled="disabled">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Product ID </label>
                            <label class="btn">
                                <input class="mrg-hidden" type="text" name="product_id" value="<?php echo $product->MSCID; ?>" disabled="disabled">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Collection date (if applicable) </label>
                            <label class="btn">
                                <input class="mrg-hidden datetimepicker4" type="text" name="fprd_collection_date"  value="<?php Products::getValue('fprd_collection_date', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Recipient ID </label>
                            <label class="btn">
                                <input class="mrg-hidden" type="text" name="fprd_recipient_id"  value="<?php echo $patient->recipient_id; ?>">
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
                    <textarea rows="6" name="icpp_comments" class="form-control rcom"><?php Products::getValue('icpp_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>
            <div class="clear"></div>

            <!-- DONOR INFORMATION FIELDS -->

            <div class="col-md-12 no-padding">
                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                    <div class="panel-heading">
                        <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                    </div>
                    <div id="announcement" class="panel-body no-padding-top">
                        <h2 class="text-center ">3.	Inspection of Product </h2>
                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                    </div>
                </div>
            </div>
            <!-- TESTING OF RELEVANT COMMUNICABLE DISEASES -->
            <?php
            if ($productsopflag == 'true') {
                ?>
                <div class="row" id="section2">
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <?php
                    }
                    ?>
                    <div class="border-bottom">
                        <div class="col-md-12">
                            <h3># Package(package type, circle: plastic tubes, bags, syringe, cup, etc…)</h3>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="col-md-12">
                            <h4>Visually inspect product&amp; label againstinformation in the request for processing form received from the Principal Investigator(check all that apply andcircle the correct answer)</h4>
                        </div>
                    </div>
                    <div class="border-bottom">
                        <div class="col-md-12">
                            <h4> Final Product type Requested and/or to deliver </h4>
                            <div class="input-group btn-group-lg">
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_leaking" <?php
                                    if ((Products::getCheckValue('iop_leaking', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Leaking (Y / N ) </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_total_volume_check" <?php
                                    if ((Products::getCheckValue('iop_total_volume_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Total volume : </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="iop_total_volume_comment" value="<?php Products::getValue('iop_total_volume_comment', $sopdata) ?>">
                                </label>
                                <label class="btn"> ml </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_expiration_date_check" <?php
                                    if ((Products::getCheckValue('iop_expiration_date_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Expiration date(if apply) </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="iop_expiration_date_comment" value="<?php Products::getValue('iop_expiration_date_comment', $sopdata) ?>">
                                </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_clot" <?php
                                    if ((Products::getCheckValue('iop_clot', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Clot ( Y / N ) </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_release_testing_passed" <?php
                                    if ((Products::getCheckValue('iop_release_testing_passed', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Release testing passed </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_product_labeled_match" <?php
                                    if ((Products::getCheckValue('iop_product_labeled_match', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Product labeled match ( Y / N ) </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_transport_temp_check" <?php
                                    if ((Products::getCheckValue('iop_transport_temp_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Transport temperature </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="iop_transport_temp_comment" value="<?php Products::getValue('iop_transport_temp_comment', $sopdata) ?>">
                                </label>
                                <label class="btn"> °C </label>
                                <label class="btn">
                                    <input class="checkbox-inline" type="checkbox" name="iop_sign_rpc_log_check" <?php
                                    if ((Products::getCheckValue('iop_sign_rpc_log_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Sign the"ReceiptProductControl Log" </label>
                                <label class="btn"> Other </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="iop_sign_rpc_log_comment" value="<?php Products::getValue('iop_sign_rpc_log_comment', $sopdata) ?>">
                                </label>
                            </div>
                            <!-- / birthday --> 
                        </div>
                    </div>
                    <div class="border-bottom">
                        <h3>If discrepancies found explain:</h3>
                        <label class="btn">
                            <input class="mrg-hidden" type="text" name="iop_discrepancies_explanation" value="<?php Products::getValue('iop_discrepancies_explanation', $sopdata) ?>">
                        </label>
                    </div>
                    <div class="border-bottom">
                        <div class="row">
                            <div class="col-md-5 padding-left-hidden">
                                <div class="input-group btn-group-lg">
                                    <h3>If discrepancies found notifyLab Director  
                                        &amp;Regulatory/QA department </h3>
                                    <label class="btn">
                                        <input class="checkbox-inline" type="checkbox" name="iop_discrepancies_notify_check" <?php
                                        if ((Products::getCheckValue('iop_discrepancies_notify_check', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        Notified </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-5">
                                    <h3>Corrective action if any: </h3>
                                    <label class="btn">
                                        <input class="mrg-hidden" type="text" name="iop_correction" value="<?php Products::getValue('iop_correction', $sopdata) ?>">
                                    </label>
                                </div>
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
                        <textarea rows="6" name="iop_comments" class="form-control rcom"><?php Products::getValue('iop_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <!-- / Tests -->

                <div class="col-md-12 no-padding">
                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                        <div class="panel-heading">
                            <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                        </div>
                        <div id="announcement" class="panel-body no-padding-top">
                            <h2 class="text-center ">4.	Product Accepted For Process </h2>
                            <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                        </div>
                    </div>
                </div>
                <?php
                if ($productsopflag == 'true') {
                    ?>
                    <div class="row" id="section3">
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <?php
                        }
                        ?>
                        <div class="col-md-12">
                            <div class="border-bottom">
                                <div class="col-md-12">
                                    <div class="input-group btn-group-lg">
                                        <label class="btn"> Product Accepted ( Y / N) </label>
                                        <label class="btn">
                                            <input class="checkbox-inline" type="checkbox" name="pap_product_accepted_yes" <?php
                                            if ((Products::getCheckValue('pap_product_accepted_yes', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Yes </label>
                                        <label class="btn">
                                            <input class="checkbox-inline" type="checkbox" name="pap_product_accepted_no" <?php
                                            if ((Products::getCheckValue('pap_product_accepted_no', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            No </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="border-bottom">
                                <div class="col-md-12">
                                    <div class="input-group btn-group-lg">
                                        <h1> Product Inspected by: </h1>
                                        <input class="mrg-hidden" type="text" name="pap_product_accepted_by" value="<?php Products::getValue('pap_product_accepted_by', $sopdata) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom">
                                <div class="col-md-12">
                                    <h1> Product Inspected by( a second personrequired )</h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            if (Yii::$app->user->can('reviewer')) {
                                ?>
                                <div class="col-md-12">
                                    <div class="input-group btn-group-lg">
                                        <label class="btn"> Review by: </label>
                                        <label class="btn col-md">
                                            <input class="mrg-hidden " type="text" name="pap_reviewed_by" value="<?php Products::getValue('pap_reviewed_by', $sopdata) ?>" id="reviewed_by">
                                        </label>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="pap_comments" class="form-control rcom"><?php Products::getValue('pap_comments', $sopdata) ?></textarea>
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