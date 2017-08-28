<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

$this->title = 'SOP CMP 7.002 I';
/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
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
        <h1 class="text-center ">
            ENRICHMENT OF MNC WORKSHEET
        </h1>

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
                    <tbody>
                        <tr class="processing-table-background">
                            <th>
                                <h4 class="mailn-processing-hadding">Printed Name</h4>
                            </th>
                            <th>
                                <h4 class="mailn-processing-hadding">Date</h4>
                            </th>
                        </tr>
                        <tr>
                            <td height="45">
                                <div class="col-md-12">
                                    <input class="detail-content-form border-hidden" type="text" name="pt_pnam1" value="<?php Products::getValue('pt_pnam1', $sopdata) ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="pt_date1" value="<?php Products::getValue('pt_date1', $sopdata) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="45">
                                <div class="col-md-12">
                                    <input class="detail-content-form border-hidden" type="text" name="pt_pnam2" value="<?php Products::getValue('pt_pnam2', $sopdata) ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="pt_date2" value="<?php Products::getValue('pt_date2', $sopdata) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="45">
                                <div class="col-md-12">
                                    <input class="detail-content-form border-hidden" type="text" name="pt_pnam3" value="<?php Products::getValue('pt_pnam3', $sopdata) ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="pt_date3" value="<?php Products::getValue('pt_date3', $sopdata) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="45">
                                <div class="col-md-12">
                                    <input class="detail-content-form border-hidden" type="text" name="pt_pnam4" value="<?php Products::getValue('pt_pnam4', $sopdata) ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="pt_date4" value="<?php Products::getValue('pt_date4', $sopdata) ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="45">
                                <div class="col-md-12">
                                    <input class="detail-content-form border-hidden" type="text" name="pt_pnam5" value="<?php Products::getValue('pt_pnam5', $sopdata) ?>">
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 text-center">
                                    <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="pt_date5" value="<?php Products::getValue('pt_date5', $sopdata) ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="pt_comments" class="form-control rcom"><?php Products::getValue('pt_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>

            <?php
            if ($productsopflag == 'true') {
                ?>
                <div class="col-xs-12 col-md-12" id="section2">
                    <?php
                } else {
                    ?>
                    <div class="col-xs-12 col-md-12">
                        <?php
                    }
                    ?>
                    <div class="informations-box">
                        <h3> I.	STUDY INFORMATION </h3>
                        <table border="1" width="100%">
                            <tbody>
                                <tr>
                                    <td>PRODUCT ID: <b><?php echo $product->MSCID; ?></b></td>
                                </tr>
                                <tr>
                                    <td>DONOR STUDY: <b><?php echo $donor->study_number; ?></b></td>
                                </tr>
                                <tr>
                                    <td>IND#: <b><input class=" mrg-hidden border-hidden" type="text" name="si_ind_no" value="<?php Products::getValue('si_ind_no', $sopdata) ?>"></b></td>
                                </tr>
                                <tr>
                                    <td>IRB#: <b><input class=" mrg-hidden border-hidden" type="text" name="si_irb_no" value="<?php Products::getValue('si_irb_no', $sopdata) ?>"></b></td>
                                </tr>

                                <tr>
                                    <td><p>INSTITUTION RESPONSIBLE FOR COLLECTION:</p> <p>PRODUCT TYPE:</p>
                                        <label class="btn both-pad-hidden">
                                            <input class="checkbox-inline" type="checkbox" name="si_aspirate_check" <?php
                                            if ((Products::getCheckValue('si_aspirate_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Aspirate
                                        </label>
                                        <label class="btn both-pad-hidden">
                                            <input class="checkbox-inline" type="checkbox" name="si_others_check" <?php
                                            if ((Products::getCheckValue('si_others_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Other
                                        </label>
                                        <label class="btn both-pad-hidden">
                                            <input class="detail-content-form" type="text" name="si_others_comment" value="<?php Products::getValue('si_others_comment', $sopdata) ?>">
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="si_comments" class="form-control rcom"><?php Products::getValue('si_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($productsopflag == 'true') {
                    ?>
                    <div class="col-md-12" id="section3">
                        <?php
                    } else {
                        ?>
                        <div class="col-md-12">
                            <?php
                        }
                        ?>
                        <div class="informations-box">
                            <h3> II.	REAGENTS, SUPPLIES, AND EQUIPMENT</h3>
                        </div>
                        <table class="processing-table" border="1" width="100%">
                            <tbody><tr>
                                    <th colspan="5" style="background:#666; color:#fff; padding-bottom: 22px;" width="18%"> <h4 class="mailn-processing-hadding">MEDIA AND REAGENTS</h4>
                                    </th>
                                </tr>
                                <tr class="processing-table-background">
                                    <th><h4 class="mailn-processing-hadding"> Name</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Manufacturer</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Lot #</h4></th>
                                    <th><h4 class="mailn-processing-hadding">Expiration date</h4></th>
                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Lymphocyte Separate Media</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_lsm_manufacturer" value="<?php Products::getValue('rse_lsm_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_lsm_lot_no" value="<?php Products::getValue('rse_lsm_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="rse_lsm_expiration_date" value="<?php Products::getValue('rse_lsm_expiration_date', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Human Serum Albumin</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_hsa_manufacturer" value="<?php Products::getValue('rse_hsa_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_hsa_lot_no" value="<?php Products::getValue('rse_hsa_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="rse_hsa_expiration_date" value="<?php Products::getValue('rse_hsa_expiration_date', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Plasma-Lyte A</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_pl_manufacturer" value="<?php Products::getValue('rse_pl_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_pl_lot_no" value="<?php Products::getValue('rse_pl_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="rse_pl_expiration_date" value="<?php Products::getValue('rse_pl_expiration_date', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td height="45">
                                        <p class="col-md-12">Crystal Violet</p>
                                    </td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_cv_manufacturer" value="<?php Products::getValue('rse_cv_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_cv_lot_no" value="<?php Products::getValue('rse_cv_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="rse_cv_expiration_date" value="<?php Products::getValue('rse_cv_expiration_date', $sopdata) ?>">
                                        </div></td>
                                </tr>
                                <tr>
                                    <td height="45">
                                        <p class="col-md-12">Heparin</p>
                                    </td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_h_manufacturer" value="<?php Products::getValue('rse_h_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="rse_h_lot_no" value="<?php Products::getValue('rse_h_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="rse_h_expiration_date" value="<?php Products::getValue('rse_h_expiration_date', $sopdata) ?>">
                                        </div></td>
                                </tr>
                            </tbody></table>
                        <table class="processing-table" border="1" width="100%">
                            <tbody><tr>
                                    <th colspan="5" style="background:#666; color:#fff; padding-bottom: 22px;" width="18%"> <h4 class="mailn-processing-hadding">SUPPLIES</h4>
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
                                            <input class="detail-content-form border-hidden" type="text" name="sup_ap_manufacturer" value="<?php Products::getValue('sup_ap_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_ap_manufacturer" value="<?php Products::getValue('sup_ap_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_ap_expiration_date" value="<?php Products::getValue('sup_ap_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">5 ml pipette</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_5mlp_manufacturer" value="<?php Products::getValue('sup_5mlp_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_5mlp_lot_no" value="<?php Products::getValue('sup_5mlp_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_5mlp_expiration_date" value="<?php Products::getValue('sup_5mlp_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">10 ml pipette</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_10mlp_manufacturer" value="<?php Products::getValue('sup_10mlp_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_10mlp_lot_no" value="<?php Products::getValue('sup_10mlp_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_10mlp_expiration_date" value="<?php Products::getValue('sup_10mlp_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">25 ml pipette</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_25mlp_manufacturer" value="<?php Products::getValue('sup_25mlp_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_25mlp_lot_no" value="<?php Products::getValue('sup_25mlp_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_25mlp_expiration_date" value="<?php Products::getValue('sup_25mlp_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">50 ml pipette</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_50mlp_manufacturer" value="<?php Products::getValue('sup_50mlp_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_50mlp_lot_no" value="<?php Products::getValue('sup_50mlp_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_50mlp_expiration_date" value="<?php Products::getValue('sup_50mlp_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Sterile tubing set</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_sts_manufacturer" value="<?php Products::getValue('sup_sts_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_sts_lot_no" value="<?php Products::getValue('sup_sts_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_sts_expiration_date" value="<?php Products::getValue('sup_sts_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Conical tubes 50 ml</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_ct_manufacturer" value="<?php Products::getValue('sup_ct_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_ct_lot_no" value="<?php Products::getValue('sup_ct_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_ct_expiration_date" value="<?php Products::getValue('sup_ct_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Square bottles</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_sb_manufacturer" value="<?php Products::getValue('sup_sb_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_sb_lot_no" value="<?php Products::getValue('sup_sb_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_sb_expiration_date" value="<?php Products::getValue('sup_sb_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Cryovials</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cryovials_manufacturer" value="<?php Products::getValue('sup_cryovials_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cryovials_lot_no" value="<?php Products::getValue('sup_cryovials_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_cryovials_expiration_date" value="<?php Products::getValue('sup_cryovials_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Cryobags</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cryobags_manufacturer" value="<?php Products::getValue('sup_cryobags_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cryobags_lot_no" value="<?php Products::getValue('sup_cryobags_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_cryobags_expiration_date" value="<?php Products::getValue('sup_cryobags_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">60ml syringe</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_60mls_manufacturer" value="<?php Products::getValue('sup_60mls_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_60mls_lot_no" value="<?php Products::getValue('sup_60mls_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_60mls_expiration_date" value="<?php Products::getValue('sup_60mls_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">20ml syringe</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_20mls_manufacturer" value="<?php Products::getValue('sup_20mls_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_20mls_lot_no" value="<?php Products::getValue('sup_20mls_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_20mls_expiration_date" value="<?php Products::getValue('sup_20mls_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Cell Strainer</p></td>
                                    <td height="45"><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cs_manufacturer" value="<?php Products::getValue('sup_cs_manufacturer', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="sup_cs_lot_no" value="<?php Products::getValue('sup_cs_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="sup_cs_expiration_date" value="<?php Products::getValue('sup_cs_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                            </tbody></table>
                        <table class="processing-table" border="1" width="100%">
                            <tbody><tr>
                                    <th colspan="5" style="background:#666; color:#fff; padding-bottom: 22px;" width="18%"> <h4 class="mailn-processing-hadding">EQUIPMENT</h4>
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
                                            <input class="detail-content-form border-hidden" type="text" name="equ_biocab_lot_no" value="<?php Products::getValue('equ_biocab_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_biocab_expiration_date" value="<?php Products::getValue('equ_biocab_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Centrifuge</p></td>
                                    <td height="45"><p class="col-md-12">Thermo Scientific</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_centrifuge_lot_no" value="<?php Products::getValue('equ_centrifuge_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_centrifuge_expiration_date" value="<?php Products::getValue('equ_centrifuge_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Microscope</p></td>
                                    <td height="45"><p class="col-md-12">Olympus</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_microscope_lot_no" value="<?php Products::getValue('equ_microscope_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_microscope_expiration_date" value="<?php Products::getValue('equ_microscope_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Water bath</p></td>
                                    <td height="45"><p class="col-md-12">VWR</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_wbath_lot_no" value="<?php Products::getValue('equ_wbath_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_wbath_expiration_date" value="<?php Products::getValue('equ_wbath_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Pipette aid</p></td>
                                    <td height="45"><p class="col-md-12">Drummond</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_piaid_lot_no" value="<?php Products::getValue('equ_piaid_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_piaid_expiration_date" value="<?php Products::getValue('equ_piaid_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Micropipette</p></td>
                                    <td height="45"><p class="col-md-12">Gilson</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_micropipette_lot_no" value="<?php Products::getValue('equ_micropipette_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_micropipette_expiration_date" value="<?php Products::getValue('equ_micropipette_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Hemocytometer</p></td>
                                    <td height="45"><p class="col-md-12">Reichert</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_hemocytometer_lot_no" value="<?php Products::getValue('equ_hemocytometer_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_hemocytometer_expiration_date" value="<?php Products::getValue('equ_hemocytometer_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Controlled Rate Freezer</p></td>
                                    <td height="45"><p class="col-md-12">Planer PLC</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_crf_lot_no" value="<?php Products::getValue('equ_crf_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_crf_expiration_date" value="<?php Products::getValue('equ_crf_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Vapor Phase LN2 Storage Dewar</p></td>
                                    <td height="45"><p class="col-md-12">Chart</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_vpsd_lot_no" value="<?php Products::getValue('equ_vpsd_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_vpsd_expiration_date" value="<?php Products::getValue('equ_vpsd_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Heat Sealer</p></td>
                                    <td height="45"><p class="col-md-12">Omnisealer</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_heats_lot_no" value="<?php Products::getValue('equ_heats_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_heats_expiration_date" value="<?php Products::getValue('equ_heats_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                                <tr>
                                    <td height="45"><p class="col-md-12">Vacuum pump</p></td>
                                    <td height="45"><p class="col-md-12">Gast</p></td>
                                    <td><div class="col-md-12">
                                            <input class="detail-content-form border-hidden" type="text" name="equ_vpump_lot_no" value="<?php Products::getValue('equ_vpump_lot_no', $sopdata) ?>">
                                        </div></td>
                                    <td><div class="col-md-12 text-center">
                                            <input class=" mrg-hidden datetimepicker4 border-hidden" type="text" name="equ_vpump_expiration_date" value="<?php Products::getValue('equ_vpump_expiration_date', $sopdata) ?>">
                                        </div></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="equ_comments" class="form-control rcom"><?php Products::getValue('equ_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($productsopflag == 'true') {
                        ?>
                        <div class="col-md-12" id="section4">
                            <?php
                        } else {
                            ?>
                            <div class="col-md-12">
                                <?php
                            }
                            ?>
                            <div class="informations-box">
                                <h3> III. PROCESSING </h3>
                            </div>
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
                                                    <input class="checkbox-inline" type="checkbox" name="act_bscprep_check" <?php
                                                    if ((Products::getCheckValue('act_bscprep_check', $sopdata)) == "on") {
                                                        echo 'checked="checked" ';
                                                    }
                                                    ?>>
                                                    yes </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="btn "> BSC Air Flow </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="act_bscairflow" value="<?php Products::getValue('act_bscairflow', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div>
                                            <p class="col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><div class="col-md-12">
                                                <label class="btn "> Laboratory utilized </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class="mrg-hidden" type="text" name="act_labutilization" value="<?php Products::getValue('act_labutilization', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="checkbox-inline " type="checkbox" name="act_verify_sanitization_performed_check" <?php
                                                if ((Products::getCheckValue('act_verify_sanitization_performed_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                Verify sanitization performed

                                            </div>
                                            <div class="col-md-12">
                                                <label class="btn "> Start  date and time: </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class="mrg-hidden datetimepicker4" type="text" name="act_startdt" value="<?php Products::getValue('act_startdt', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><label class="btn ">
                                                <p class="both-pad-hidden">Cell count from Enrichment of MNC (SOP CMP 7.002 </p>
                                            </label>
                                            <div class="col-md-12">
                                                <label class="btn "> Attachment I): </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="act_ccem" value="<?php Products::getValue('act_ccem', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="btn "> Viability of MNC enriched product: </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="vmep" value="<?php Products::getValue('vmep', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><p class="both-pad-hidden">Divide and distribute cells  equally into 10 flasks</p></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><p class="col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                            <div class="col-md-12">
                                                <label class="btn ">Volume of media added to each flask </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="act_vmaef" value="<?php Products::getValue('act_vmaef', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><div class="col-md-12">
                                                <label class="btn ">CO<sub>o</sub> Incubator used: </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="act_incubator_used" value="<?php Products::getValue('act_incubator_used', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="btn ">End process date and time: </label>
                                                <label class="btn">
                                                    <div class="col-md-12">
                                                        <input class=" mrg-hidden " type="text" name="act_enddt" value="<?php Products::getValue('act_enddt', $sopdata) ?>">
                                                    </div>
                                                </label>
                                            </div></td>
                                        <td><textarea class="detail-content-form border-hidden"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                            ?>
                            <div class="row">
                                <h3>Comments</h3>
                            </div>
                            <div class="row">
                                <textarea rows="6" name="act_comments" class="form-control rcom"><?php Products::getValue('act_comments', $sopdata); ?></textarea>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">

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


                <?php ActiveForm::end(); ?>