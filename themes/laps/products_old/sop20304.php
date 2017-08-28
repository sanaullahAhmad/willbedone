<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 2.030 IV';
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
        <h1 class="text-center ">ALLOGENEICDONOR PRODUCT TRACKING</h1>
        <h2 class="text-center text-primary">PRODUCT UNIQUE ID</h2>
        <div class="profile-img"></div>
        <br>
        <?php
        if ($productsopflag == 'true') {
            ?>
            <table id="section1" width="100%">
                <?php
            } else {
                ?>
                <table width="100%">
                    <?php
                }
                ?>
                <tbody><tr>
                        <td width="22%" height="50"><p class="col-md-12">IND/STUDY NAME</p></td>
                        <td width="78%"><input type="text" class="detail-content-form border-hidden" name="pui_study_name" value="<?php echo $donor->study_name; ?>"></td>
                    </tr>
                    <tr>
                        <td height="50"><p class="col-md-12">Product Type</p></td>
                        <td><input type="text" class="detail-content-form border-hidden" name="pui_product_type" value="<?php Products::getValue('pui_product_type', $sopdata) ?>"></td>
                    </tr>
                </tbody></table>
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
                    <div class="col-md-12 no-padding">
                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                            <div class="panel-heading">
                                <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                            </div>
                            <div class="panel-body no-padding-top" id="announcement">
                                <h2 class="text-center ">1.  DONOR INFORMATION</h2>
                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 main-table-content">
                        <label class="btn"> Name </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden border-hidden" name="di_name" value="<?php echo $donor->name; ?>">
                        </label>
                    </div>
                    <div class="col-md-6 main-table-content">
                        <label class="btn"> Randomization # </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden border-hidden" name="di_random_no" value="<?php Products::getValue('di_random_no', $sopdata) ?>">
                        </label>
                    </div>
                    <div class="col-md-2 main-table-content">
                        <label class="btn"> Recipient ID </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden border-hidden" name="di_rec_id" value="<?php echo $product->recipient_id; ?>">
                        </label>
                    </div>
                    <div class="col-md-10 main-table-content">
                        <label class="btn"> Hospital ID </label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden" name="di_hospital_id" value="<?php echo $donor->hospital; ?>">
                        </label>
                        <label class="btn"> DOB</label>
                        <label class="btn">
                            <input type="text" class="mrg-hidden" name="" name="di_dob" value="<?php echo $donor->date_of_birth; ?>">
                        </label>
                        <label class="btn"> (refer to donor batch record for complete information)</label>
                    </div>
                </div>
                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="20304_s1_comments" class="form-control rcom"><?php Products::getValue('20304_s1_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>

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
                        <div class="col-md-12 no-padding">
                            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                <div class="panel-heading">
                                    <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                                </div>
                                <div class="panel-body no-padding-top" id="announcement">
                                    <h2 class="text-center ">2. RECIPIENT INFORMATION</h2>
                                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 main-table-content">
                            <label class="btn"> Name </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden border-hidden" name="recinf_name" value="<?php echo $product->recipient_name; ?>">
                            </label>
                        </div>
                        <div class="col-md-6 main-table-content">
                            <label class="btn"> Randomization # </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden border-hidden" name="recinf_random_no" value="<?php Products::getValue('recinf_random_no', $sopdata) ?>">
                            </label>
                        </div>

                        <div class="col-md-2 main-table-content">
                            <label class="btn"> Recipient ID </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="recinfo_rec_id" value="<?php echo $product->recipient_id; ?>">
                            </label>
                        </div>
                        <div class="col-md-10 main-table-content">
                            <label class="btn"> Hospital ID </label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="recinfo_hos_id" value="<?php echo $donor->hospital; ?>">
                            </label>
                            <label class="btn"> DOB</label>
                            <label class="btn">
                                <input type="text" class="mrg-hidden" name="recinfo_dob" value="<?php echo $product->recipient_dob; ?>">
                            </label>
                            <label class="btn">(refer to Request for Infusion and recipient information received from clinical team) </label>
                        </div>
                    </div>

                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="20304_s2_comments" class="form-control rcom"><?php Products::getValue('20304_s2_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12 no-padding">
                            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                <div class="panel-heading">
                                    <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                                </div>
                                <div class="panel-body no-padding-top" id="announcement">
                                    <h2 class="text-center ">3. PRODUCT PROCESS FOR INFUSION</h2>
                                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($productsopflag == 'true') {
                        ?>
                        <div class="row" id="section4">
                            <?php
                        } else {
                            ?>
                            <div class="row">
                                <?php
                            }
                            ?>
                            <div class="col-md-4 main-table-content">
                                <p class="center-space">Process Started Date and Time</p>
                            </div>
                            <div class="col-md-8 main-table-content">
                                <label class="btn"> Date </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden datetimepicker4" name="ppi_date" value="<?php Products::getValue('ppi_date', $sopdata) ?>">
                                </label>
                                <label class="btn"> Time: </label>
                                <label class="btn">
                                    <input type="text" class="mrg-hidden datetimepicker4" name="ppi_time" value="<?php Products::getValue('ppi_time', $sopdata) ?>">
                                </label>
                                <label class="btn">Removed product from (storage location):</label>
                                <div class="col-md-12 both-pad-hidden">
                                    <label class="btn"> LN2 Freezer # : </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_ln2freezer" value="<?php Products::getValue('ppi_ln2freezer', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Total # of bag(s) </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_tnob" value="<?php Products::getValue('ppi_tnob', $sopdata) ?>">
                                    </label>
                                </div>
                                <div class="col-md-12 both-pad-hidden">
                                    <label class="btn"> Section </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_section" value="<?php Products::getValue('ppi_section', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Bag / vial # </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_bagval1" value="<?php Products::getValue('ppi_bagval1', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> of </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_of1" value="<?php Products::getValue('ppi_of1', $sopdata) ?>">
                                    </label>
                                </div>
                                <div class="col-md-12 both-pad-hidden">
                                    <label class="btn"> Column </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_column" value="<?php Products::getValue('ppi_column', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Bag / vial # </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_bagval2" value="<?php Products::getValue('ppi_bagval2', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> of </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_of2" value="<?php Products::getValue('ppi_of2', $sopdata) ?>">
                                    </label>
                                </div>
                                <div class="col-md-12 both-pad-hidden">
                                    <label class="btn"> Slot </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_slot" value="<?php Products::getValue('ppi_slot', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> Bag / vial # </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_bagval3" value="<?php Products::getValue('ppi_bagval3', $sopdata) ?>">
                                    </label>
                                    <label class="btn"> of </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="ppi_of3" value="<?php Products::getValue('ppi_of3', $sopdata) ?>">
                                    </label>
                                </div>
                            </div>

                            <div class="row margin-top">
                                <div class="col-md-4 main-table-content">
                                    <p class="center-space">Process completion</p>
                                </div>
                                <div class="col-md-8 main-table-content">
                                    <div class="col-md-12 both-pad-hidden">
                                        <label class="btn "> Process complete </label>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn"> Date: </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pc_date" value="<?php Products::getValue('pc_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn"> Time: </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pc_time" value="<?php Products::getValue('pc_time', $sopdata) ?>">
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-12 both-pad-hidden">
                                        <label class="btn"> Fresh infusion: </label>
                                        <label class="btn"> Date: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="pc_fi_date" value="<?php Products::getValue('pc_fi_date', $sopdata) ?>">
                                        </label>
                                        <label class="btn"> Time: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="pc_fi_time" value="<?php Products::getValue('pc_fi_time', $sopdata) ?>">
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
                                <textarea rows="6" name="20304_s3_comments" class="form-control rcom"><?php Products::getValue('20304_s3_comments', $sopdata) ?></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12 no-padding">
                                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                    <div class="panel-heading">
                                        <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                                    </div>
                                    <div class="panel-body no-padding-top" id="announcement">
                                        <h2 class="text-center ">4. PRODUCT RELEASED AND TRANSPORT</h2>
                                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($productsopflag == 'true') {
                            ?>
                            <div class="row" id="section5">
                                <?php
                            } else {
                                ?>
                                <div class="row">
                                    <?php
                                }
                                ?>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Prepared for transport by </label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Date: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_date" value="<?php Products::getValue('prt_date', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Transport temperature</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_trans_temp" value="<?php Products::getValue('prt_trans_temp', $sopdata) ?>">
                                        </label>
                                        <label class="btn"> ºC </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Release Date and Time</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Date:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_rdt_date" value="<?php Products::getValue('prt_rdt_date', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Time: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_rdt_time" value="<?php Products::getValue('prt_rdt_time', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Released by</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Initials:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_released_by"  value="<?php Products::getValue('prt_released_by', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Product leave CMP facility</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Date:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_plcmpf_date" value="<?php Products::getValue('prt_plcmpf_date', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Time: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_plcmpf_time" value="<?php Products::getValue('prt_plcmpf_time', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Temperature: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_plcmpf_temp" value="<?php Products::getValue('prt_plcmpf_temp', $sopdata) ?>">
                                        </label>
                                        <label class="btn">ºC </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Transport by (write name of courier <br>
                                            company and/or  personnel if <br>
                                            transport by non CMP staff)</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> CMP staff initials:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_tb_cmpstaff_initials" value="<?php Products::getValue('prt_tb_cmpstaff_initials', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Non CMP staff: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_tb_noncmpstaff_initials" value="<?php Products::getValue('prt_tb_noncmpstaff_initials', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Product arrived for infusion</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Facility:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_pafi_facility" value="<?php Products::getValue('prt_pafi_facility', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Date: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_pafi_date" value="<?php Products::getValue('prt_pafi_date', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Time: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_pafi_time" value="<?php Products::getValue('prt_pafi_time', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Product received by</label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Write full name:</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_prb_rec_by" value="<?php Products::getValue('prt_prb_rec_by', $sopdata) ?>">
                                        </label>

                                        <label class="btn">Date: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_prb_date" value="<?php Products::getValue('prt_prb_date', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Time: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden datetimepicker4" name="prt_prb_time" value="<?php Products::getValue('prt_prb_time', $sopdata) ?>">
                                        </label>
                                    </div>
                                </div>
                                <div class="row margin-top">
                                    <div class="col-md-3 main-table-content">
                                        <label class="btn">Temperature during transport <br>
                                            (print temperature monitoring data and <br>
                                            attach to this form) </label>
                                    </div>
                                    <div class="col-md-9 main-table-content">
                                        <label class="btn"> Temperature Range during Transport</label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden " name="prt_tdt_trdt" value="<?php Products::getValue('prt_tdt_trdt', $sopdata) ?>">
                                        </label>
                                        <label class="btn">Transport duration: </label>
                                        <label class="btn">
                                            <input type="text" class="mrg-hidden" name="prt_tdt_td" value="<?php Products::getValue('prt_tdt_td', $sopdata) ?>">
                                        </label>
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
                                    <textarea rows="6" name="20304_s4_comments" class="form-control rcom"><?php Products::getValue('20304_s4_comments', $sopdata) ?></textarea>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-12 no-padding">
                                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                        <div class="panel-heading">
                                            <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                                        </div>
                                        <div class="panel-body no-padding-top" id="announcement">
                                            <h2 class="text-center ">5. PRODUCT FINAL DISPOSITION</h2>
                                            <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($productsopflag == 'true') {
                                ?>
                                <div class="row" id="section6">
                                    <?php
                                } else {
                                    ?>
                                    <div class="row">
                                        <?php
                                    }
                                    ?>

                                    <div class="row margin-top">
                                        <div class="col-md-12 main-table-content">
                                            <label class="btn"> Infusion Date:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pfd_inf_date" value="<?php Products::getValue('pfd_inf_date', $sopdata) ?>">
                                            </label>
                                            <label class="btn"> Dose:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden " name="pfd_inf_dose" value="<?php Products::getValue('pfd_inf_dose', $sopdata) ?>">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row margin-top">
                                        <div class="col-md-12 main-table-content">
                                            <label class="btn"> Start time:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pfd_inf_start_time" value="<?php Products::getValue('pfd_inf_start_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn"> End time:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pfd_inf_end_time" value="<?php Products::getValue('pfd_inf_end_time', $sopdata) ?>">
                                            </label>
                                            <label class="btn"> (request information from infusion coordinator)</label>
                                        </div>
                                    </div>
                                    <div class="row margin-top">
                                        <div class="col-md-12 main-table-content">
                                            <label class="btn"> Comment:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="pfd_inf_comments" value="<?php Products::getValue('pfd_inf_comments', $sopdata) ?>">
                                            </label>
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
                                        <textarea rows="6" name="20304_s5_comments" class="form-control rcom"><?php Products::getValue('20304_s5_comments', $sopdata) ?></textarea>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if (Yii::$app->user->can('reviewer')) {
                                    ?>

                                    <div class="row margin-top">
                                        <div class="col-md-12 main-table-content">
                                            <label class="btn"> Reviewed by:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden " name="20304_review_by" id="reviewed_by" value="<?php Products::getValue('20304_review_by', $sopdata) ?>">
                                            </label>
                                            <label class="btn"> Date:</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden datetimepicker4" name="20304_date" value="<?php Products::getValue('20304_date', $sopdata) ?>">
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>


                                <div class="row">
                                    <div class="col-md-12 no-padding">
                                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                            <div class="panel-heading">
                                                <div class="tools pull-right"> <a aria-hidden="true" data-dismiss="panel" class="close-panel" href="#"><i class="icon-remove text-transparent"></i></a> </div>
                                            </div>
                                            <div class="panel-body no-padding-top" id="announcement">
                                                <h2 class="text-center ">6. PRODUCT FINAL DISPOSITION (continue)</h2>
                                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($productsopflag == 'true') {
                                    ?>
                                    <div class="row" id="section7">
                                        <?php
                                    } else {
                                        ?>
                                        <div class="row">
                                            <?php
                                        }
                                        ?>
                                        <div class="row margin-top">
                                            <div class="col-md-12 main-table-content text-center">
                                                <h2>DISCARD</h2>
                                                <p>(if applicable follow instruction on SOP CMP 2.011)</p>
                                            </div>
                                        </div>
                                        <div class="row margin-top">
                                            <div class="col-md-12 main-table-content">
                                                <label class="btn"> Reason:</label>
                                                <label class="btn">
                                                    <input type="text" class="mrg-hidden " name="pfd_reason" value="<?php Products::getValue('pfd_reason', $sopdata) ?>">
                                                </label>
                                                <label class="btn"> Comments:</label>
                                                <label class="btn">
                                                    <input type="text" class="mrg-hidden " name="pfd_comments" value="<?php Products::getValue('pfd_comments', $sopdata) ?>">
                                                </label>
                                                <label class="btn"> Product discard form completed and approved (attach a copy): :</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (Yii::$app->user->can('reviewer')) {
                                        ?>
                                        <div class="row margin-top">
                                            <div class="col-md-12 main-table-content">
                                                <label class="btn"> Reviewed by:</label>
                                                <label class="btn">
                                                    <input type="text" class="mrg-hidden " name="pfd_reviewed_by" value="<?php Products::getValue('pfd_reviewed_by', $sopdata) ?>">
                                                </label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                        ?>
                                        <div class="row">
                                            <h3>Comments</h3>
                                        </div>
                                        <div class="row">
                                            <textarea rows="6" name="20304_s6_comments" class="form-control rcom"><?php Products::getValue('20304_s6_comments', $sopdata) ?></textarea>
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
