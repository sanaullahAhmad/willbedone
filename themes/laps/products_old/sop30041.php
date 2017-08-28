<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
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
        <h1 class="text-center ">Endotoxin Lot Release Worksheet </h1>
        <div class="col-xs-12 col-md-12 ">
            <div class="informations-box text-center">
                <label class="btn ">
                    <h3> Product ID #: </h3>
                </label>
                <label class="btn">
                    <div class="col-md-12">
                        <input type="text" class=" mrg-hidden" value="<?php echo $product->MSCID; ?>" disabled="disabled">
                    </div>
                </label>
                <label class="btn ">
                    <h3> Product Type: </h3>
                </label>
                <label class="btn">
                    <div class="col-md-12">
                        <input type="text" class=" mrg-hidden">
                    </div>
                </label>
            </div>
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
                <table width="100%" border="1" class="processing-table">
                    <tbody><tr>
                            <td><p class="col-md-12">Cell feeding 5, P0 </p></td>
                            <td><label class="btn "> Date: </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input type="text" class=" mrg-hidden datetimepicker4" name="elrw_cell_feeding_p0" value="<?php Products::getValue('elrw_cell_feeding_p0', $sopdata) ?>">
                                    </div>
                                </label></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Total Product Volume to be Infused:</p></td>
                            <td><p class="col-md-12 text-right"> ml <input type="text" class=" mrg-hidden border-hidden" name="elrw_tpvi" value="<?php Products::getValue('elrw_tpvi', $sopdata) ?>"> </p></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Recipient Initials: </p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class=" mrg-hidden border-hidden" name="elrw_rec_initials" value="<?php Products::getValue('elrw_rec_initials', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Recipient Hospital #: </p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class=" mrg-hidden border-hidden" name="elrw_hospital_no" value="<?php Products::getValue('elrw_hospital_no', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Recipient body weight (kg):</p></td>
                            <td><p class="col-md-12 text-right"> kg <input type="text" class=" mrg-hidden border-hidden" name="elrw_rec_bw" value="<?php Products::getValue('elrw_rec_bw', $sopdata) ?>"> </p></td>
                        </tr>
                        <tr>
                            <td><label class="btn "> Equipment #: </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input type="text" class=" mrg-hidden " name="elrw_rec_exuip_no" value="<?php Products::getValue('elrw_rec_exuip_no', $sopdata) ?>">
                                    </div>
                                </label>
                                <label class="btn "> Location: </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input type="text" class=" mrg-hidden " name="elrw_location" value="<?php Products::getValue('elrw_location', $sopdata) ?>">
                                    </div>
                                </label>
                                <label class="btn "> Serial Number: </label>
                                <label class="btn">
                                    <div class="col-md-12">
                                        <input type="text" class=" mrg-hidden " name="elrw_serial_no" value="<?php Products::getValue('elrw_serial_no', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><div class="col-md-12">
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_eqip_cptu" <?php
                                        if ((Products::getCheckValue('elrw_eqip_cptu', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        Equipment cleaned prior to use </label>
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_eqip_cpu" <?php
                                        if ((Products::getCheckValue('elrw_eqip_cpu', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        Equipment cleaned post use </label>
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Endosafe - PTS Result</p></td>
                            <td><p class="col-md-12 text-right"> EU/ml <input type="text" class=" mrg-hidden border-hidden" name="elrw_endosafe_pts_res" value="<?php Products::getValue('elrw_endosafe_pts_res', $sopdata) ?>"> </p></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Total Endotoxin Formula:</p></td>
                            <td><p class="col-md-12 text-center"> Endotoxin value (EU/ml) X Total volume of final productto be infused(ml)=
                                    Kg recipient body weight </p></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Total Endotoxin Calculation (EU/kg):</p></td>
                            <td><div class="col-md-12 both-pad-hidden">
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden  xs-input" name="elrw_tec1" value="<?php Products::getValue('elrw_tec1', $sopdata) ?>">
                                    </label>
                                    <label class="btn">EU/ml X </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden  xs-input" name="elrw_tec2" value="<?php Products::getValue('elrw_tec2', $sopdata) ?>">
                                    </label>
                                    <label class="btn">= </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden  xs-input" name="elrw_tec3" value="<?php Products::getValue('elrw_tec3', $sopdata) ?>">
                                    </label>
                                    <label class="btn">ml / </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden  xs-input" name="elrw_tec4" value="<?php Products::getValue('elrw_tec4', $sopdata) ?>">
                                    </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="elrw_tec5" value="<?php Products::getValue('elrw_tec5', $sopdata) ?>">
                                    </label>
                                    <label class="btn">kg= </label>
                                    <label class="btn">
                                        <input type="text" class="mrg-hidden" name="elrw_tec6" value="<?php Products::getValue('elrw_tec6', $sopdata) ?>">
                                    </label>
                                    <label class="btn">volume </label>
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Endotoxin Level Acceptable for Recipient (select one)?</p></td>
                            <td><div class="col-md-12">
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_elar_yes" <?php
                                        if ((Products::getCheckValue('elrw_elar_yes', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>Yes </b> (5 EU/ml of final prep volume/kg recipient body weight </label>
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_elar_no" <?php
                                        if ((Products::getCheckValue('elrw_elar_no', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>No </b> (&gt; 5 EU/ml of final prep volume/kg recipient body weight) </label>
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Endotoxin Level Acceptable for Schwann CellRecipient (select one)?</p></td>
                            <td><div class="col-md-12">
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_elas_yes" <?php
                                        if ((Products::getCheckValue('elrw_elas_yes', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>Yes </b> ( 0.2  EU/ml of final prep volume/kg recipient body weight </label>
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_elas_no" <?php
                                        if ((Products::getCheckValue('elrw_elas_no', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>No </b> (&gt; 0.2  EU/ml of final prep volume/kg recipient body weight) </label>
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">OK to Release Product?</p></td>
                            <td><div class="col-md-12">
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_orp_yes" <?php
                                        if ((Products::getCheckValue('elrw_orp_yes', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>Yes </b> </label>
                                    <label class="btn both-pad-hidden">
                                        <input type="checkbox" class="checkbox-inline" name="elrw_orp_no" <?php
                                        if ((Products::getCheckValue('elrw_orp_no', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>
                                        <b>No </b> </label>
                                </div></td>
                        </tr>
                        <tr>
                            <td><p class="col-md-12">Comments:</p></td>
                            <td><div class="col-md-12">
                                    <input type="text" class=" mrg-hidden border-hidden" name="elrw_comments" value="<?php Products::getValue('elrw_comments', $sopdata) ?>">
                                </div></td>
                        </tr>
                    </tbody></table>
            </div>



            <div class="col-md-12">
                <div class="informations-box text-center">
                    <label class="btn ">
                        <h2> TEST REPORT PRINOUT </h2>
                        <img src="img/Untitled.png">
                    </label>
                </div>
            </div>


            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="30041_s1_comments" class="form-control rcom"><?php Products::getValue('30041_s1_comments', $sopdata) ?></textarea>
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
                            <input type="text" class="mrg-hidden " name="30041_review_by" id="reviewed_by" value="<?php Products::getValue('30041_review_by', $sopdata) ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group btn-group-lg">
                        <label class="btn"> Date: </label>
                        <label class="btn col-md">
                            <input type="text" class=" mrg-hidden datetimepicker4" name="30041_date" value="<?php Products::getValue('30041_date', $sopdata) ?>">
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
