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
        <h1 class="text-center ">MSC THAWING AND WASHING WORKSHEET</h1>

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

                <table width="100%" border="1" class="processing-table">
                    <tbody><tr class="processing-table-background">
                            <th><h4 class="mailn-processing-hadding">Printed Name</h4></th>
                            <th><h4 class="mailn-processing-hadding">Date</h4></th>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="pt_prname1" value="<?php Products::getValue('pt_prname1', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date1" value="<?php Products::getValue('pt_date1', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="pt_prname2" value="<?php Products::getValue('pt_prname2', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date2" value="<?php Products::getValue('pt_date2', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="pt_prname3" value="<?php Products::getValue('pt_prname3', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date3" value="<?php Products::getValue('pt_date3', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="pt_prname4" value="<?php Products::getValue('pt_prname4', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date4" value="<?php Products::getValue('pt_date4', $sopdata) ?>">
                                </div></td>
                        </tr>
                        <tr>
                            <td height="45"><div class="col-md-12">
                                    <input type="text" class="detail-content-form border-hidden" name="pt_prname5" value="<?php Products::getValue('pt_prname5', $sopdata) ?>">
                                </div></td>
                            <td><div class="col-md-12 text-center">
                                    <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="pt_date5" value="<?php Products::getValue('pt_date5', $sopdata) ?>">
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
                    <textarea rows="6" name="50031_s1_comments" class="form-control rcom"><?php Products::getValue('50031_s1_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>

            <div class="col-xs-12 col-md-12 ">
                <div class="informations-box">
                    <h3> I.	STUDY INFORMATION </h3>
                    <table width="100%" border="1">
                        <tbody>
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
                            <tr>
                                <td><div class="input-group btn-group-lg">
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="si_201x106_cells" <?php
                                            if ((Products::getCheckValue('si_201x106_cells', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            20X106 cells       </label>
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="si_100x106_cells" <?php
                                            if ((Products::getCheckValue('si_100x106_cells', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            100X106 cells        </label>
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="si_200x106_cells" <?php
                                            if ((Products::getCheckValue('si_200x106_cells', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            200X106 cells       </label>
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="si_placebo" <?php
                                            if ((Products::getCheckValue('si_placebo', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            placebo </label>
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="si_others" <?php
                                            if ((Products::getCheckValue('si_others', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            others </label>
                                    </div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if ($productsopflag == 'true') {
                ?>
                <div class="col-md-12" id="section2">
                    <?php
                } else {
                    ?>
                    <div class="col-md-12">
                        <?php
                    }
                    ?>
                    <div class="informations-box">
                        <h3>II.	REAGENTS, SUPPLIES AND EQUIPMENT</h3>
                    </div>
                    <table width="100%" border="1" class="processing-table">
                        <tbody><tr>
                                <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"> <h4 class="mailn-processing-hadding">MEDIA AND REAGENTS</h4>
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
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_pl_manf" value="<?php Products::getValue('rse_mr_pl_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_pl_lotno" value="<?php Products::getValue('rse_mr_pl_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_mr_pl_exp_date" value="<?php Products::getValue('rse_mr_pl_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">25% HSA</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_hsa_manf" value="<?php Products::getValue('rse_mr_hsa_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_hsa_lotno" value="<?php Products::getValue('rse_mr_hsa_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_mr_hsa_exp_date" value="<?php Products::getValue('rse_mr_hsa_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Hespan 6%</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_hespan_manf" value="<?php Products::getValue('rse_mr_hespan_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_hespan_lotno" value="<?php Products::getValue('rse_mr_hespan_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_mr_hespan_exp_date" value="<?php Products::getValue('rse_mr_hespan_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">DMSO</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_dmso_manf" value="<?php Products::getValue('rse_mr_dmso_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_mr_dmso_lotno" value="<?php Products::getValue('rse_mr_dmso_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_mr_dmso_exp_date" value="<?php Products::getValue('rse_mr_dmso_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                        </tbody></table>
                    <table width="100%" border="1" class="processing-table">
                        <tbody><tr>
                                <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"> <h4 class="mailn-processing-hadding">SUPPLIES</h4>
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
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_asppip_manf" value="<?php Products::getValue('rse_sup_asppip_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_asppip_lotno" value="<?php Products::getValue('rse_sup_asppip_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_asppip_exp_date" value="<?php Products::getValue('rse_sup_asppip_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">5 ml pipette</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_5mlpip_manf" value="<?php Products::getValue('rse_sup_5mlpip_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_5mlpip_lotno" value="<?php Products::getValue('rse_sup_5mlpip_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_5mlpip_exp_date" value="<?php Products::getValue('rse_sup_5mlpip_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">10 ml pipette</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_10mlpip_manf" value="<?php Products::getValue('rse_sup_10mlpip_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_10mlpip_lotno" value="<?php Products::getValue('rse_sup_10mlpip_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_10mlpip_exp_date" value="<?php Products::getValue('rse_sup_10mlpip_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">25 ml pipette</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_25mlpip_manf" value="<?php Products::getValue('rse_sup_25mlpip_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_25mlpip_lotno" value="<?php Products::getValue('rse_sup_25mlpip_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_25mlpip_exp_date" value="<?php Products::getValue('rse_sup_25mlpip_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">50 ml pipette</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_50mlpip_manf" value="<?php Products::getValue('rse_sup_50mlpip_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_50mlpip_lotno" value="<?php Products::getValue('rse_sup_50mlpip_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_50mlpip_exp_date" value="<?php Products::getValue('rse_sup_50mlpip_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Sterile tubing set</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_sts_manf" value="<?php Products::getValue('rse_sup_sts_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_sts_lotno" value="<?php Products::getValue('rse_sup_sts_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_sts_exp_date" value="<?php Products::getValue('rse_sup_sts_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Conical tubes 50 ml</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_ct50ml_manf" value="<?php Products::getValue('rse_sup_ct50ml_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_ct50ml_lotno" value="<?php Products::getValue('rse_sup_ct50ml_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_ct50ml_exp_date" value="<?php Products::getValue('rse_sup_ct50ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Square bottles</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_sqbot_manf" value="<?php Products::getValue('rse_sup_sqbot_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_sqbot_lotno" value="<?php Products::getValue('rse_sup_sqbot_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_sqbot_exp_date" value="<?php Products::getValue('rse_sup_sqbot_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Cryovials</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cry_manf" value="<?php Products::getValue('rse_sup_cry_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cry_lotno" value="<?php Products::getValue('rse_sup_cry_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_cry_exp_date" value="<?php Products::getValue('rse_sup_cry_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Cryo bags</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cryo_manf" value="<?php Products::getValue('rse_sup_cryo_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cryo_lotno" value="<?php Products::getValue('rse_sup_cryo_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_cryo_exp_date" value="<?php Products::getValue('rse_sup_cryo_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">60ml syringe</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_60mlsyr_manf" value="<?php Products::getValue('rse_sup_60mlsyr_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_60mlsyr_lotno" value="<?php Products::getValue('rse_sup_60mlsyr_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_60mlsyr_exp_date" value="<?php Products::getValue('rse_sup_60mlsyr_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">20ml syringe</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_20mlsyr_manf" value="<?php Products::getValue('rse_sup_20mlsyr_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_20mlsyr_lotno" value="<?php Products::getValue('rse_sup_20mlsyr_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_20mlsyr_exp_date" value="<?php Products::getValue('rse_sup_20mlsyr_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Cell Strainer</p></td>
                                <td height="45"><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cellst_manf" value="<?php Products::getValue('rse_sup_cellst_manf', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_sup_cellst_lotno" value="<?php Products::getValue('rse_sup_cellst_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_sup_cellst_exp_date" value="<?php Products::getValue('rse_sup_cellst_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>

                        </tbody></table>
                    <table width="100%" border="1" class="processing-table">
                        <tbody><tr>
                                <th width="18%" style="background:#666; color:#fff; padding-bottom: 22px;" colspan="5"> <h4 class="mailn-processing-hadding">EQUIPMENT</h4>
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
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_biosafe_lotno" value="<?php Products::getValue('rse_eqi_biosafe_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_biosafe_exp_date" value="<?php Products::getValue('rse_eqi_biosafe_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Centrifuge</p></td>
                                <td height="45"><p class="col-md-12">Thermo Scientific</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_centri_lotno" value="<?php Products::getValue('rse_eqi_centri_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_centri_exp_date" value="<?php Products::getValue('rse_eqi_centri_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Microscope</p></td>
                                <td height="45"><p class="col-md-12">Olympus</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_micoly_lotno" value="<?php Products::getValue('rse_eqi_micoly_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_micoly_exp_date" value="<?php Products::getValue('rse_eqi_micoly_exp_date', $sopdata) ?>"> 
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Water bath</p></td>
                                <td height="45"><p class="col-md-12">VWR</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_watvwr_lotno" value="<?php Products::getValue('rse_eqi_watvwr_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_watvwr_exp_date" value="<?php Products::getValue('rse_eqi_watvwr_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Pipette aid</p></td>
                                <td height="45"><p class="col-md-12">Drummond</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_paiddrum_lotno" value="<?php Products::getValue('rse_eqi_paiddrum_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_paiddrum_exp_date" value="<?php Products::getValue('rse_eqi_paiddrum_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Micropipette</p></td>
                                <td height="45"><p class="col-md-12">Gilson</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_micgil_lotno" value="<?php Products::getValue('rse_eqi_micgil_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_micgil_exp_date" value="<?php Products::getValue('rse_eqi_micgil_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Hemocytometer</p></td>
                                <td height="45"><p class="col-md-12">Reichert</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_hemrei_lotno" value="<?php Products::getValue('rse_eqi_hemrei_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_hemrei_exp_date" value="<?php Products::getValue('rse_eqi_hemrei_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Controlled Rate Freezer</p></td>
                                <td height="45"><p class="col-md-12">Planer PLC</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_crfpp_lotno" value="<?php Products::getValue('rse_eqi_crfpp_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_crfpp_exp_date" value="<?php Products::getValue('rse_eqi_crfpp_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Vapor Phase LN2 Storage Dewar</p></td>
                                <td height="45"><p class="col-md-12">Chart</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_vplsdc_lotno" value="<?php Products::getValue('rse_eqi_vplsdc_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_vplsdc_exp_date" value="<?php Products::getValue('rse_eqi_vplsdc_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Heat Sealer</p></td>
                                <td height="45"><p class="col-md-12">Omnisealer</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_hsomni_lotno" value="<?php Products::getValue('rse_eqi_hsomni_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_hsomni_exp_date" value="<?php Products::getValue('rse_eqi_hsomni_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height="45"><p class="col-md-12">Vacuum pump</p></td>
                                <td height="45"><p class="col-md-12">Gast</p></td>
                                <td><div class="col-md-12">
                                        <input type="text" class="detail-content-form border-hidden" name="rse_eqi_vpgast_lotno" value="<?php Products::getValue('rse_eqi_vpgast_lotno', $sopdata) ?>">
                                    </div></td>
                                <td><div class="col-md-12 text-center">
                                        <input type="text" class=" mrg-hidden datetimepicker4 border-hidden" name="rse_eqi_vpgast_exp_date" value="<?php Products::getValue('rse_eqi_vpgast_exp_date', $sopdata) ?>">
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
                        <textarea rows="6" name="50031_s2_comments" class="form-control rcom"><?php Products::getValue('50031_s2_comments', $sopdata) ?></textarea>
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
                            <h3> III. PROCESSING </h3>
                        </div>
                        <table width="100%" border="1" class="processing-table">
                            <tbody><tr class="processing-table-background">
                                    <th width="23%"><h4 class="mailn-processing-hadding">PROCESS</h4></th>
                                    <th width="45%"><h4 class="mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width="17%"><h4 class="mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td height="100" rowspan="6"><p class="col-md-12">Cryopreservation</p></td>
                                    <td><div class="col-md-12">
                                            <label class="btn "> BSC prepared for processing: </label>
                                            <label class="btn both-pad-hidden">
                                                <input type="checkbox" class="checkbox-inline" name="pro_bsc_prep"  <?php
                                                if ((Products::getCheckValue('pro_bsc_prep', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="btn "> BSC Air Flow </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_bsc_airflow" value="<?php Products::getValue('pro_bsc_airflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class="col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf1"><?php Products::getValue('pro_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class="col-md-12">
                                            <label class="btn "> Laboratory utilized </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_labutil" value="<?php Products::getValue('pro_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" class="checkbox-inline " name="pro_vsp_check" <?php
                                            if ((Products::getCheckValue('pro_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class="col-md-12">
                                            <label class="btn "> Start  date and time: </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_stdt" value="<?php Products::getValue('pro_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf2"><?php Products::getValue('pro_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class="btn ">
                                            <p class="both-pad-hidden">Cell count from Enrichment of MNC (SOP CMP 7.002 </p>
                                        </label>
                                        <div class="col-md-12">
                                            <label class="btn "> Attachment I): </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_attachement1" value="<?php Products::getValue('pro_attachement1', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="btn "> Viability of MNC enriched product: </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_vmncep" value="<?php Products::getValue('pro_vmncep', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf3"><?php Products::getValue('pro_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class="both-pad-hidden">Divide and distribute cells  equally into 10 flasks</p></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf4"><?php Products::getValue('pro_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class="col-md-12">
                                            <label class="btn ">Volume of media added to each flask </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_vmaef" value="<?php Products::getValue('pro_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf5"><?php Products::getValue('pro_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class="col-md-12">
                                            <label class="btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_inc_used" value="<?php Products::getValue('pro_inc_used', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="btn ">End process date and time: </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_endt" value="<?php Products::getValue('pro_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_perf6"><?php Products::getValue('pro_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>



                        <table width="100%" border="1" class="processing-table">
                            <tbody><tr class="processing-table-background">
                                    <th width="23%"><h4 class="mailn-processing-hadding">PROCESS</h4></th>
                                    <th width="45%"><h4 class="mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width="17%"><h4 class="mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td height="100" rowspan="6"><p class="col-md-12">Thawing and washing</p></td>
                                    <td><div class="col-md-12">
                                            <label class="btn "> BSC prepared for processing: </label>
                                            <label class="btn both-pad-hidden">
                                                <input type="checkbox" class="checkbox-inline" name="pro_tw_bsc_prep" <?php
                                                if ((Products::getCheckValue('pro_tw_bsc_prep', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class="col-md-12 ">
                                            <label class="btn"> Dewar # </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_dewarno" value="<?php Products::getValue('pro_tw_dewarno', $sopdata) ?>">
                                            </label>
                                            <label class="btn">Section</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_section" value="<?php Products::getValue('pro_tw_section', $sopdata) ?>">
                                            </label>
                                            <label class="btn">Column</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_column" value="<?php Products::getValue('pro_tw_column', $sopdata) ?>">
                                            </label>
                                            <label class="btn">Slot: </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_slot" value="<?php Products::getValue('pro_tw_slot', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-12 both-pad-hidden">
                                            <label class="btn "> Verify sanitization performed: </label>

                                            <input type="checkbox" class="checkbox-inline " name="pro_tw_vsp_check" <?php
                                            if ((Products::getCheckValue('pro_tw_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                        </div>
                                        <div class="col-md-12 ">
                                            <label class="btn"> Bag/Vial #  /ID </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_bagval" value="<?php Products::getValue('pro_tw_bagval', $sopdata) ?>">
                                            </label>



                                        </div>
                                        <div class="col-md-12 ">
                                            <label class="btn"> Cells/bag or Vial </label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_cellbag1" value="<?php Products::getValue('pro_tw_cellbag1', $sopdata) ?>">
                                            </label>

                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_cellbag2" value="<?php Products::getValue('pro_tw_cellbag2', $sopdata) ?>">
                                            </label>

                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_cellbag3" value="<?php Products::getValue('pro_tw_cellbag3', $sopdata) ?>">
                                            </label>

                                        </div>

                                        <div class="col-md-12 ">
                                            <label class="btn"> Total cells</label>
                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_tcells1" value="<?php Products::getValue('pro_tw_tcells1', $sopdata) ?>">
                                            </label>

                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_tcells2" value="<?php Products::getValue('pro_tw_tcells2', $sopdata) ?>">
                                            </label>

                                            <label class="btn">
                                                <input type="text" class="mrg-hidden  xs-input" name="pro_tw_tcells3" value="<?php Products::getValue('pro_tw_tcells3', $sopdata) ?>">
                                            </label>

                                        </div>







                                    </td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf1"><?php Products::getValue('pro_tw_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>


                                        <div class="col-md-12">
                                            <p class="both-pad-hidden">Place the cassette in a plastic bag and put in the water bath (just a few seconds)</p>
                                        </div>
                                    </td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf2"><?php Products::getValue('pro_tw_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class="btn ">
                                            <p class="">Place the cassette in a plastic bag and put in the water bath (just a few seconds) </p>
                                        </label>

                                    </td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf3"><?php Products::getValue('pro_tw_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class="both-pad-hidden">Quickly remove cryocyte bag from the metal cassette, verify the label on the bag / vial, and put the cryocyte bag back into the plastic bag and in the water bath.
                                            NOTE: The product is considered thawed when few crystals can be observed in the bag.
                                        </p></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf4"><?php Products::getValue('pro_tw_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class="col-md-12">Once thawed, wipe the bag with alcohol and transfer it to the BSC.</p>
                                    </td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf5"><?php Products::getValue('pro_tw_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class="col-md-12">
                                            <label class="btn ">Total product volume in eachbag/vial </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_tw_tpvev" value="<?php Products::getValue('pro_tw_tpvev', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class="col-md-12">Connect coupler to the bag and to a 60cc syringe with </p>
                                        <div class="col-md-12">
                                            <label class="btn ">thaw media. Volume of thaw media added </label>
                                            <label class="btn">
                                                <div class="col-md-12">
                                                    <input type="text" class=" mrg-hidden " name="pro_tw_tmvtma" value="<?php Products::getValue('pro_tw_tmvtma', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class="detail-content-form border-hidden rcom" name="pro_tw_perf6"><?php Products::getValue('pro_tw_perf6', $sopdata) ?></textarea></td>
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
                            <textarea rows="6" name="50031_s3_comments" class="form-control rcom"><?php Products::getValue('50031_s3_comments', $sopdata) ?></textarea>
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
                                    <input type="text" class="mrg-hidden " name="50031_review_by" value="<?php Products::getValue('50031_review_by', $sopdata) ?>" id="reviewed_by">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group btn-group-lg">
                                <label class="btn"> Date: </label>
                                <label class="btn col-md">
                                    <input type="text" class=" mrg-hidden datetimepicker4" name="50031_date" value="<?php Products::getValue('50031_date', $sopdata) ?>">
                                </label>
                            </div>
                        </div>
                        <?php
                    }
                    ?>




                    <div class="clearfix"></div>
                    <hr>

                    <div class="col-md-12">

                        <h1 class="text-center ">SAMPLES COLLECTED AND RESULTS</h1>
                        <br>
                    </div>


                        <div class="clearfix"></div>
                        <hr>



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