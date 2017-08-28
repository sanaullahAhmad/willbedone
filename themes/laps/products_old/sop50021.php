<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.002 I';
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
        <h1 class="text-center ">CRYOPRESERVATION WORKSHEET</h1>
        <h2 class="text-center text-primary">Attachment I: Cryopreservation Worksheet</h2>
        <br>
        <div class="col-xs-12 col-md-12 ">
            <div class="informations-box">
                <h3> Processing team: </h3>
            </div>
        </div>

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
                    <tbody><tr class="processing-table-background">
                            <th><h4 class="mailn-processing-hadding">Printed Name</h4></th>
                            <th><h4 class="mailn-processing-hadding">Date</h4></th>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input value="<?php Products::getValue('pt_printed_name1', $sopdata) ?>" class="detail-content-form border-hidden" name="pt_printed_name1" type="text">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input value="<?php Products::getValue('pt_date1', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date1" type="text">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input value="<?php Products::getValue('pt_printed_name2', $sopdata) ?>" class="detail-content-form border-hidden" name="pt_printed_name2" type="text">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input value="<?php Products::getValue('pt_date2', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date2" type="text">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input value="<?php Products::getValue('pt_printed_name3', $sopdata) ?>" class="detail-content-form border-hidden" name="pt_printed_name3" type="text">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input value="<?php Products::getValue('pt_date3', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date3" type="text">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input value="<?php Products::getValue('pt_printed_name4', $sopdata) ?>" class="detail-content-form border-hidden" name="pt_printed_name4" type="text">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input value="<?php Products::getValue('pt_date4', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date4" type="text">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input value="<?php Products::getValue('pt_printed_name5', $sopdata) ?>" class="detail-content-form border-hidden" name="pt_printed_name5" type="text">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input value="<?php Products::getValue('pt_date5', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date5" type="text">
                                </div></td>
                        </tr>
                    </tbody></table>
            </div>
            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="50021s1_comments" class="form-control rcom"><?php Products::getValue('50021s1_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>
            <div class="col-xs-12 col-md-12 ">
                <div class="informations-box">
                    <h3> I.	STUDY INFORMATION </h3>
                    <table border="1" width="100%">
                        <tbody>
                            <tr>

                            </tr>
                            <tr>
                                <td>PRODUCT ID: <?php echo $product->MSCID; ?></td>
                            </tr>
                            <tr>
                                <td>DONOR STUDY: <?php echo $donor->study_number; ?></td>
                            </tr>
                            <tr>
                                <td>IND#: <?php echo $product->ind_no; ?></td>
                            </tr>
                            <tr>
                                <td>IRB#: <?php echo $product->irb_no; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="informations-box">
                    <h3> II.	REAGENTS, SUPPLIES, AND EQUIPMENT</h3>
                </div>
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
                        <table class="processing-table" border="1" width="100%">
                            <tbody><tr>
                                    <th style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5" width="18%"> <h4 class="mailn-processing-hadding">MEDIA AND REAGENTS</h4>
                                    </th>
                                </tr>
                                <tr class="processing-table-background">
                                    <th><h4 class="mailn-processing-hadding"> Name</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Plasma-Lyte</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_pl_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_pl_manf" type="text">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_pl_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_pl_lotno" type="text">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input value="<?php Products::getValue('rsp_pl_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_pl_exp_date" type="text">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">25% HSA</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_hsa_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_hsa_manf" type="text">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_hsa_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_hsa_lotno" type="text">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input value="<?php Products::getValue('rsp_hsa_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_hsa_exp_date" type="text">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Hespan 6%</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_hes_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_hes_manf" type="text">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_hes_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_hes_lotno" type="text">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input value="<?php Products::getValue('rsp_hes_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_hes_exp_date" type="text">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">DMSO</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_dmso_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_dmso_manf" type="text">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input value="<?php Products::getValue('rsp_dmso_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_dmso_lotno" type="text">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input value="<?php Products::getValue('rsp_dmso_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_dmso_exp_date" type="text">
                                        </div></td>

                                </tr>
                            </tbody></table>
                    </div>
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="50021s2_comments" class="form-control rcom"><?php Products::getValue('50021s2_comments', $sopdata) ?></textarea>
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
                            <table class="processing-table" border="1" width="100%">
                                <tbody><tr>
                                        <th style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5" width="18%"> <h4 class="mailn-processing-hadding">SUPPLIES</h4>
                                        </th>
                                    </tr>
                                    <tr class="processing-table-background">
                                        <th><h4 class="mailn-processing-hadding"> Name</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                                        <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Aspirating pipette</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_asp_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_asp_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_asp_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_asp_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_asp_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_asp_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">5 ml pipette</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_5mlp_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_5mlp_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_5mlp_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_5mlp_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_5mlp_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_5mlp_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">10 ml pipette</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_10mlp_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_10mlp_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_10mlp_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_10mlp_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_10mlp_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_10mlp_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">25 ml pipette</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_25mlp_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_25mlp_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_25mlp_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_25mlp_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_25mlp_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_25mlp_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">50 ml pipette</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_50mlp_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_50mlp_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_50mlp_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_50mlp_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_50mlp_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_50mlp_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Sterile tubing set</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_sts_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_sts_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_sts_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_sts_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_sts_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_sts_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Conical tubes 50 ml</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_ct50_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_ct50_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_ct50_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_ct50_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_ct50_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_ct50_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Square bottles</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_sq_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_sq_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_sq_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_sq_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_sq_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_sq_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Cryovials</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cry_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cry_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cry_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cry_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_cry_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_cry_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Cryo bags</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cryo_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cryo_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cryo_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cryo_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_cryo_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_cryo_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">60ml syringe</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_60mls_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_60mls_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_60mls_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_60mls_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_60mls_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_60mls_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">20ml syringe</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_20mls_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_20mls_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_20mls_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_20mls_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_20mls_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_20mls_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                    <tr>
                                        <td height="45"><p class="col-md-12">Cell Strainer</p></td>
                                        <td height="45"><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cells_manf', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cells_manf" type="text">
                                            </div></td>
                                        <td><div class="col-md-12">
                                                <input value="<?php Products::getValue('rsp_cells_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="rsp_cells_lotno" type="text">
                                            </div></td>
                                        <td><div class="col-md-12 text-center">
                                                <input value="<?php Products::getValue('rsp_cells_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="rsp_cells_exp_date" type="text">
                                            </div></td>

                                    </tr>
                                </tbody></table>
                        </div>
                        <?php
                        if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                            ?>
                            <div class="row">
                                <h3>Comments</h3>
                            </div>
                            <div class="row">
                                <textarea rows="6" name="50021s3_comments" class="form-control rcom"><?php Products::getValue('50021s3_comments', $sopdata) ?></textarea>
                            </div>
                            <?php
                        }
                        ?>
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
                                <table class="processing-table" border="1" width="100%">
                                    <tbody><tr>
                                            <th style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5" width="18%"> <h4 class="mailn-processing-hadding">EQUIPMENT</h4>
                                            </th>
                                        </tr>
                                        <tr class="processing-table-background">
                                            <th><h4 class="mailn-processing-hadding"> Name</h4></th>
                                            <th><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                                            <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                                            <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Biosafety Cabinet</p></td>
                                            <td height="45"><p class="col-md-12">Nuaire</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_biocab_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_biocab_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_biocab_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_biocab_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Centrifuge</p></td>
                                            <td height="45"><p class="col-md-12">Thermo Scientific</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_centh_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_centh_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_centh_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_centh_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Microscope</p></td>
                                            <td height="45"><p class="col-md-12">Olympus</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_micoly_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_micoly_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_micoly_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_micoly_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Water bath</p></td>
                                            <td height="45"><p class="col-md-12">VWR</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_watvwr_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_watvwr_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_watvwr_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_watvwr_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Pipette aid</p></td>
                                            <td height="45"><p class="col-md-12">Drummond</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_paid_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_paid_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_paid_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_paid_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Micropipette</p></td>
                                            <td height="45"><p class="col-md-12">Gilson</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_micgil_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_micgil_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_micgil_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_micgil_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Hemocytometer</p></td>
                                            <td height="45"><p class="col-md-12">Reichert</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_hemrei_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_hemrei_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_hemrei_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_hemrei_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Controlled Rate Freezer</p></td>
                                            <td height="45"><p class="col-md-12">Planer PLC</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_crfplc_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_crfplc_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_crfplc_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_crfplc_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Vapor Phase LN2 Storage Dewar</p></td>
                                            <td height="45"><p class="col-md-12">Chart</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_vpsldc_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_vpsldc_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_vpsldc_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_vpsldc_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Heat Sealer</p></td>
                                            <td height="45"><p class="col-md-12">Omnisealer</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_hso_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_hso_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_hso_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_hso_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                        <tr>
                                            <td height="45"><p class="col-md-12">Vacuum pump</p></td>
                                            <td height="45"><p class="col-md-12">Gast</p></td>
                                            <td><div class="col-md-12">
                                                    <input value="<?php Products::getValue('equ_vpg_lotno', $sopdata) ?>" class="detail-content-form border-hidden" name="equ_vpg_lotno" type="text">
                                                </div></td>
                                            <td><div class="col-md-12 text-center">
                                                    <input value="<?php Products::getValue('equ_vpg_exp_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4 border-hidden" name="equ_vpg_exp_date" type="text">
                                                </div></td>

                                        </tr>
                                    </tbody></table>
                            </div>
                            <?php
                            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                ?>
                                <div class="row">
                                    <h3>Comments</h3>
                                </div>
                                <div class="row">
                                    <textarea rows="6" name="50021s4_comments" class="form-control rcom"><?php Products::getValue('50021s4_comments', $sopdata) ?></textarea>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="informations-box">
                                <h3> III. PROCESSING </h3>
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
                                    <table class="processing-table" border="1" width="100%">
                                        <tbody><tr class="processing-table-background">
                                                <th width="23%"><h4 class="mailn-processing-hadding">PROCESS</h4></th>
                                                <th width="45%"><h4 class="mailn-processing-hadding">ACTIVITY</h4></th>
                                                <th width="17%"><h4 class="mailn-processing-hadding">PERFORMED</h4></th>
                                            </tr>
                                            <tr>
                                                <td rowspan="6" height="100"><p class="col-md-12">Cryopreservation</p></td>
                                                <td><div class="col-md-12">
                                                        <label class="btn "> BSC prepared for processing: </label>
                                                        <label class="btn both-pad-hidden">
                                                            <input <?php
                                                            if ((Products::getCheckValue('rsp_pro_bscprep_check', $sopdata)) == "on") {
                                                                echo 'checked="checked" ';
                                                            }
                                                            ?> class="checkbox-inline" name="rsp_pro_bscprep_check" type="checkbox">
                                                            yes </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="btn "> BSC Air Flow </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_bscaflow', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_bscaflow" type="text">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <p class="col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf1"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><div class="col-md-12">
                                                        <label class="btn "> Laboratory utilized </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_labutil', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_labutil" type="text">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input <?php
                                                        if ((Products::getCheckValue('rsp_pro_vsp_check', $sopdata)) == "on") {
                                                            echo 'checked="checked" ';
                                                        }
                                                        ?> class="checkbox-inline " name="rsp_pro_vsp_check" type="checkbox">
                                                        Verify sanitization performed

                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="btn "> Start  date and time: </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_stdt', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_stdt" type="text">
                                                            </div>
                                                        </label>
                                                    </div></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf2"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><label class="btn ">
                                                        <p class="both-pad-hidden">Cell count from Enrichment of MNC (SOP CMP 7.002 </p>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <label class="btn "> Attachment I): </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_cellcount', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_cellcount" type="text">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="btn "> Viability of MNC enriched product: </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_vmnc', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_vmnc" type="text">
                                                            </div>
                                                        </label>
                                                    </div></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><p class="both-pad-hidden">Divide and distribute cells  equally into 10 flasks</p></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf4"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><p class="col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                                    <div class="col-md-12">
                                                        <label class="btn ">Volume of media added to each flask </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_vmaef', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_vmaef" type="text">
                                                            </div>
                                                        </label>
                                                    </div></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf5"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><div class="col-md-12">
                                                        <label class="btn ">CO<sub>o</sub> Incubator used: </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('rsp_pro_incused', $sopdata) ?>" class=" mrg-hidden " name="rsp_pro_incused" type="text">
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="btn ">End process date and time: </label>
                                                        <label class="btn">
                                                            <div class="col-md-12">
                                                                <input value="<?php Products::getValue('endt', $sopdata) ?>" class=" mrg-hidden " name="endt" type="text">
                                                            </div>
                                                        </label>
                                                    </div></td>
                                                <td><textarea class="detail-content-form border-hidden" name="rsp_pro_perf6"></textarea></td>
                                            </tr>
                                        </tbody></table>
                                </div>
                                <?php
                                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                    ?>
                                    <div class="row">
                                        <h3>Comments</h3>
                                    </div>
                                    <div class="row">
                                        <textarea rows="6" name="50021s5_comments" class="form-control rcom"><?php Products::getValue('50021s5_comments', $sopdata) ?></textarea>
                                    </div>
                                    <?php
                                }
                                ?>


                                <?php
                                if ($productsopflag == 'true') {
                                    ?>
                                    <div class="remove-form-table" id="section6">
                                        <?php
                                    } else {
                                        ?>
                                        <div class="remove-form-table">
                                            <?php
                                        }
                                        ?>
                                        <table border="1" width="100%">
                                            <tbody><tr class="processing-table-background">
                                                    <th><h4 class="mailn-processing-hadding">A/A</h4></th>
                                                    <th><h4 class="mailn-processing-hadding">Bag ID/number</h4></th>
                                                    <th><h4 class="mailn-processing-hadding"># of cells</h4></th>
                                                    <th><h4 class="mailn-processing-hadding">Position</h4></th>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>1</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id1', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id1" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells1', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells1" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position1', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position1" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>2</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id2', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id2" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells2', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells2" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position2', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position2" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>3</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id3', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id3" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells3', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells3" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position3', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position3" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>4</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id4', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id4" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells4', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells4" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position4', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position4" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>5</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id5', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id5" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells5', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells5" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position5', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position5" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>6</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id6', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id6" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells6', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells6" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position6', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position6" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>7</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id7', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id7" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells7', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells7" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position7', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position7" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>8</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id8', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id8" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells8', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells8" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position8', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position8" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>9</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id9', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id9" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells9', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells9" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position9', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position9" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>10</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id10', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id10" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells10', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells10" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position10', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position10" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>11</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id11', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id11" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells11', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells11" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position11', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position11" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>12</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id12', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id12" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells12', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells12" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position12', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position12" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>13</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id13', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id13" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells13', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells13" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position13', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position13" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>14</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id14', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id14" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells14', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells14" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position14', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position14" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>15</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id15', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id15" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells15', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells15" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position15', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position15" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>16</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id16', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id16" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells16', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells16" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position16', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position16" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>17</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id17', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id17" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells17', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells17" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position17', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position17" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>18</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id18', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id18" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells18', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells18" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position18', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position18" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>19</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id19', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id19" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells19', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells19" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position19', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position19" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td class="heightlight-bc"><p class="col-md-12"><b>20</b></p></td>
                                                    <td class="heightlight-bc"> <input value="<?php Products::getValue('bag_id20', $sopdata) ?>" class=" mrg-hidden border-hidden" name="bag_id20" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('nocells20', $sopdata) ?>" class=" mrg-hidden border-hidden" name="nocells20" type="text"></td>
                                                    <td> <input value="<?php Products::getValue('position20', $sopdata) ?>" class=" mrg-hidden border-hidden" name="position20" type="text"></td>
                                                </tr>

                                            </tbody></table>
                                        <div class="col-md-12">
                                            <div class="input-group btn-group-lg">
                                                <label class="btn"> Procedure completed</label>
                                                <label class="btn col-md">
                                                    <input value="<?php Products::getValue('50021_procedure_completed', $sopdata) ?>" class="mrg-hidden " name="50021_procedure_completed" type="text">
                                                </label>
                                            </div>
                                        </div>

                                        <?php
                                        if (Yii::$app->user->can('reviewer')) {
                                            ?>
                                            <div class="col-md-6">
                                                <div class="input-group btn-group-lg">
                                                    <label class="btn"> Review by: </label>
                                                    <label class="btn col-md">
                                                        <input value="<?php Products::getValue('50021_reviewby', $sopdata) ?>" class="mrg-hidden " name="50021_reviewby" type="text" id="reviewed_by">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group btn-group-lg">
                                                    <label class="btn"> Date: </label>
                                                    <label class="btn col-md">
                                                        <input value="<?php Products::getValue('50021_date', $sopdata) ?>" class=" mrg-hidden datetimepicker4" name="50021_date" type="text">
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
                                        <textarea rows="6" name="50021s6_comments" class="form-control rcom"><?php Products::getValue('50021s6_comments', $sopdata) ?></textarea>
                                    </div>
                                    <?php
                                }
                                ?>

                                <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">
                                <div class="clearfix"></div>
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
                            </div>
