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
        <h1 class="text-center ">ALLOGENEICDONOR PRODUCT TRACKING</h1>
        <h2 class="text-center text-primary">PRODUCT UNIQUE ID</h2>
        <br>
        <table class="hidden-background" border="0" width="100%">
            <tr>
                <td colspan="2"><div class="col-md-12 no-padding">
                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                            <div class="panel-heading">
                                <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                            </div>
                            <div id="announcement" class="panel-body no-padding-top">
                                <h2 class="text-center ">1.  DONOR INFORMATION</h2>
                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <?php
        if ($productsopflag == 'true') {
            ?>
            <table id="section1" class="hidden-background" border="0" width="100%">
                <?php
            } else {
                ?>
                <table class="hidden-background" border="0" width="100%">
                    <?php
                }
                ?>
                <tr>
                    <td colspan="2"><label class="btn"> Name </label>
                        <label class="btn">
                            <input class="mrg-hidden" name="donor_name" type="text" value="<?php Products::getValue('donor_name', $sopdata) ?>">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="btn"> Donor ID </label>
                        <label class="btn">
                            <input class="mrg-hidden" type="text" name="donor_id" value="<?php Products::getValue('donor_id', $sopdata) ?>">
                        </label>
                    </td>
                    <td>
                        <label class="btn"> Hospital ID </label>
                        <label class="btn">
                            <input class="mrg-hidden" type="text" name="di_hospital_id" value="<?php Products::getValue('di_hospital_id', $sopdata) ?>">
                        </label>
                        <label class="btn"> DOB </label>
                        <label class="btn">
                            <input class="mrg-hidden datetimepicker4" type="text" name="di_dob" value="<?php echo $donor->date_of_birth ?>">
                        </label>
                    </td>
                </tr>
            </table>
            <table class="hidden-background" border="0" width="100%">
                <tr>
                    <td colspan="2"><div class="col-md-12 no-padding">
                            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                <div class="panel-heading">
                                    <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                                </div>
                                <div id="announcement" class="panel-body no-padding-top">
                                    <h2 class="text-center ">2. PRODUCT COLLECTION </h2>
                                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                </div>
                            </div>
                        </div></td>
                </tr>
            </table>
            <?php
            if ($productsopflag == 'true') {
                ?>
                <table class="hidden-background" border="0" width="100%" id="section2">
                    <?php
                } else {
                    ?>
                    <table class="hidden-background" border="0" width="100%">
                        <?php
                    }
                    ?>
                    <tr>
                        <td><p>Collection facility</p></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><p>Collection time and date

                            </p><p></p></td>
                        <td><p class="col-md-6">
                                <label class="btn both-pad-hidden"> Date:</label>
                                <label class="btn">
                                    <input class="mrg-hidden datetimepicker4" type="text" name="pc_date" value="<?php Products::getValue('pc_date', $sopdata) ?>">
                                </label>
                            </p>
                            <p class="col-md-6">
                                <label class="btn both-pad-hidden"> Time:</label>
                                <label class="btn">
                                    <input class="mrg-hidden datetimepicker4" type="text" name="pc_time" value="<?php Products::getValue('pc_time', $sopdata) ?>">
                                </label>
                            </p></td>
                    </tr>
                    <tr>
                        <td><p>Transported by (write name of courier company and/or personnel if transport by non CMP staff)</p></td>
                        <td><p class="col-md-6">Picked up </p>
                            <p class="col-md-6">Delivered   (circle one)</p>
                            <p class="col-md-12">
                                <label class="btn both-pad-hidden"> Initials (CMP Staff)</label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="pc_initials" value="<?php Products::getValue('pc_initials', $sopdata) ?>">
                                </label>
                            </p>
                            <p class="col-md-12">
                                <label class="btn both-pad-hidden"> Non CMP staff </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="pc_non_cmp_staff" value="<?php Products::getValue('pc_non_cmp_staff', $sopdata) ?>">
                                </label>
                            </p></td>
                    </tr>
                </table>
                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="pc_comments" class="form-control rcom"><?php Products::getValue('pc_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <table class="hidden-background" border="0" width="100%">
                    <tr>
                        <td colspan="2"><div class="col-md-12 no-padding">
                                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                    <div class="panel-heading">
                                        <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                                    </div>
                                    <div id="announcement" class="panel-body no-padding-top">
                                        <h2 class="text-center ">3. PRODUCT RECEIVED </h2>
                                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                    </div>
                                </div>
                            </div></td>
                    </tr>
                </table>
                <?php
                if ($productsopflag == 'true') {
                    ?>
                    <table class="hidden-background" border="0" width="100%" id="section3">
                        <?php
                    } else {
                        ?>
                        <table class="hidden-background" border="0" width="100%">
                            <?php
                        }
                        ?>
                        <tr>
                            <td><p>Product Temperature @ the time received</p>
                                <label class="btn both-pad-hidden">
                                    <input class="checkbox-inline" type="checkbox" name="pr_rt_check" <?php
                                    if ((Products::getCheckValue('pr_rt_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    RT 18-25C </label>
                                <label class="btn ">
                                    <input class="checkbox-inline" type="checkbox" name="pr_18_check" <?php
                                    if ((Products::getCheckValue('pr_18_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    1-8C </label>
                                <label class="btn ">
                                    <input class="checkbox-inline" type="checkbox" name="pr_12_18_check" <?php
                                    if ((Products::getCheckValue('pr_12_18_check', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>>
                                    -120 to -180C </label></td>
                            <td><label class="btn">
                                    <input class="mrg-hidden" type="text">
                                </label>
                                <label class="btn both-pad-hidden"> Acceptable </label>
                                <label class="btn">
                                    <input class="mrg-hidden" type="text" name="pr_acceptable" value="<?php Products::getValue('pr_acceptable', $sopdata) ?>">
                                </label>
                                <label class="btn both-pad-hidden"> Not acceptable</label>
                                <p class="col-md-12">
                                    <label class="btn"> Comments if not acceptable</label>
                                    <label class="btn">
                                        <input class="mrg-hidden" type="text" name="pr_not_acceptable_comments" value="<?php Products::getValue('pr_not_acceptable_comments', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr>
                            <td><p>Product Integrity Acceptable
                                    (Check one)</p></td>
                            <td><p class="col-md-6">
                                    <label class="btn"><input class="checkbox-inline" type="radio" name="pr_pia_radio_yes" <?php
                                        if ((Products::getCheckValue('pr_pia_radio_yes', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>Yes</label>
                                </p>
                                <p class="col-md-6">
                                    <label class="btn "><input class="checkbox-inline" type="radio" name="pr_pia_radio_no" <?php
                                        if ((Products::getCheckValue('pr_pia_radio_no', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>No</label>
                                </p>
                                <p class="col-md-12 ">
                                    <label class="btn"> Comments if not acceptable</label>
                                    <label class="btn">
                                        <input class="mrg-hidden" type="text" name="pr_not_acceptable_comments" value="<?php Products::getValue('pr_not_acceptable_comments', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr>
                            <td><p>Received by </p></td>
                            <td><p class="col-md-12 ">
                                    <label class="btn"> Initials </label>
                                    <label class="btn">
                                        <input class="mrg-hidden" type="text" name="pr_initials" value="<?php Products::getValue('pr_initials', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                        <tr>
                            <td><p>Date and Time</p></td>
                            <td><p class="col-md-6 ">
                                    <label class="btn"> Date</label>
                                    <label class="btn">
                                        <input class="mrg-hidden datetimepicker4" type="text" name="pr_date" value="<?php Products::getValue('pr_date', $sopdata) ?>">
                                    </label>
                                </p>
                                <p class="col-md-6 ">
                                    <label class="btn"> Time</label>
                                    <label class="btn">
                                        <input class="mrg-hidden datetimepicker4" type="text" name="pr_time" value="<?php Products::getValue('pr_time', $sopdata) ?>">
                                    </label>
                                </p></td>
                        </tr>
                    </table>
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="pr_comments" class="form-control rcom"><?php Products::getValue('pr_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <table class="hidden-background" border="0" width="100%">
                        <tr>
                            <td colspan="2"><div class="col-md-12 no-padding">
                                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                        <div class="panel-heading">
                                            <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                                        </div>
                                        <div id="announcement" class="panel-body no-padding-top">
                                            <h2 class="text-center ">4. PRODUCT PROCESS</h2>
                                            <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                        </div>
                                    </div>
                                </div></td>
                        </tr>
                    </table>
                    <?php
                    if ($productsopflag == 'true') {
                        ?>
                        <table class="hidden-background" border="0" width="100%" id="section4">
                            <?php
                        } else {
                            ?>
                            <table class="hidden-background" border="0" width="100%">
                                <?php
                            }
                            ?>
                            <tr>
                                <td><p>Process Started Date and Time</p></td>
                                <td><p class="col-md-3">
                                        <label class="btn"> Date</label>
                                        <label class="btn">
                                            <input class=" mrg-hidden datetimepicker4" type="text" name="ppr_ps_date" value="<?php Products::getValue('ppr_ps_date', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-3">
                                        <label class="btn"> Time</label>
                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_ps_time" value="<?php Products::getValue('ppr_ps_time', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-3">
                                        <label class="btn"> Initials: </label>

                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_ps_initials" value="<?php Products::getValue('ppr_ps_initials', $sopdata) ?>">
                                        </label>
                                    </p></td>
                            </tr>
                            <tr>
                                <td><p>Process completion</p></td>
                                <td><p class="col-md-12">
                                        <label class="btn "> Cryopreserved:     Storage location:</label>
                                    </p>
                                    <p class="col-md-12 ">
                                        <label class="btn"> Section</label>
                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_pc_section" value="<?php Products::getValue('ppr_pc_section', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-12 ">
                                        <label class="btn"> Column</label>
                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_pc_column" value="<?php Products::getValue('ppr_pc_column', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-12 ">
                                        <label class="btn"> Slot</label>
                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_pc_slot" value="<?php Products::getValue('ppr_pc_slot', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-3">
                                        <label class="btn"> Fresh infusion:    Date</label>
                                        <label class="btn">
                                            <input class="mrg-hidden datetimepicker4" type="text" name="ppr_fi_date" value="<?php Products::getValue('ppr_fi_date', $sopdata) ?>">
                                        </label>
                                    </p>
                                    <p class="col-md-3">
                                        <label class="btn"> Time</label>
                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_fi_time" value="<?php Products::getValue('ppr_fi_time', $sopdata) ?>">
                                        </label> 
                                    </p>
                                    <p class="col-md-3">
                                        <label class="btn"> Initials: </label>

                                        <label class="btn">
                                            <input class="mrg-hidden" type="text" name="ppr_fi_initials" value="<?php Products::getValue('ppr_fi_initials', $sopdata) ?>">
                                        </label>
                                    </p></td>
                            </tr>
                        </table>
                        <?php
                        if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                            ?>
                            <div class="row">
                                <h3>Comments</h3>
                            </div>
                            <div class="row">
                                <textarea rows="6" name="pp_comments" class="form-control rcom"><?php Products::getValue('pp_comments', $sopdata) ?></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <table class="hidden-background" border="0" width="100%">
                            <tr>
                                <td colspan="2"><div class="col-md-12 no-padding">
                                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                            <div class="panel-heading">
                                                <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                                            </div>
                                            <div id="announcement" class="panel-body no-padding-top">
                                                <h2 class="text-center ">5. PRODUCT RELEASED AND TRANSPORT</h2>
                                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="hidden-background" border="0" width="100%">
                            <tr>
                                <td colspan="2"><h1 class="text-center">Refer to recipients infusion records for information</h1></td>
                            </tr>
                        </table>
                        <table class="hidden-background" border="0" width="100%">
                            <tr>
                                <td colspan="2"><div class="col-md-12 no-padding">
                                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                            <div class="panel-heading">
                                                <div class="tools pull-right"> <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a> </div>
                                            </div>
                                            <div id="announcement" class="panel-body no-padding-top">
                                                <h2 class="text-center ">6. PRODUCT FINAL DISPOSITION</h2>
                                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                        if ($productsopflag == 'true') {
                            ?>
                            <table class="hidden-background" border="0" width="100%" id="section5">
                                <?php
                            } else {
                                ?>
                                <table class="hidden-background" border="0" width="100%">
                                    <?php
                                }
                                ?>

                                <?php
                                if ($infusion_no == 1) {
                                    
                                } else {
                                    ?>
                                    <?php
                                }
                                ?>
                                <tr id="infusion_enabled">
                                    <td><p class="col-md-12"><b>Infusion #1</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i1_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i1_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_bagno1" value="<?php Products::getValue('pfd_i1_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_of1" value="<?php Products::getValue('pfd_i1_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_bagno2" value="<?php Products::getValue('pfd_i1_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_of2" value="<?php Products::getValue('pfd_i1_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_bagno3" value="<?php Products::getValue('pfd_i1_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i1_of3" value="<?php Products::getValue('pfd_i1_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i1_recipient_name" value="<?php Products::getValue('pfd_i1_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i1_randomizedno" value="<?php Products::getValue('pfd_i1_randomizedno', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i1_hospital_id" value="<?php Products::getValue('pfd_i1_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i1_dob" value="<?php Products::getValue('pfd_i1_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12 datetimepicker4" type="text" name="pfd_i1_infusion_date" value="<?php Products::getValue('pfd_i1_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i1_dose" value="<?php Products::getValue('pfd_i1_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12 datetimepicker4" type="text" name="pfd_i1_start_time" value="<?php Products::getValue('pfd_i1_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12 datetimepicker4" type="text" name="pfd_i1_end_time" value="<?php Products::getValue('pfd_i1_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i1_initials" value="<?php Products::getValue('pfd_i1_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i1_comments" value="<?php Products::getValue('pfd_i1_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i1_reviewed_by" value="<?php Products::getValue('pfd_i1_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i1_date" value="<?php Products::getValue('pfd_i1_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>


                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #2</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i2_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i2_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_bagno1" value="<?php Products::getValue('pfd_i2_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_of1" value="<?php Products::getValue('pfd_i2_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_bagno2" value="<?php Products::getValue('pfd_i2_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_of2" value="<?php Products::getValue('pfd_i2_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_bagno3" value="<?php Products::getValue('pfd_i2_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i2_of3" value="<?php Products::getValue('pfd_i2_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i2_recipient_name" value="<?php Products::getValue('pfd_i2_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_randamozedno" value="<?php Products::getValue('pfd_i2_randamozedno', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i2_hospital_id"  value="<?php Products::getValue('pfd_i2_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_dob" value="<?php Products::getValue('pfd_i2_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i2_infusion_date" value="<?php Products::getValue('pfd_i2_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_dose" value="<?php Products::getValue('pfd_i2_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i2_start_time" value="<?php Products::getValue('pfd_i2_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_end_time" value="<?php Products::getValue('pfd_i2_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_initials" value="<?php Products::getValue('pfd_i2_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i2_comments" value="<?php Products::getValue('pfd_i2_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i2_reviewed_by" value="<?php Products::getValue('pfd_i2_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i2_date" value="<?php Products::getValue('pfd_i2_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #3</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i3_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i3_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_bagno1" value="<?php Products::getValue('pfd_i3_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_of1" value="<?php Products::getValue('pfd_i3_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_bagno2" value="<?php Products::getValue('pfd_i3_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_of2" value="<?php Products::getValue('pfd_i3_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_bagno3" value="<?php Products::getValue('pfd_i3_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i3_of3" value="<?php Products::getValue('pfd_i3_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i3_recipient_name" value="<?php Products::getValue('pfd_i3_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_randomizedno" value="<?php Products::getValue('pfd_i3_randomizedno', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i3_hospital_id"  value="<?php Products::getValue('pfd_i3_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_dob" value="<?php Products::getValue('pfd_i3_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i3_infusion_date" value="<?php Products::getValue('pfd_i3_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_dose" value="<?php Products::getValue('pfd_i3_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i3_start_time" value="<?php Products::getValue('pfd_i3_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_end_time" value="<?php Products::getValue('pfd_i3_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_initials" value="<?php Products::getValue('pfd_i3_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i3_comments" value="<?php Products::getValue('pfd_i3_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i3_reviewed_by" value="<?php Products::getValue('pfd_i3_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i3_date" value="<?php Products::getValue('pfd_i3_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #4</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i4_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i4_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_bagno1" value="<?php Products::getValue('pfd_i4_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_of1" value="<?php Products::getValue('pfd_i4_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_bagno2" value="<?php Products::getValue('pfd_i4_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_of2" value="<?php Products::getValue('pfd_i4_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_bagno3" value="<?php Products::getValue('pfd_i4_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i4_of3" value="<?php Products::getValue('pfd_i4_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i4_recipient_name" value="<?php Products::getValue('pfd_i4_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_randomized_no" value="<?php Products::getValue('pfd_i4_randomized_no', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i4_hospital_id" value="<?php Products::getValue('pfd_i4_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_dob" value="<?php Products::getValue('pfd_i4_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i4_infusion_date" value="<?php Products::getValue('pfd_i4_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_dose" value="<?php Products::getValue('pfd_i4_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i4_start_time" value="<?php Products::getValue('pfd_i4_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_end_time" value="<?php Products::getValue('pfd_i4_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_initials" value="<?php Products::getValue('pfd_i4_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i4_comments" value="<?php Products::getValue('pfd_i4_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i4_reviewed_by" value="<?php Products::getValue('pfd_i4_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i4_date" value="<?php Products::getValue('pfd_i4_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #5</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i5_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i5_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_bagno1" value="<?php Products::getValue('pfd_i5_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_of1" value="<?php Products::getValue('pfd_i5_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_bagno2" value="<?php Products::getValue('pfd_i5_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_of2" value="<?php Products::getValue('pfd_i5_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_bagno3" value="<?php Products::getValue('pfd_i5_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i5_of3" value="<?php Products::getValue('pfd_i5_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i5_recipient_name" value="<?php Products::getValue('pfd_i5_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_randomizedno" value="<?php Products::getValue('pfd_i5_randomizedno', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i5_hospital_id" value="<?php Products::getValue('pfd_i5_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_dob" value="<?php Products::getValue('pfd_i5_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i5_infusion_date" value="<?php Products::getValue('pfd_i5_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_dose" value="<?php Products::getValue('pfd_i5_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i5_start_time" value="<?php Products::getValue('pfd_i5_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_end_time" value="<?php Products::getValue('pfd_i5_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_initials" value="<?php Products::getValue('pfd_i5_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i5_comments" value="<?php Products::getValue('pfd_i5_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i5_reviewed_by" value="<?php Products::getValue('pfd_i5_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i5_date" value="<?php Products::getValue('pfd_i5_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #6</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i6_nacheck"<?php
                                                if ((Products::getCheckValue('pfd_i6_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_bagno1" value="<?php Products::getValue('pfd_i6_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_of1" value="<?php Products::getValue('pfd_i6_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_bagno2" value="<?php Products::getValue('pfd_i6_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_of2" value="<?php Products::getValue('pfd_i6_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_bagno3" value="<?php Products::getValue('pfd_i6_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i6_of3" value="<?php Products::getValue('pfd_i6_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Recipient Name</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i6_recipient_name" value="<?php Products::getValue('pfd_i6_recipient_name', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Randomized # </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_randomizedno" value="<?php Products::getValue('pfd_i6_randomizedno', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i6_hospital_id" value="<?php Products::getValue('pfd_i6_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_dob" value="<?php Products::getValue('pfd_i6_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i6_infusion_date" value="<?php Products::getValue('pfd_i6_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_dose" value="<?php Products::getValue('pfd_i6_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i6_start_time" value="<?php Products::getValue('pfd_i6_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_end_time" value="<?php Products::getValue('pfd_i6_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_initials" value="<?php Products::getValue('pfd_i6_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i6_comments" value="<?php Products::getValue('pfd_i6_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i6_reviewed_by" value="<?php Products::getValue('pfd_i6_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i6_date" value="<?php Products::getValue('pfd_i6_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12"><b>Infusion #7</b></p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn ">
                                                <input class="checkbox-inline" type="checkbox" name="pfd_i7_nacheck" <?php
                                                if ((Products::getCheckValue('pfd_i7_nacheck', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                N/A</label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_bagno1" value="<?php Products::getValue('pfd_i7_bagno1', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_of1" value="<?php Products::getValue('pfd_i7_of1', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_bagno2" value="<?php Products::getValue('pfd_i7_bagno2', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_of2" value="<?php Products::getValue('pfd_i7_of2', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Bag #</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_bagno3" value="<?php Products::getValue('pfd_i7_bagno3', $sopdata) ?>">
                                            </label>
                                            <label class="btn">of </label>
                                            <label class="btn">
                                                <input class="mrg-hidden  xs-input" type="text" name="pfd_i7_of3" value="<?php Products::getValue('pfd_i7_of3', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Hospital ID</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i7_hospital_id" value="<?php Products::getValue('pfd_i7_hospital_id', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align"> DOB</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i7_dob" value="<?php Products::getValue('pfd_i7_dob', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Infusion Date</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i7_infusion_date" value="<?php Products::getValue('pfd_i7_infusion_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Dose </label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i7_dose" value="<?php Products::getValue('pfd_i7_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Start time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i7_start_time" value="<?php Products::getValue('pfd_i7_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">End time</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i7_end_time" value="<?php Products::getValue('pfd_i7_end_time', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class="col-md-12 top-bold-mrg"> (request information from infusion coordinator) </p>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Initials:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i7_initials" value="<?php Products::getValue('pfd_i7_initials', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Comment:</label>
                                            <label class="btn">
                                                <input class="mrg-hidden col-md-12" type="text" name="pfd_i7_comments" value="<?php Products::getValue('pfd_i7_comments', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn col-align">Reviewed by</label>
                                            <label class="btn">
                                                <input class="mrg-hidden  col-md-12" type="text" name="pfd_i7_reviewed_by" value="<?php Products::getValue('pfd_i7_reviewed_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn col-align">Date: </label>
                                            <label class="btn">
                                                <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="pfd_i7_date" value="<?php Products::getValue('pfd_i7_date', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                </tr>
                            </table>
                            <?php
                            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                ?>
                                <div class="row">
                                    <h3>Comments</h3>
                                </div>
                                <div class="row">
                                    <textarea rows="6" name="pfd_comments" class="form-control rcom"><?php Products::getValue('pfd_comments', $sopdata) ?></textarea>
                                </div>
                                <?php
                            }
                            ?>
                            <table width="100%" border="0" class="hidden-background">
                                <tr>
                                    <td colspan="2"><hr class="top-bottom-mrg"></td>
                                </tr>        
                            </table>

                            <table width="100%" border="0" class="hidden-background">
                                <tr>
                                    <td colspan="2"><h1 class="text-center"><b>DISCARD</b></h1>
                                        <h1 class="text-center"> (if applicable follow instruction on SOP CMP 2.011) </h1>
                                    </td>
                                </tr>        
                            </table>

                            <?php
                            if ($productsopflag == 'true') {
                                ?>
                                <table width="100%" border="0" class="hidden-background" id="section6">
                                    <?php
                                } else {
                                    ?>
                                    <table width="100%" border="0" class="hidden-background">
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="2"><div class="col-md-12 both-pad-hidden">
                                                <label class="btn col-align">Reason:</label>
                                                <label class="btn">
                                                    <input class="mrg-hidden col-md-12" type="text" name="dis_reason" value="<?php Products::getValue('dis_reason', $sopdata) ?>">
                                                </label>
                                            </div>
                                            <div class="col-md-12 both-pad-hidden">
                                                <label class="btn col-align">Comments:</label>
                                                <label class="btn">
                                                    <input class="mrg-hidden col-md-12" type="text" name="dis_comments" value="<?php Products::getValue('dis_comments', $sopdata) ?>">
                                                </label>
                                            </div>
                                            <p class="col-md-12 top-bold-mrg"> Product discard form completed and approved (attach a copy): </p>
                                            <div class="col-md-12 both-pad-hidden">
                                                <label class="btn col-align">Initials</label>
                                                <label class="btn">
                                                    <input class="mrg-hidden  col-md-12" type="text" name="dis_initials" value="<?php Products::getValue('dis_initials', $sopdata) ?>">
                                                </label>
                                                <label class="btn col-align">Reviewed by: </label>
                                                <label class="btn">
                                                    <input class="mrg-hidden col-md-12" type="text" name="dis_reviewed_by" value="<?php Products::getValue('dis_reviewed_by', $sopdata) ?>">
                                                </label>
                                            </div>
                                            <?php
                                            if (Yii::$app->user->can('reviewer')) {
                                                ?>
                                                <div class="col-md-12 both-pad-hidden">
                                                    <label class="btn col-align">Final Reviewed by: </label>
                                                    <label class="btn">
                                                        <input class="mrg-hidden  col-md-12" type="text" name="dis_final_reviewed_by" value="<?php Products::getValue('dis_final_reviewed_by', $sopdata) ?>" id="reviewed_by">
                                                    </label>
                                                    <label class="btn col-align">Date: </label>
                                                    <label class="btn">
                                                        <input class=" mrg-hidden datetimepicker4 col-md-12" type="text" name="dis_date" value="<?php Products::getValue('dis_date', $sopdata) ?>">
                                                    </label>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><hr class="top-bottom-mrg"></td>
                                    </tr>
                                </table>
                                <?php
                                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                    ?>
                                    <div class="row">
                                        <h3>Comments</h3>
                                    </div>
                                    <div class="row">
                                        <textarea rows="6" name="discard_comments" class="form-control rcom"><?php Products::getValue('discard_comments', $sopdata) ?></textarea>
                                    </div>
                                    <?php
                                }
                                ?>
                                <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">

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
                                if (Yii::$app->user->can('reviewer') && $approvedflag != 'true' && $infusion == FALSE) {
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
                                if ($infusion) {
                                    ?>
                                    <div class="col-md-10">
                                        <p class="submit-view-btn col-md-12">
                                            <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/infsopdetail&id=<?= $product->id; ?>&sopnum=<?= $aftersopnum ?>">
                                                Save and Goto Infusion
                                                <i class="icon-chevron-right"></i>
                                            </a>
                                        </p>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php ActiveForm::end(); ?>