<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 2.030 II';
?>

<div class="row text-center">
    <?php echo $product->MSCID; ?>
</div>
<!-- page content header -->
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
        <?php
        $form = ActiveForm::begin(['options' => [
                        'class' => 'form-signin',
                        'name' => 'nctpform',
                        'enctype' => 'multipart/form-data'
                    ],
                    'action' => ['products/sopsubmit']
        ]);
        ?>
        <h2 class="text-center text-primary">INSPECTION OF CELLULAR PRODUCT TO BE ISSUED</h2>
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
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h3>1.	Study Name:
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_study_name" value="<?php echo $donor->study_name; ?>">
                            </label>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <h3>Study Treatment #:
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_study_treatment_no" value="<?php Products::getValue('icp_study_treatment_no', $sopdata) ?>">
                            </label>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h3>2.	Identification of product
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="icp_id_of_product" value="<?php echo $product->MSCID; ?>">
                            </label>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn "> Date of Inspection </label>
                            <label class="btn">
                                <div class="col-md-12">
                                    <input type="text" class="mrg-hidden datetimepicker4" name="icp_date_of_inspection" value="<?php Products::getValue('icp_date_of_inspection', $sopdata) ?>">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn "> Time </label>
                            <label class="btn">
                                <div class="col-md-12">
                                    <input type="text" class=" mrg-hidden datetimepicker4" name="icp_time" value="<?php Products::getValue('icp_time', $sopdata) ?>">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
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
                                <input type="checkbox" class="checkbox-inline" name="icp_ptrp_blood" <?php
                                if ((Products::getCheckValue('icp_ptrp_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Blood </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="icp_ptrp_cord_blood" <?php
                                if ((Products::getCheckValue('icp_ptrp_cord_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Cord Blood </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="icp_ptrp_bone_marrow" <?php
                                if ((Products::getCheckValue('icp_ptrp_bone_marrow', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Bone Marrow </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="icp_ptrp_peri_blood" <?php
                                if ((Products::getCheckValue('icp_ptrp_peri_blood', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Peripheral Blood </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="icp_ptrp_others" <?php
                                if ((Products::getCheckValue('icp_ptrp_others', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>
                                Others </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_ptrp_others_comment" value="<?php Products::getValue('icp_ptrp_others_comment', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <!-- / password --> 
                </div>
                <div class="col-md-6"> <!-- Birthday -->

                    <h3> Final Product type Requested and/or to deliver </h3>
                    <div class="input-group btn-group-lg">
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="icp_fptr_mono_cells" <?php
                            if ((Products::getCheckValue('icp_fptr_mono_cells', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Mononuclear Cells </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="icp_fptr_msc" <?php
                            if ((Products::getCheckValue('icp_fptr_msc', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            MSC </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="icp_fptr_pbsc" <?php
                            if ((Products::getCheckValue('icp_fptr_pbsc', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            PBSC </label>
                        <label class="btn">
                            <input type="checkbox" class="checkbox-inline" name="icp_fptr_others" <?php
                            if ((Products::getCheckValue('icp_fptr_others', $sopdata)) == "on") {
                                echo 'checked="checked" ';
                            }
                            ?>>
                            Others:
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_fptr_others_comments" value="<?php Products::getValue('icp_fptr_others_comments', $sopdata) ?>">
                            </label>
                        </label></div>
                    <!-- / birthday --> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Donor ID </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden " name="icp_fptr_donor_id" value="<?php echo $donor->donor_id; ?>">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Product ID </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="product_id" value="<?php echo $product->MSCID; ?>">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Collection date (if applicable) </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_fptr_collection_date" value="<?php Products::getValue('icp_fptr_collection_date', $sopdata) ?>">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group btn-group-lg">
                            <label class="btn bold"> Recipient ID </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="icp_fptr_rec_id" value="<?php echo $product->recipient_id; ?>">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!-- DONOR INFORMATION FIELDS -->


            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="20101p_s1_comments" class="form-control rcom"><?php Products::getValue('20101p_s1_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>

            <div class="col-md-12 no-padding">
                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                    <div class="panel-heading">
                        <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                    </div>
                    <div class="panel-body no-padding-top" id="announcement">
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
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_leaking" <?php
                                    if ((Products::getCheckValue('icp_iop_leaking', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Leaking (Y / N ) </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_total_volume" <?php
                                    if ((Products::getCheckValue('icp_iop_total_volume', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Total volume : </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden" name="icp_iop_total_volume_comment" value="<?php Products::getValue('icp_iop_total_volume_comment', $sopdata) ?>">
                                </label>
                                <label class="btn"> ml </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_exp_date_check" <?php
                                    if ((Products::getCheckValue('icp_iop_exp_date_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Expiration date(if apply) </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden" name="icp_iop_exp_date" value="<?php Products::getValue('icp_iop_exp_date', $sopdata) ?>">
                                </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_clot" <?php
                                    if ((Products::getCheckValue('icp_iop_clot', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Clot ( Y / N ) </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_rtp" <?php
                                    if ((Products::getCheckValue('icp_iop_rtp', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Release testing passed </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_plm" <?php
                                    if ((Products::getCheckValue('icp_iop_plm', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Product labeled match ( Y / N ) </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_tt" <?php
                                    if ((Products::getCheckValue('icp_iop_tt', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Transport temperature </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden" name="icp_iop_tt_comment"  value="<?php Products::getValue('icp_iop_tt_comment', $sopdata) ?>">
                                </label>
                                <label class="btn"> °C </label>
                                <label class="btn">
                                    <input type="checkbox" class="checkbox-inline" name="icp_iop_srpcl" <?php
                                    if ((Products::getCheckValue('icp_iop_srpcl', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    Sign the"ReceiptProductControl Log" </label>
                                <label class="btn"> Other </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden" name="icp_iop_others" value="<?php Products::getValue('icp_iop_others', $sopdata) ?>">
                                </label>
                            </div>
                            <!-- / birthday --> 
                        </div>
                    </div>
                    <div class="border-bottom">
                        <h3>If discrepancies found explain:</h3>
                    </div>
                    <div class="border-bottom">
                        <div class="row">
                            <div class="col-md-5 padding-left-hidden">
                                <div class="input-group btn-group-lg">
                                    <h3>If discrepancies found notifyLab Director  
                                        &amp;Regulatory/QA department </h3>
                                    <label class="btn">
                                        <input type="checkbox" class="checkbox-inline" name="icp_iop_notified" <?php
                                        if ((Products::getCheckValue('icp_iop_notified', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        Notified </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="col-md-5">
                                    <h3>Corrective action if any: </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Tests -->

                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="20101p_s2_comments" class="form-control rcom"><?php Products::getValue('20101p_s2_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-12 no-padding">
                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                        <div class="panel-heading">
                            <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                        </div>
                        <div class="panel-body no-padding-top" id="announcement">
                            <h2 class="text-center ">4.	Product Acceptedforprocess </h2>
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
                        <div class="border-bottom">
                            <div class="col-md-12">
                                <div class="input-group btn-group-lg">
                                    <label class="btn"> Product Accepted ( Y / N) </label>
                                    <label class="btn">
                                        <input type="checkbox" class="checkbox-inline" name="icp_pap_pa_yes" <?php
                                        if ((Products::getCheckValue('icp_pap_pa_yes', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        Yes </label>
                                    <label class="btn">
                                        <input type="checkbox" class="checkbox-inline" name="icp_pap_pa_no" <?php
                                        if ((Products::getCheckValue('icp_pap_pa_no', $sopdata)) == "on") {
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
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom">
                            <div class="col-md-12">
                                <h1> Product Inspected by( a second personrequired )</h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                    </div>

                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="20101p_s3_comments" class="form-control rcom"><?php Products::getValue('20101p_s3_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="clearfix"></div>
                    <?php
                    if (Yii::$app->user->can('reviewer')) {
                        ?>
                        <div class="col-md-12">
                            <div class="input-group btn-group-lg">
                                <label class="btn"> Review by: </label>
                                <label class="btn col-md">
                                    <input type="text" class="mrg-hidden" name="20101p_review_by" id="reviewed_by" value="<?php Products::getValue('20101p_review_by', $sopdata) ?>">
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