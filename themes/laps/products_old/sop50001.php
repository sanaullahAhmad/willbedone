
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 5.000 I';
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
        ?>;
        <h1 class = "text-center "> CULTURE AND EXPANSION OF ALLOGENEIC MSC WORKSHEET </h1>
        <h2 class = "text-center text-primary">Processing team:</h2>
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
                <table class = "processing-table" border = "1" width = "100%">
                    <tbody><tr class = "processing-table-background">
                            <th width = "18%"><h4 class = "mailn-processing-hadding">Passage (P0)</h4></th>
                            <th width = "24%"><h4 class = "mailn-processing-hadding">Printed Name</h4></th>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Initial seeding</p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_is_date" value = "<?php Products::getValue('pt_p0_is_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_is_pname1" value = "<?php Products::getValue('pt_p0_is_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_is_pname2" value = "<?php Products::getValue('pt_p0_is_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_is_pname3" value = "<?php Products::getValue('pt_p0_is_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P0 feeding#1 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_pf1_date" value = "<?php Products::getValue('pt_p0_pf1_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_pf1_pname1" value = "<?php Products::getValue('pt_p0_pf1_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf1_pname2" value = "<?php Products::getValue('pt_p0_pf1_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf1_pname3" value = "<?php Products::getValue('pt_p0_pf1_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P0 feeding#2</p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_pf2_date" value = "<?php Products::getValue('pt_p0_pf2_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_pf2_pname1" value = "<?php Products::getValue('pt_p0_pf2_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf2_pname2" value = "<?php Products::getValue('pt_p0_pf2_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf2_pname3" value = "<?php Products::getValue('pt_p0_pf2_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P0 feeding#3</p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_pf3_date" value = "<?php Products::getValue('pt_p0_pf3_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_pf3_pname1" value = "<?php Products::getValue('pt_p0_pf3_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf3_pname2" value = "<?php Products::getValue('pt_p0_pf3_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf3_pname3" value = "<?php Products::getValue('pt_p0_pf3_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P0 feeding#4</p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_pf4_date" value = "<?php Products::getValue('pt_p0_pf4_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_pf4_pname1" value = "<?php Products::getValue('pt_p0_pf4_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf4_pname2" value = "<?php Products::getValue('pt_p0_pf4_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf4_pname3" value = "<?php Products::getValue('pt_p0_pf4_pname3', $sopdata) ?>"></td>

                        </tr>

                        <tr><td height = "95"><p class = "col-md-12">P0 feeding#5
                                    (if needed) </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p0_pf5_date" value = "<?php Products::getValue('pt_p0_pf5_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p0_pf5_pname1" value = "<?php Products::getValue('pt_p0_pf5_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf5_pname2" value = "<?php Products::getValue('pt_p0_pf5_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p0_pf5_pname3" value = "<?php Products::getValue('pt_p0_pf5_pname3', $sopdata) ?>"></td>

                        </tr>
                    </tbody></table>
                <table class = "processing-table" border = "1" width = "100%">
                    <tbody><tr class = "processing-table-background">
                            <th width = "18%"><h4 class = "mailn-processing-hadding">Passage (P1)</h4></th>
                            <th width = "24%"><h4 class = "mailn-processing-hadding">Printed Name</h4></th>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Expansion
                                    P0 to P1 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p1_exp_date" value = "<?php Products::getValue('pt_p1_exp_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p1_exp_pname1" value = "<?php Products::getValue('pt_p1_exp_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_exp_pname2" value = "<?php Products::getValue('pt_p1_exp_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_exp_pname3" value = "<?php Products::getValue('pt_p1_exp_pname3', $sopdata) ?>">
                            </td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P1 feeding#1 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p1_pf1_date" value = "<?php Products::getValue('pt_p1_pf1_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p1_pf1_pname1" value = "<?php Products::getValue('pt_p1_pf1_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf1_pname2" value = "<?php Products::getValue('pt_p1_pf1_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf1_pname3" value = "<?php Products::getValue('pt_p1_pf1_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P1 feeding#2</p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p1_pf2_date" value = "<?php Products::getValue('pt_p1_pf2_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p1_pf2_pname1" value = "<?php Products::getValue('pt_p1_pf2_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf2_pname2" value = "<?php Products::getValue('pt_p1_pf2_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf2_pname3" value = "<?php Products::getValue('pt_p1_pf2_pname3', $sopdata) ?>"></td>

                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P1 feeding#3
                                    (if needed) </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p1_pf3_date" value = "<?php Products::getValue('pt_p1_pf3_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p1_pf3_pname1" value = "<?php Products::getValue('pt_p1_pf3_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf3_pname2" value = "<?php Products::getValue('pt_p1_pf3_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p1_pf3_pname3" value = "<?php Products::getValue('pt_p1_pf3_pname3', $sopdata) ?>"></td>

                        </tr>
                    </tbody></table>
                <table class = "processing-table" border = "1" width = "100%">
                    <tbody><tr class = "processing-table-background">
                            <th width = "18%"><h4 class = "mailn-processing-hadding">Passage (P2))</h4></th>
                            <th width = "24%"><h4 class = "mailn-processing-hadding">Printed Name</h4></th>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Expansion
                                    P1 to P2 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p2_exp_date" value = "<?php Products::getValue('pt_p2_exp_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p2_exp_pname1" value = "<?php Products::getValue('pt_p2_exp_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_exp_pname2" value = "<?php Products::getValue('pt_p2_exp_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_exp_pname3" value = "<?php Products::getValue('pt_p2_exp_pname3', $sopdata) ?>"></td>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P1 feeding#1 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p2_pf1_date" value = "<?php Products::getValue('pt_p2_pf1_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p2_pf1_pname1" value = "<?php Products::getValue('pt_p2_pf1_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_pf1_pname2" value = "<?php Products::getValue('pt_p2_pf1_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_pf1_pname3" value = "<?php Products::getValue('pt_p2_pf1_pname3', $sopdata) ?>"></td>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">P2 feeding#2
                                    (if needed) </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_p2_pf2_date" value = "<?php Products::getValue('pt_p2_pf2_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_p2_pf2_pname1" value = "<?php Products::getValue('pt_p2_pf2_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_pf2_pname2" value = "<?php Products::getValue('pt_p2_pf2_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_p2_pf2_pname3" value = "<?php Products::getValue('pt_p2_pf2_pname3', $sopdata) ?>"></td>
                        </tr>
                    </tbody></table>
                <table class = "processing-table" border = "1" width = "100%">
                    <tbody><tr class = "processing-table-background">
                            <th width = "18%"><h4 class = "mailn-processing-hadding">Passage (CRYO)</h4></th>
                            <th width = "24%"><h4 class = "mailn-processing-hadding">Printed Name</h4></th>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Final harvest P2
                                    SET1 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_pcryo_fh_s1_date" value = "<?php Products::getValue('pt_pcryo_fh_s1_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s1_pname1" value = "<?php Products::getValue('pt_pcryo_fh_s1_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s1_pname2" value = "<?php Products::getValue('pt_pcryo_fh_s1_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s1_pname3" value = "<?php Products::getValue('pt_pcryo_fh_s1_pname3', $sopdata) ?>"></td>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Final harvest P2
                                    SET2 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_pcryo_fh_s2_date" value = "<?php Products::getValue('pt_pcryo_fh_s2_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s2_pname1" value = "<?php Products::getValue('pt_pcryo_fh_s2_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s2_pname2" value = "<?php Products::getValue('pt_pcryo_fh_s2_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s2_pname3" value = "<?php Products::getValue('pt_pcryo_fh_s2_pname3', $sopdata) ?>"></td>
                        </tr>
                        <tr>
                            <td height = "100"><p class = "col-md-12">Final harvest P2
                                    SET3 </p>
                                <label class = "btn "> Date </label>
                                <label class = "btn">
                                    <div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "pt_pcryo_fh_s3_date" value = "<?php Products::getValue('pt_pcryo_fh_s3_date', $sopdata) ?>">
                                    </div>
                                </label></td>
                            <td><input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s3_pname1" value = "<?php Products::getValue('pt_pcryo_fh_s3_pname1', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s3_pname2" value = "<?php Products::getValue('pt_pcryo_fh_s3_pname2', $sopdata) ?>">
                                <input class = "detail-content-form" type = "text" name = "pt_pcryo_fh_s3_pname3" value = "<?php Products::getValue('pt_pcryo_fh_s3_pname3', $sopdata) ?>"></td>
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
                    <textarea rows="6" name="50001_pt_comments" class="form-control rcom"><?php Products::getValue('50001_pt_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>
            <div class = "col-xs-12 col-md-12 ">
                <div class = "informations-box">
                    <h3> I. STUDY INFORMATION </h3>
                    <table border = "1" width = "100%">
                        <tbody>
                            <tr>
                                <td>PRODUCT ID: <?php echo $product->MSCID; ?>
                                </td>
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
                        </tbody></table>
                </div>
            </div>
            <div class = "col-xs-12 col-md-12 ">
                <div class = "informations-box">
                    <h3> II. REAGENTS, SUPPLIES AND EQUIPMENT </h3>
                </div>
            </div>
            <?php
            if ($productsopflag == 'true') {
                ?>
                <div id="section2">
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <?php
                    }
                    ?>
                    <table class = "processing-table" border = "1" width = "100%">
                        <tbody><tr>
                                <th colspan = "5" style = "background:#666; color:#fff; padding-bottom: 22px;" width = "18%"><h4 class = "mailn-processing-hadding">MEDIA AND REAGENTS</h4></th>
                            </tr>
                            <tr class = "processing-table-background">
                                <th width = "18%"><h4 class = "mailn-processing-hadding">Name</h4></th>
                                <th width = "24%"><h4 class = "mailn-processing-hadding">Manufacturer</h4></th>
                                <th width = "25%"><h4 class = "mailn-processing-hadding">Lot #</h4></th>
                                <th width = "10%"><h4 class = "mailn-processing-hadding">Expiration date</h4></th>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Alpha MEM </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_amem_manf"><?php Products::getValue('rse_mr_amem_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_amem_lotno1" value = "<?php Products::getValue('rse_mr_amem_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_amem_lotno2" value = "<?php Products::getValue('rse_mr_amem_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_amem_lotno3" value = "<?php Products::getValue('rse_mr_amem_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_amem_exp_date" value = "<?php Products::getValue('rse_mr_amem_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Fetal Bovine Serum </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_fbs_manf"><?php Products::getValue('rse_mr_fbs_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_fbs_lotno1" value = "<?php Products::getValue('rse_mr_fbs_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_fbs_lotno2" value = "<?php Products::getValue('rse_mr_fbs_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_fbs_lotno3" value = "<?php Products::getValue('rse_mr_fbs_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_fbs_exp_date" value = "<?php Products::getValue('rse_mr_fbs_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">GPS
                                        ( Glutamine, Penicillin, Streptomycin) </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_gps_manf"><?php Products::getValue('rse_mr_gps_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_gps_lotno1" value = "<?php Products::getValue('rse_mr_gps_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_gps_lotno2" value = "<?php Products::getValue('rse_mr_gps_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_gps_lotno3" value = "<?php Products::getValue('rse_mr_gps_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_gps_exp_date" value = "<?php Products::getValue('rse_mr_gps_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">L-glutamine </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_lg_manf"><?php Products::getValue('rse_mr_lg_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_lg_lotno1" value = "<?php Products::getValue('rse_mr_lg_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_lg_lotno2" value = "<?php Products::getValue('rse_mr_lg_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_lg_lotno3" value = "<?php Products::getValue('rse_mr_lg_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_lg_exp_date" value = "<?php Products::getValue('rse_mr_lg_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Trypsin EDTA </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_tedta_manf"><?php Products::getValue('rse_mr_tedta_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_tedta_lotno1" value = "<?php Products::getValue('rse_mr_tedta_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_tedta_lotno2" value = "<?php Products::getValue('rse_mr_tedta_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_tedta_lotno3" value = "<?php Products::getValue('rse_mr_tedta_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_tedta_exp_date" value = "<?php Products::getValue('rse_mr_tedta_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Plasma-Lyte A </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_pla_manf"><?php Products::getValue('rse_mr_pla_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_pla_lotno1" value = "<?php Products::getValue('rse_mr_pla_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_pla_lotno2" value = "<?php Products::getValue('rse_mr_pla_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_pla_lotno3" value = "<?php Products::getValue('rse_mr_pla_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_pla_exp_date" value = "<?php Products::getValue('rse_mr_pla_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Human Serum Albumin </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_hsa_manf"><?php Products::getValue('rse_mr_hsa_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_hsa_lotno1" value = "<?php Products::getValue('rse_mr_hsa_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_hsa_lotno2" value = "<?php Products::getValue('rse_mr_hsa_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_hsa_lotno3" value = "<?php Products::getValue('rse_mr_hsa_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_hsa_exp_date" value = "<?php Products::getValue('rse_mr_hsa_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Trypan Blue </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_tb_manf"><?php Products::getValue('rse_mr_tb_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_tb_lotno1" value = "<?php Products::getValue('rse_mr_tb_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_tb_lotno2" value = "<?php Products::getValue('rse_mr_tb_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_tb_lotno3" value = "<?php Products::getValue('rse_mr_tb_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_tb_exp_date" value = "<?php Products::getValue('rse_mr_tb_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Crystal Violet </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_cv_manf"><?php Products::getValue('rse_mr_cv_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_cv_lotno1" value = "<?php Products::getValue('rse_mr_cv_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_cv_lotno2" value = "<?php Products::getValue('rse_mr_cv_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_cv_lotno3" value = "<?php Products::getValue('rse_mr_cv_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_cv_exp_date" value = "<?php Products::getValue('rse_mr_cv_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">PBS
                                        (Phosphate Buffered Saline) </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_mr_pbs_manf"><?php Products::getValue('rse_mr_pbs_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_mr_pbs_lotno1" value = "<?php Products::getValue('rse_mr_pbs_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_pbs_lotno2" value = "<?php Products::getValue('rse_mr_pbs_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_mr_pbs_lotno3" value = "<?php Products::getValue('rse_mr_pbs_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_mr_pbs_exp_date" value = "<?php Products::getValue('rse_mr_pbs_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                        </tbody></table>
                    <table class = "processing-table" border = "1" width = "100%">
                        <tbody><tr>
                                <th colspan = "5" style = "background:#666; color:#fff; padding-bottom: 22px;" width = "18%"><h4 class = "mailn-processing-hadding">SUPPLIES</h4></th>
                            </tr>
                            <tr class = "processing-table-background">
                                <th width = "18%"><h4 class = "mailn-processing-hadding">Name</h4></th>
                                <th width = "24%"><h4 class = "mailn-processing-hadding">Manufacturer</h4></th>
                                <th width = "25%"><h4 class = "mailn-processing-hadding">Lot #</h4></th>
                                <th width = "10%"><h4 class = "mailn-processing-hadding">Expiration date</h4></th>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Aspirating pipette
                                        P0 to P1 </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_ap_manf"><?php Products::getValue('rse_sup_ap_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_ap_lotno1" value = "<?php Products::getValue('rse_sup_ap_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ap_lotno2" value = "<?php Products::getValue('rse_sup_ap_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ap_lotno3" value = "<?php Products::getValue('rse_sup_ap_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_ap_exp_date" value = "<?php Products::getValue('rse_sup_ap_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">2 ml pipette </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_2ml_manf"><?php Products::getValue('rse_sup_2ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_2ml_lotno1" value = "<?php Products::getValue('rse_sup_2ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_2ml_lotno2" value = "<?php Products::getValue('rse_sup_2ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_2ml_lotno3" value = "<?php Products::getValue('rse_sup_2ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_2ml_exp_date" value = "<?php Products::getValue('rse_sup_2ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">5 ml pipette </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_5ml_manf"><?php Products::getValue('rse_sup_5ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_5ml_lotno1" value = "<?php Products::getValue('rse_sup_5ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_5ml_lotno2" value = "<?php Products::getValue('rse_sup_5ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_5ml_lotno3" value = "<?php Products::getValue('rse_sup_5ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_5ml_exp_date" value = "<?php Products::getValue('rse_sup_5ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">10 ml pipette </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_10ml_manf"><?php Products::getValue('rse_sup_10ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_10ml_lotno1" value = "<?php Products::getValue('rse_sup_10ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_10ml_lotno2" value = "<?php Products::getValue('rse_sup_10ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_10ml_lotno3" value = "<?php Products::getValue('rse_sup_10ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_10ml_exp_date" value = "<?php Products::getValue('rse_sup_10ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">25 ml pipette </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_25ml_manf"><?php Products::getValue('rse_sup_25ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_25ml_lotno1" value = "<?php Products::getValue('rse_sup_25ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_25ml_lotno2" value = "<?php Products::getValue('rse_sup_25ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_25ml_lotno3" value = "<?php Products::getValue('rse_sup_25ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_25ml_exp_date" value = "<?php Products::getValue('rse_sup_25ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">50 ml pipette </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_50ml_manf"><?php Products::getValue('rse_sup_50ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_50ml_lotno1" value = "<?php Products::getValue('rse_sup_50ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_50ml_lotno2" value = "<?php Products::getValue('rse_sup_50ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_50ml_lotno3" value = "<?php Products::getValue('rse_sup_50ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_50ml_exp_date" value = "<?php Products::getValue('rse_sup_50ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Conical tubes 50 ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_ct50ml_manf"><?php Products::getValue('rse_sup_ct50ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_ct50ml_lotno1" value = "<?php Products::getValue('rse_sup_ct50ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ct50ml_lotno2" value = "<?php Products::getValue('rse_sup_ct50ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ct50ml_lotno3" value = "<?php Products::getValue('rse_sup_ct50ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_ct50ml_exp_date" value = "<?php Products::getValue('rse_sup_ct50ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Conical Tubes 500 ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_ct500ml_manf"><?php Products::getValue('rse_sup_ct500ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_ct500ml_lotno1" value = "<?php Products::getValue('rse_sup_ct500ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ct500ml_lotno2" value = "<?php Products::getValue('rse_sup_ct500ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ct500ml_lotno3" value = "<?php Products::getValue('rse_sup_ct500ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_ct500ml_exp_date" value = "<?php Products::getValue('rse_sup_ct500ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Cryovials </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_cry_manf"><?php Products::getValue('rse_sup_cry_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_cry_lotno1" value = "<?php Products::getValue('rse_sup_cry_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_cry_lotno2" value = "<?php Products::getValue('rse_sup_cry_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_cry_lotno3" value = "<?php Products::getValue('rse_sup_cry_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_cry_exp_date" value = "<?php Products::getValue('rse_sup_cry_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Culture flasks </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_cf_manf"><?php Products::getValue('rse_sup_cf_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_cf_lotno1" value = "<?php Products::getValue('rse_sup_cf_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_cf_lotno2" value = "<?php Products::getValue('rse_sup_cf_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_cf_lotno3" value = "<?php Products::getValue('rse_sup_cf_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_cf_exp_date" value = "<?php Products::getValue('rse_sup_cf_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Syringe 20ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_syr20ml_manf"><?php Products::getValue('rse_sup_syr20ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_syr20ml_lotno1" value = "<?php Products::getValue('rse_sup_syr20ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_syr20ml_lotno2" value = "<?php Products::getValue('rse_sup_syr20ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_syr20ml_lotno3" value = "<?php Products::getValue('rse_sup_syr20ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_syr20ml_exp_date" value = "<?php Products::getValue('rse_sup_syr20ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Syringe 60ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_syr60ml_manf"><?php Products::getValue('rse_sup_syr60ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_syr60ml_lotno1" value = "<?php Products::getValue('rse_sup_syr60ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_syr60ml_lotno2" value = "<?php Products::getValue('rse_sup_syr60ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_syr60ml_lotno3" value = "<?php Products::getValue('rse_sup_syr60ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = "mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_syr60ml_exp_date" value = "<?php Products::getValue('rse_sup_syr60ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Needles
                                        P0 to P1 </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_need_manf"><?php Products::getValue('rse_sup_need_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_need_lotno1" value = "<?php Products::getValue('rse_sup_need_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_need_lotno2" value = "<?php Products::getValue('rse_sup_need_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_need_lotno3" value = "<?php Products::getValue('rse_sup_need_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_need_exp_date" value = "<?php Products::getValue('rse_sup_need_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Cobe coupler </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_ccoupler_manf"><?php Products::getValue('rse_sup_ccoupler_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_ccoupler_lotno1" value = "<?php Products::getValue('rse_sup_ccoupler_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ccoupler_lotno2" value = "<?php Products::getValue('rse_sup_ccoupler_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_ccoupler_lotno3" value = "<?php Products::getValue('rse_sup_ccoupler_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_ccoupler_exp_date" value = "<?php Products::getValue('rse_sup_ccoupler_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Filter System 500ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_fsystem500ml_manf"><?php Products::getValue('rse_sup_fsystem500ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_fsystem500ml_lotno1" value = "<?php Products::getValue('rse_sup_fsystem500ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_fsystem500ml_lotno2" value = "<?php Products::getValue('rse_sup_fsystem500ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_fsystem500ml_lotno3" value = "<?php Products::getValue('rse_sup_fsystem500ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_fsystem500ml_exp_date" value = "<?php Products::getValue('rse_sup_fsystem500ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Filter System 1000ml </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_fsystem1000ml_manf"><?php Products::getValue('rse_sup_fsystem1000ml_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_fsystem1000ml_lotno1" value = "<?php Products::getValue('rse_sup_fsystem1000ml_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_fsystem1000ml_lotno2" value = "<?php Products::getValue('rse_sup_fsystem1000ml_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_fsystem1000ml_lotno3" value = "<?php Products::getValue('rse_sup_fsystem1000ml_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_fsystem1000ml_exp_date" value = "<?php Products::getValue('rse_sup_fsystem1000ml_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Square bottles </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_sup_sqrbt_manf"><?php Products::getValue('rse_sup_sqrbt_manf', $sopdata) ?></textarea></td>
                                <td><input class = "detail-content-form" type = "text" name = "rse_sup_sqrbt_lotno1" value = "<?php Products::getValue('rse_sup_sqrbt_lotno1', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_sqrbt_lotno2" value = "<?php Products::getValue('rse_sup_sqrbt_lotno2', $sopdata) ?>">
                                    <input class = "detail-content-form" type = "text" name = "rse_sup_sqrbt_lotno3" value = "<?php Products::getValue('rse_sup_sqrbt_lotno3', $sopdata) ?>"></td>
                                <td><div class = "col-md-12">
                                        <input class = " mrg-hidden datetimepicker4 border-hidden" type = "text" name = "rse_sup_sqrbt_exp_date" value = "<?php Products::getValue('rse_sup_sqrbt_exp_date', $sopdata) ?>">
                                    </div></td>
                            </tr>
                        </tbody></table>
                    <div class = "col-md-12">
                        <p class = "col-md-12">
                            <label class = "btn both-pad-hidden"> <b>TCR#</b></label>
                            <label class = "btn">
                                <input class = "mrg-hidden" type = "text" name = "sup_tcrno" value = "<?php Products::getValue('sup_tcrno', $sopdata) ?>">
                            </label>
                        </p>
                    </div>
                    <table class = "processing-table" border = "1" width = "100%">
                        <tbody><tr>
                                <th colspan = "5" style = "background:#666; color:#fff; padding-bottom: 22px;" width = "18%"><h4 class = "mailn-processing-hadding">EQUIPMENT</h4></th>
                            </tr>
                            <tr class = "processing-table-background">
                                <th width = "18%"><h4 class = "mailn-processing-hadding">Name</h4></th>
                                <th width = "24%"><h4 class = "mailn-processing-hadding">Manufacturer</h4></th>
                                <th width = "25%"><h4 class = "mailn-processing-hadding">CMP #</h4></th>
                                <th width = "10%"><h4 class = "mailn-processing-hadding">QA/QC approved</h4></th>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Biosafety Cabinet </p></td>
                                <td height = "100"><p class = "col-md-12">Nuaire </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_biosaf_cmp"><?php Products::getValue('rse_equ_biosaf_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_biosaf_qaqc"><?php Products::getValue('rse_equ_biosaf_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">CO2 incubator </p></td>
                                <td height = "100"><p class = "col-md-12">Thermo Scientific</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_co2inc_cmp"><?php Products::getValue('rse_equ_co2inc_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_co2inc_qaqc"><?php Products::getValue('rse_equ_co2inc_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Centrifuge </p></td>
                                <td height = "100"><p class = "col-md-12">Thermo Scientific</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_centrifuge_cmp"><?php Products::getValue('rse_equ_centrifuge_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_centrifuge_qaqc"><?php Products::getValue('rse_equ_centrifuge_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Microscope</p></td>
                                <td height = "100"><p class = "col-md-12">Olympus</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_microscope_cmp"><?php Products::getValue('rse_equ_microscope_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_microscope_qaqc"><?php Products::getValue('rse_equ_microscope_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Water bath </p></td>
                                <td height = "100"><p class = "col-md-12">VWR </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_wbath_cmp"><?php Products::getValue('rse_equ_wbath_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_wbath_qaqc"><?php Products::getValue('rse_equ_wbath_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Pipette aid</p></td>
                                <td height = "100"><p class = "col-md-12">Drummond </p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_paid_cmp"><?php Products::getValue('rse_equ_paid_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_paid_qaqc"><?php Products::getValue('rse_equ_paid_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Micropipette </p></td>
                                <td height = "100"><p class = "col-md-12">Gilson</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_micpip_cmp"><?php Products::getValue('rse_equ_micpip_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_micpip_qaqc"><?php Products::getValue('rse_equ_micpip_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Hemocytometer </p></td>
                                <td height = "100"><p class = "col-md-12">Reichert</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_hemo_cmp"><?php Products::getValue('rse_equ_hemo_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_hemo_qaqc"><?php Products::getValue('rse_equ_hemo_qaqc', $sopdata) ?></textarea></td>
                            </tr>
                            <tr>
                                <td height = "100"><p class = "col-md-12">Vacuum pump </p></td>
                                <td height = "100"><p class = "col-md-12">Gast</p></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_vpump_cmp"><?php Products::getValue('rse_equ_vpump_cmp', $sopdata) ?></textarea></td>
                                <td><textarea class = "detail-content-form border-hidden" name = "rse_equ_hemo_qaqc"><?php Products::getValue('rse_equ_hemo_qaqc', $sopdata) ?></textarea></td>
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
                        <textarea rows="6" name="50001_rse_comments" class="form-control rcom"><?php Products::getValue('50001_rse_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>
                <div class = "col-xs-12 col-md-12 ">
                    <div class = "informations-box">
                        <h3> III. PROCESSING </h3>
                    </div>
                </div>
                <?php
                if ($productsopflag == 'true') {
                    ?>
                    <div id="section3">
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <?php
                        }
                        ?>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Initial seeding, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Initial seeding </p>
                                        <p class = "col-md-12 po">P0 </p>
                                        <p class = "col-md-12 ">Complete Media with Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_is_prep" value = "<?php Products::getValue('pro_is_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_is_exp" value = "<?php Products::getValue('pro_is_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_is_bcsprep_check"  <?php
                                                if ((Products::getCheckValue('pro_is_bcsprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_bscaflow" value = "<?php Products::getValue('pro_is_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_is_perf1"><?php Products::getValue('pro_is_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_labutil" value = "<?php Products::getValue('pro_is_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_is_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_is_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_vsp_stdt" value = "<?php Products::getValue('pro_is_vsp_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" accesskey = "pro_is_perf2"><?php Products::getValue('pro_is_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn ">
                                            <p class = "both-pad-hidden">Cell count from Enrichment of MNC (SOP CMP 7.002 </p>
                                        </label>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Attachment I): </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_cellcount" value = "<?php Products::getValue('pro_is_cellcount', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Viability of MNC enriched product: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_vmnc" value = "<?php Products::getValue('pro_is_vmnc', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_is_perf3"><?php Products::getValue('pro_is_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_is_perf4"><?php Products::getValue('pro_is_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_vmaef" value = "<?php Products::getValue('pro_is_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_is_perf5"><?php Products::getValue('pro_is_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_incused" value = "<?php Products::getValue('pro_is_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_is_endt" value = "<?php Products::getValue('pro_is_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_is_perf6"><?php Products::getValue('pro_is_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #1, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P0 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_celldate" value = "<?php Products::getValue('pro_feed1p0_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Complete Media with Antibiotics </p>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_prep" value = "<?php Products::getValue('pro_feed1p0_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_exp" value = "<?php Products::getValue('pro_feed1p0_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p0_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p0_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_bscaflow" value = "<?php Products::getValue('pro_feed1p0_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf1"><?php Products::getValue('pro_feed1p0_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_labutil" value = "<?php Products::getValue('pro_feed1p0_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p0_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed1p0_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_stdt" value = "<?php Products::getValue('pro_feed1p0_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf2"><?php Products::getValue('pro_feed1p0_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf3"><?php Products::getValue('pro_feed1p0_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_vmaef" value = "<?php Products::getValue('pro_feed1p0_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf4"><?php Products::getValue('pro_feed1p0_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media with Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf5"><?php Products::getValue('pro_feed1p0_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_incused" value = "<?php Products::getValue('pro_feed1p0_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p0_endt" value = "<?php Products::getValue('pro_feed1p0_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p0_perf6"><?php Products::getValue('pro_feed1p0_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #2, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 2, P0 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_celldate" value = "<?php Products::getValue('pro_feed2p0_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Complete Media with Antibiotics </p>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_prep" value = "<?php Products::getValue('pro_feed2p0_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_exp" value = "<?php Products::getValue('pro_feed2p0_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed2p0_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed2p0_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_bscaflow" value = "<?php Products::getValue('pro_feed2p0_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf1"><?php Products::getValue('pro_feed2p0_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_labutil" value = "<?php Products::getValue('pro_feed2p0_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed2p0_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed2p0_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_stdt" value = "<?php Products::getValue('pro_feed2p0_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf2"><?php Products::getValue('pro_feed2p0_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf3"><?php Products::getValue('pro_feed2p0_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_vmaef" value = "<?php Products::getValue('pro_feed2p0_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf4"><?php Products::getValue('pro_feed2p0_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media with Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf5"><?php Products::getValue('pro_feed2p0_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_incused" value = "<?php Products::getValue('pro_feed2p0_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p0_endt" value = "<?php Products::getValue('pro_feed2p0_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p0_perf6"><?php Products::getValue('pro_feed2p0_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #3, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 3, P0 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_celldate" value = "<?php Products::getValue('pro_feed3p0_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Complete Media with Antibiotics </p>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_prep" value = "<?php Products::getValue('pro_feed3p0_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_exp" value = "<?php Products::getValue('pro_feed3p0_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed3p0_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed3p0_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_bscaflow" value = "<?php Products::getValue('pro_feed3p0_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf1"><?php Products::getValue('pro_feed3p0_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_labutil" value = "<?php Products::getValue('pro_feed3p0_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed3p0_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed3p0_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_stdt" value = "<?php Products::getValue('pro_feed3p0_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf2"><?php Products::getValue('pro_feed3p0_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf3"><?php Products::getValue('pro_feed3p0_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_vmaef" value = "<?php Products::getValue('pro_feed3p0_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf4"><?php Products::getValue('pro_feed3p0_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media with Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf5"><?php Products::getValue('pro_feed3p0_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_incused" value = "<?php Products::getValue('pro_feed3p0_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p0_endt" value = "<?php Products::getValue('pro_feed3p0_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p0_perf6"><?php Products::getValue('pro_feed3p0_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #4, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 4, P0 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_celldate" value = "<?php Products::getValue('pro_feed4p0_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Complete Media with Antibiotics </p>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_prep" value = "<?php Products::getValue('pro_feed4p0_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_exp" value = "<?php Products::getValue('pro_feed4p0_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed4p0_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed4p0_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_bscaflow" value = "<?php Products::getValue('pro_feed4p0_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf1"><?php Products::getValue('pro_feed4p0_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_labutil" value = "<?php Products::getValue('pro_feed4p0_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed4p0_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed4p0_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_stdt" value = "<?php Products::getValue('pro_feed4p0_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf2"><?php Products::getValue('pro_feed4p0_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf3"><?php Products::getValue('pro_feed4p0_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_vmaef" value = "<?php Products::getValue('pro_feed4p0_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf4"><?php Products::getValue('pro_feed4p0_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media with Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf5"><?php Products::getValue('pro_feed4p0_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_incused" value = "<?php Products::getValue('pro_feed4p0_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed4p0_endt" value = "<?php Products::getValue('pro_feed4p0_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed4p0_perf6"><?php Products::getValue('pc_comments', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #5, P0</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 5, P0 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_celldate" value = "<?php Products::getValue('pro_feed5p0_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Complete Media with Antibiotics </p>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_prep" value = "<?php Products::getValue('pro_feed5p0_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_exp" value = "<?php Products::getValue('pro_feed5p0_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed5p0_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed5p0_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_bscaflow" value = "<?php Products::getValue('pro_feed5p0_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf1"><?php Products::getValue('pro_feed5p0_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_labutil" value = "<?php Products::getValue('pro_feed5p0_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed5p0_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed5p0_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_stdt" value = "<?php Products::getValue('pro_feed5p0_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf2"><?php Products::getValue('pro_feed5p0_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells equally into 10 flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf3"><?php Products::getValue('pro_feed5p0_perf30', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Bring the volume up to 25 ml with Complete Media With Antibiotics. </p>
                                        <div class = "col-md-12">
                                            <label class = "btn ">Volume of media added to each flask </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_vmaef" value = "<?php Products::getValue('pro_feed5p0_vmaef', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf4"><?php Products::getValue('pro_feed5p0_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media with Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf5"><?php Products::getValue('pro_feed5p0_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>o</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_incused" value = "<?php Products::getValue('pro_feed5p0_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed5p0_endt" value = "<?php Products::getValue('pro_feed5p0_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed5p0_perf6"><?php Products::getValue('pro_feed5p0_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Expansion P0 to P1</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "18" height = "100"><p class = "col-md-12">Expansion </p>
                                        <p class = "col-md-12">P0 to P1 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_day" value = "<?php Products::getValue('pro_exp0p1_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12 ">following initial seeding. </p>
                                        <p class = "col-md-12 ">Wash Media </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_prep1" value = "<?php Products::getValue('pro_exp0p1_prep1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_exp1" value = "<?php Products::getValue('pro_exp0p1_exp1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_prep2" value = "<?php Products::getValue('pro_exp0p1_prep2', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_exp2" value = "<?php Products::getValue('pro_exp0p1_exp2', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_exp0p1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_exp0p1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_bscaflow" value = "<?php Products::getValue('pro_exp0p1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf1"><?php Products::getValue('pro_exp0p1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_labutil" value = "<?php Products::getValue('pro_exp0p1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_exp0p1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_exp0p1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_stdt" value = "<?php Products::getValue('pro_exp0p1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf2"><?php Products::getValue('pro_exp0p1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn ">Volume of media added to each flask </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_perfvmaef" value = "<?php Products::getValue('pro_exp0p1_perfvmaef', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn ">Percent confluence: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_percon" value = "<?php Products::getValue('pro_exp0p1_percon', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">Look for signs of contamination </p>
                                        <p class = "col-md-12">In case of contamination, immediately inform </p>
                                        <p class = "col-md-12">Operations Director or Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf3"><?php Products::getValue('pro_exp0p1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "col-md-12">Aspirate media from the flasks and wash each one with 25ml of Wash Media. Aspirate Wash Media. </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf4"><?php Products::getValue('pro_exp0p1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add 10ml of Trypsin to each flask.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf5"><?php Products::getValue('pro_exp0p1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Incubate flasks for maximum 8-10 minutes at 37ºC.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf6"><?php Products::getValue('pro_exp0p1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Observe one or two flask under microscope if trypsin has detached cells from base of flask, if not, incubate flasks for extra 2-3 mins @ 37ºC</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf7"><?php Products::getValue('pro_exp0p1_perf7', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Neutralize trypsin action by adding 15ml of Complete Media without antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf8"><?php Products::getValue('pro_exp0p1_perf8', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Transfer cells from each flask to corresponding 50 ml conical tube</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf9"><?php Products::getValue('pro_exp0p1_perf9', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Wash each flask with 25ml of Wash Media and transfer it to the corresponding 50 ml conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf10"><?php Products::getValue('pro_exp0p1_perf10', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Centrifuge at 500xg for 10 minutes at room temperature with medium brake. (brake 5)</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf11"><?php Products::getValue('pro_exp0p1_perf11', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate supernatant leaving 2-3 ml to re-suspend the pellet.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf12"><?php Products::getValue('pro_exp0p1_perf12', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add up to 39 ml of Complete Media without antibiotics to each conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf13"><?php Products::getValue('pro_exp0p1_perf13', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Collect 100µl of each conical tube and make a pool for cell counting.</p>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn"> Cell count: </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp0p1_cellcount1" value = "<?php Products::getValue('pro_exp0p1_cellcount1', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">/ 4 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp0p1_cellcount2" value = "<?php Products::getValue('pro_exp0p1_cellcount2', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp0p1_cellcount3" value = "<?php Products::getValue('pro_exp0p1_cellcount3', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">x104 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp0p1_cellcount4" value = "<?php Products::getValue('pro_exp0p1_cellcount4', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden" type = "text" name = "pro_exp0p1_cellcount5" value = "<?php Products::getValue('pro_exp0p1_cellcount5', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">Total cells </label>
                                        </div>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Viability = VC / TC Xx100%= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp0p1_viability" value = "<?php Products::getValue('pro_exp0p1_viability', $sopdata) ?>">
                                            </label>
                                            <p class = "col-lg-12"> Collect 3ml from the supernatant for sterility testing. Label the sample as: <b>Unique ID +sterility/P0</b> Keep this sample as a backup. </p>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf14"><?php Products::getValue('pro_exp0p1_perf14', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Prepare 60 new flasks</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf15"><?php Products::getValue('pro_exp0p1_perf15', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute equally cells from each conical into 6 flasks (6.5ml of cells per flask)</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf16"><?php Products::getValue('pro_exp0p1_perf16', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Bring the total volume in each flask up to 25 ml with Complete Media without Antibiotics</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf17"><?php Products::getValue('pro_exp0p1_perf17', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> CO2 Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_incused" value = "<?php Products::getValue('pro_exp0p1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp0p1_endt" value = "<?php Products::getValue('pro_exp0p1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp0p1_perf18"><?php Products::getValue('pro_exp0p1_perf18', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding #1, P1</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P1 </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_celldate" value = "<?php Products::getValue('pro_feed1p1_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_prep" value = "<?php Products::getValue('pro_feed1p1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_exp" value = "<?php Products::getValue('pro_feed1p1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_bscaflow" value = "<?php Products::getValue('pro_feed1p1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf1"><?php Products::getValue('pro_feed1p1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_labutil" value = "<?php Products::getValue('pro_feed1p1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed1p1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_stdt" value = "<?php Products::getValue('pro_feed1p1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf2"><?php Products::getValue('pro_feed1p1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_nff" value = "<?php Products::getValue('pro_feed1p1_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf3"><?php Products::getValue('pro_feed1p1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_percon" value = "<?php Products::getValue('pro_feed1p1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf4"><?php Products::getValue('pro_feed1p1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf5"><?php Products::getValue('pro_feed1p1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_incused" value = "<?php Products::getValue('pro_feed1p1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p1_endt" value = "<?php Products::getValue('pro_feed1p1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p1_perf6"><?php Products::getValue('pro_feed1p1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding#2, P1</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 2, P1</p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_celldate" value = "<?php Products::getValue('pro_feed2p1_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_prep" value = "<?php Products::getValue('pro_feed2p1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_exp" value = "<?php Products::getValue('pro_feed2p1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed2p1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed2p1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_bscaflow" value = "<?php Products::getValue('pro_feed2p1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_pref1"><?php Products::getValue('pro_feed2p1_pref1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_labutil" value = "<?php Products::getValue('pro_feed2p1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed2p1_vsp"  <?php
                                            if ((Products::getCheckValue('pro_feed2p1_vsp', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_stdt" value = "<?php Products::getValue('pro_feed2p1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_pref2"><?php Products::getValue('pro_feed2p1_pref2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" value = "<?php Products::getValue('undefined', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_nff"><?php Products::getValue('pro_feed2p1_nff', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_percon" value = "<?php Products::getValue('pro_feed2p1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_pref3"><?php Products::getValue('pro_feed2p1_pref3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_pref4"><?php Products::getValue('pro_feed2p1_pref4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_incused" value = "<?php Products::getValue('pro_feed2p1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p1_endt" value = "<?php Products::getValue('pro_feed2p1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p1_pref5"><?php Products::getValue('pro_feed2p1_pref5', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding#3, P1 <span>(if needed) </span></h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 3, P1</p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_celldate" value = "<?php Products::getValue('pro_feed3p1_celldate', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_prep" value = "<?php Products::getValue('pro_feed3p1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_exp" value = "<?php Products::getValue('pro_feed3p1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed3p1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed3p1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_bscaflow"  <?php
                                                    if ((Products::getCheckValue('pro_feed3p1_bscaflow', $sopdata)) == "on") {
                                                        echo 'checked="checked" ';
                                                    }
                                                    ?>>
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p1_perf1"><?php Products::getValue('pro_feed3p1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_labutil" value = "<?php Products::getValue('pro_feed3p1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed3p1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed3p1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_stdt" value = "<?php Products::getValue('pro_feed3p1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p1_perf2"><?php Products::getValue('pro_feed3p1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_nff" value = "<?php Products::getValue('pro_feed3p1_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name="pro_feed3p1_perf3"><?php Products::getValue('pro_feed3p1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_percon" value = "<?php Products::getValue('pro_feed3p1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p1_perf4"><?php Products::getValue('pro_feed3p1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p1_perf5"><?php Products::getValue('pro_feed3p1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_inused" value = "<?php Products::getValue('pro_feed3p1_inused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed3p1_endt" value = "<?php Products::getValue('pro_feed3p1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed3p1_perf6"><?php Products::getValue('pro_feed3p1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Expansion P1 to P2 (SET 1) </h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "19" height = "100"><p class = "col-md-12">Expansion
                                            (P1 to P2) </p>
                                        <p class = "col-md-12"><b>SET 1 of P1 harvest</b></p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_day" value = "<?php Products::getValue('pro_exp1p2_set1_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Wash Media </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_prep1" value = "<?php Products::getValue('pro_exp1p2_set1_prep1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_exp1" value = "<?php Products::getValue('pro_exp1p2_set1_exp1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics</p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_prep2" value = "<?php Products::getValue('pro_exp1p2_set1_prep2', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_exp2" value = "<?php Products::getValue('pro_exp1p2_set1_exp2', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_exp1p2_set1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_exp1p2_set1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_bscaflow" value = "<?php Products::getValue('pro_exp1p2_set1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf1"><?php Products::getValue('pro_exp1p2_set1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_labutil" value = "<?php Products::getValue('pro_exp1p2_set1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_exp1p2_set1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_exp1p2_set1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_stdt" value = "<?php Products::getValue('pro_exp1p2_set1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf2"><?php Products::getValue('pro_exp1p2_set1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn"> Take</label>
                                        <label class = "btn">
                                            <input class = "mrg-hidden xs-input" type = "text" name = "pro_exp1p2_set1_take" value = "<?php Products::getValue('pro_exp1p2_set1_take', $sopdata) ?>">
                                        </label>
                                        <label class = "btn"># of  flasks out of 60 flasks, for harvesting</label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf3"><?php Products::getValue('pro_exp1p2_set1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_percon" value = "<?php Products::getValue('pro_exp1p2_set1_percon', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee. </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf4"><?php Products::getValue('pro_exp1p2_set1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flasks and wash each one with 25ml of Wash Media. Aspirate Wash Media.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf5"><?php Products::getValue('pro_exp1p2_set1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add 10ml of Trypsin to each flask.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf6"><?php Products::getValue('pro_exp1p2_set1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Incubate flasks for 8-10 minutes at 37?C.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf7"><?php Products::getValue('pro_exp1p2_set1_perf7', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Neutralize trypsin action by adding 15ml of Complete Media without antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf8"><?php Products::getValue('pro_exp1p2_set1_perf8', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Observe one or two flask under microscope if trypsin has detached cells from base of flask, if not, incubate flasks for extra 2-3 mins @ 37C</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf9"><?php Products::getValue('pro_exp1p2_set1_perf9', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Transfer cells from each flaks to one 50 ml conical tube</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf10"><?php Products::getValue('pro_exp1p2_set1_perf10', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Wash each flask with 25ml of Wash Media and transfer it to the corresponding 50ml conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf11"><?php Products::getValue('pro_exp1p2_set1_perf11', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Centrifuge at 500g for 10 minutes at room temperature. (brake 5)</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf12"><?php Products::getValue('pro_exp1p2_set1_perf12', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate supernatant leaving 2-3 ml to resuspend the pellet.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf13"><?php Products::getValue('pro_exp1p2_set1_perf13', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add up to 39 ml of Complete Media without antibiotics to each conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf14"><?php Products::getValue('pro_exp1p2_set1_perf14', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Collect 100?l of each conical tube and make a pool for cell counting.</p>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn"> Cell count: </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_cellcount1" value = "<?php Products::getValue('pro_exp1p2_set1_cellcount1', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">/ 4 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_cellcount2" value = "<?php Products::getValue('pro_exp1p2_set1_cellcount2', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_cellcount3" value = "<?php Products::getValue('pro_exp1p2_set1_cellcount3', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">x104 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_cellcount4" value = "<?php Products::getValue('pro_exp1p2_set1_cellcount4', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden" type = "text" name = "pro_exp1p2_set1_cellcount5" value = "<?php Products::getValue('pro_exp1p2_set1_cellcount5', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">Total cells </label>
                                        </div>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Viability = VC / TC Xx100%= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_viability" value = "<?php Products::getValue('pro_exp1p2_set1_viability', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf15"><?php Products::getValue('pro_exp1p2_set1_perf15', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">
                                        </p><div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Prepare 3 new flasks for each conical </label>
                                            <div class = "col-md-12 both-pad-hidden">
                                                <label class = "btn"> (3x </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_pfec1" value = "<?php Products::getValue('pro_exp1p2_set1_pfec1', $sopdata) ?>">
                                                </label>
                                                <label class = "btn"> # = </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_pfec2" value = "<?php Products::getValue('pro_exp1p2_set1_pfec2', $sopdata) ?>">
                                                </label>
                                                <label class = "btn">new flasks) </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set1_pfec3" value = "<?php Products::getValue('pro_exp1p2_set1_pfec3', $sopdata) ?>">
                                                </label>
                                            </div>
                                        </div>
                                        <p></p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf16"><?php Products::getValue('pro_exp1p2_set1_perf16', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells from each conical into 3 flasks (13ml of cells per flask).</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf17"<?php Products::getValue('pro_exp1p2_set1_perf17', $sopdata) ?>></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Bring the total volume in each flask up to 25 ml with Complete Media without Antibiotics</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf18"><?php Products::getValue('pro_exp1p2_set1_perf18', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_incused" value = "<?php Products::getValue('pro_exp1p2_set1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set1_endt" value = "<?php Products::getValue('pro_exp1p2_set1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set1_perf19"><?php Products::getValue('pro_exp1p2_set1_perf19', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Expansion P1 to P2 (SET 2) </h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "19" height = "100"><p class = "col-md-12">Expansion
                                            (P1 to P2) </p>
                                        <p class = "col-md-12"><b>SET 2 of P1 harvest</b></p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_day" value = "<?php Products::getValue('pro_exp1p2_set2_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Wash Media </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_prep1" value = "<?php Products::getValue('pro_exp1p2_set2_prep1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_exp1" value = "<?php Products::getValue('pro_exp1p2_set2_exp1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics</p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_prep2" value = "<?php Products::getValue('pro_exp1p2_set2_prep2', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_exp2" value = "<?php Products::getValue('pro_exp1p2_set2_exp2', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_exp1p2_set2_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_exp1p2_set2_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_bscaflow" value = "<?php Products::getValue('pro_exp1p2_set2_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf1"><?php Products::getValue('pro_exp1p2_set2_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_labutil" value = "<?php Products::getValue('pro_exp1p2_set2_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_exp1p2_set2_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_exp1p2_set2_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_stdt" value = "<?php Products::getValue('pro_exp1p2_set2_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf2"><?php Products::getValue('pro_exp1p2_set2_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn"> Take</label>
                                        <label class = "btn">
                                            <input class = "mrg-hidden xs-input" type = "text" name = "pro_exp1p2_set2_take" value = "<?php Products::getValue('pro_exp1p2_set2_take', $sopdata) ?>">
                                        </label>
                                        <label class = "btn"># of  flasks out of 60 flasks, for harvesting</label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf3"><?php Products::getValue('pro_exp1p2_set2_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_percon" value = "<?php Products::getValue('pro_exp1p2_set2_percon', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee. </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf4"><?php Products::getValue('pro_exp1p2_set2_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flasks and wash each one with 25ml of Wash Media. Aspirate Wash Media.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf5"><?php Products::getValue('pro_exp1p2_set2_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add 10ml of Trypsin to each flask.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf6"><?php Products::getValue('pro_exp1p2_set2_perf6', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Incubate flasks for 8-10 minutes at 37?C.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf7"><?php Products::getValue('pro_exp1p2_set2_perf7', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Neutralize trypsin action by adding 15ml of Complete Media without antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf8"><?php Products::getValue('pro_exp1p2_set2_perf8', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Observe one or two flask under microscope if trypsin has detached cells from base of flask, if not, incubate flasks for extra 2-3 mins @ 37C</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf9"><?php Products::getValue('pro_exp1p2_set2_perf9', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Transfer cells from each flaks to one 50 ml conical tube</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf10"><?php Products::getValue('pro_exp1p2_set2_perf10', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Wash each flask with 25ml of Wash Media and transfer it to the corresponding 50ml conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf11"><?php Products::getValue('pro_exp1p2_set2_perf11', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Centrifuge at 500g for 10 minutes at room temperature. (brake 5)</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf12"><?php Products::getValue('pro_exp1p2_set2_perf12', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate supernatant leaving 2-3 ml to resuspend the pellet.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf13"><?php Products::getValue('pro_exp1p2_set2_perf13', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add up to 39 ml of Complete Media without antibiotics to each conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf14"><?php Products::getValue('pro_exp1p2_set2_perf14', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Collect 100?l of each conical tube and make a pool for cell counting.</p>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn"> Cell count: </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_cellcount1" value = "<?php Products::getValue('pro_exp1p2_set2_cellcount1', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">/ 4 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_cellcount2" value = "<?php Products::getValue('pro_exp1p2_set2_cellcount2', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_cellcount3" value = "<?php Products::getValue('pro_exp1p2_set2_cellcount3', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">x104 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_cellcount4" value = "<?php Products::getValue('pro_exp1p2_set2_cellcount4', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden" type = "text" name = "pro_exp1p2_set2_cellcount5" value = "<?php Products::getValue('pro_exp1p2_set2_cellcount5', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">Total cells </label>
                                        </div>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Viability = VC / TC Xx100%= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_viability" value = "<?php Products::getValue('pro_exp1p2_set2_viability', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf15"><?php Products::getValue('pro_exp1p2_set2_perf15', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">
                                        </p><div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Prepare 3 new flasks for each conical </label>
                                            <div class = "col-md-12 both-pad-hidden">
                                                <label class = "btn"> (3x </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_pfec1" value = "<?php Products::getValue('pro_exp1p2_set2_pfec1', $sopdata) ?>">
                                                </label>
                                                <label class = "btn"> # = </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_pfec2" value = "<?php Products::getValue('pro_exp1p2_set2_pfec2', $sopdata) ?>">
                                                </label>
                                                <label class = "btn">new flasks) </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set2_pfec3" value = "<?php Products::getValue('pro_exp1p2_set2_pfec3', $sopdata) ?>">
                                                </label>
                                            </div>
                                        </div>
                                        <p></p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf16"><?php Products::getValue('pro_exp1p2_set2_perf16', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells from each conical into 3 flasks (13ml of cells per flask).</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf17"><?php Products::getValue('pro_exp1p2_set2_perf17', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Bring the total volume in each flask up to 25 ml with Complete Media without Antibiotics</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf18"><?php Products::getValue('pro_exp1p2_set2_perf18', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_incused" value = "<?php Products::getValue('pro_exp1p2_set2_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set2_endt" value = "<?php Products::getValue('pro_exp1p2_set2_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set2_perf19"><?php Products::getValue('pro_exp1p2_set2_perf19', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Expansion P1 to P2 (SET 3) </h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "19" height = "100"><p class = "col-md-12">Expansion
                                            (P1 to P2) </p>
                                        <p class = "col-md-12"><b>SET 2 of P1 harvest</b></p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_day" value = "<?php Products::getValue('pro_exp1p2_set3_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Wash Media </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_prep1" value = "<?php Products::getValue('pro_exp1p2_set3_prep1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_exp1" value = "<?php Products::getValue('pro_exp1p2_set3_exp1', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics</p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_prep2" value = "<?php Products::getValue('pro_exp1p2_set3_prep2', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_exp2" value = "<?php Products::getValue('pro_exp1p2_set3_exp2', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_exp1p2_set3_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_exp1p2_set3_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_bscaflow" value = "<?php Products::getValue('pro_exp1p2_set3_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf1"><?php Products::getValue('pro_exp1p2_set3_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_labutil" value = "<?php Products::getValue('pro_exp1p2_set3_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_exp1p2_set3_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_exp1p2_set3_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_stdt" value = "<?php Products::getValue('pro_exp1p2_set3_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf2"><?php Products::getValue('pro_exp1p2_set3_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn"> Take</label>
                                        <label class = "btn">
                                            <input class = "mrg-hidden xs-input" type = "text" name = "pro_exp1p2_set3_take" value = "<?php Products::getValue('pro_exp1p2_set3_take', $sopdata) ?>">
                                        </label>
                                        <label class = "btn"># of  flasks out of 60 flasks, for harvesting</label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf3"><?php Products::getValue('pro_exp1p2_set3_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_percon" value = "<?php Products::getValue('pro_exp1p2_set3_percon', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee. </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf4"><?php Products::getValue('pro_exp1p2_set3_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flasks and wash each one with 25ml of Wash Media. Aspirate Wash Media.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf5"><?php Products::getValue('pro_exp1p2_set3_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add 10ml of Trypsin to each flask.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf6"><?php Products::getValue('pro_exp1p2_set3_perf6', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Incubate flasks for 8-10 minutes at 37?C.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf7"><?php Products::getValue('pro_exp1p2_set3_perf7', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Neutralize trypsin action by adding 15ml of Complete Media without antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf8"><?php Products::getValue('pro_exp1p2_set3_perf8', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Observe one or two flask under microscope if trypsin has detached cells from base of flask, if not, incubate flasks for extra 2-3 mins @ 37C</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf9"><?php Products::getValue('pro_exp1p2_set3_perf9', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Transfer cells from each flaks to one 50 ml conical tube</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf10"><?php Products::getValue('pro_exp1p2_set3_perf10', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Wash each flask with 25ml of Wash Media and transfer it to the corresponding 50ml conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf11"><?php Products::getValue('pro_exp1p2_set3_perf11', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Centrifuge at 500g for 10 minutes at room temperature. (brake 5)</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf12"><?php Products::getValue('pro_exp1p2_set3_perf12', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate supernatant leaving 2-3 ml to resuspend the pellet.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf13"><?php Products::getValue('pro_exp1p2_set3_perf13', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Add up to 39 ml of Complete Media without antibiotics to each conical tube.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf14"><?php Products::getValue('pro_exp1p2_set3_perf14', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Collect 100?l of each conical tube and make a pool for cell counting.</p>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn"> Cell count: </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_cellcount1" value = "<?php Products::getValue('pro_exp1p2_set3_cellcount1', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">/ 4 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_cellcount2" value = "<?php Products::getValue('pro_exp1p2_set3_cellcount2', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_cellcount3" value = "<?php Products::getValue('pro_exp1p2_set3_cellcount3', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">x104 x </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_cellcount4" value = "<?php Products::getValue('pro_exp1p2_set3_cellcount4', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden" type = "text" name = "pro_exp1p2_set3_cellcount5" value = "<?php Products::getValue('pro_exp1p2_set3_cellcount5', $sopdata) ?>">
                                            </label>
                                            <label class = "btn">Total cells </label>
                                        </div>
                                        <div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Viability = VC / TC Xx100%= </label>
                                            <label class = "btn">
                                                <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_viability" value = "<?php Products::getValue('pro_exp1p2_set3_viability', $sopdata) ?>">
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf15"><?php Products::getValue('pro_exp1p2_set3_perf15', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">
                                        </p><div class = "col-md-12 both-pad-hidden">
                                            <label class = "btn">Prepare 3 new flasks for each conical </label>
                                            <div class = "col-md-12 both-pad-hidden">
                                                <label class = "btn"> (3x </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_pfec1" value = "<?php Products::getValue('pro_exp1p2_set3_pfec1', $sopdata) ?>">
                                                </label>
                                                <label class = "btn"> # = </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_pfec2" value = "<?php Products::getValue('pro_exp1p2_set3_pfec2', $sopdata) ?>">
                                                </label>
                                                <label class = "btn">new flasks) </label>
                                                <label class = "btn">
                                                    <input class = "mrg-hidden  xs-input" type = "text" name = "pro_exp1p2_set3_pfec3" value = "<?php Products::getValue('pro_exp1p2_set3_pfec3', $sopdata) ?>">
                                                </label>
                                            </div>
                                        </div>
                                        <p></p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf16"><?php Products::getValue('pro_exp1p2_set3_perf16', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Divide and distribute cells from each conical into 3 flasks (13ml of cells per flask).</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf17"><?php Products::getValue('pro_exp1p2_set3_perf17', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Bring the total volume in each flask up to 25 ml with Complete Media without Antibiotics</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf18"><?php Products::getValue('pro_exp1p2_set3_perf18', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_incused" value = "<?php Products::getValue('pro_exp1p2_set3_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_exp1p2_set3_endt" value = "<?php Products::getValue('pro_exp1p2_set3_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_exp1p2_set3_perf19"><?php Products::getValue('pro_exp1p2_set3_perf19', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>











                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd"> Feeding#1, P2 (SET 1)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 1
                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_day" value = "<?php Products::getValue('pro_feed1p2_set1_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_prep" value = "<?php Products::getValue('pro_feed1p2_set1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_exp" value = "<?php Products::getValue('pro_feed1p2_set1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p2_set1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p2_set1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_bscaflow" value = "<?php Products::getValue('pro_feed1p2_set1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf1"><?php Products::getValue('pro_feed1p2_set1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_labutil" value = "<?php Products::getValue('pro_feed1p2_set1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p2_set1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed1p2_set1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_stdt" value = "<?php Products::getValue('pro_feed1p2_set1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf2"><?php Products::getValue('pro_feed1p2_set1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_nff" value = "<?php Products::getValue('pro_feed1p2_set1_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf3"><?php Products::getValue('pro_feed1p2_set1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_percon" value = "<?php Products::getValue('pro_feed1p2_set1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf4"><?php Products::getValue('pro_feed1p2_set1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf5"><?php Products::getValue('pro_feed1p2_set1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_incused" value = "<?php Products::getValue('pro_feed1p2_set1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set1_endt" value = "<?php Products::getValue('pro_feed1p2_set1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set1_perf6"><?php Products::getValue('pro_feed1p2_set1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>



                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Feeding#1, P2 (SET 2)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 2

                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_day" value = "<?php Products::getValue('pro_feed1p2_set2_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_prep" value = "<?php Products::getValue('pro_feed1p2_set2_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_exp" value = "<?php Products::getValue('pro_feed1p2_set2_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p2_set2_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p2_set2_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_bscaflow" value = "<?php Products::getValue('pro_feed1p2_set2_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf1"><?php Products::getValue('pro_feed1p2_set2_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_labutil" value = "<?php Products::getValue('pro_feed1p2_set2_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p2_set2_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed1p2_set2_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_stdt" value = "<?php Products::getValue('pro_feed1p2_set2_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf2"><?php Products::getValue('pro_feed1p2_set2_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_nff" value = "<?php Products::getValue('pro_feed1p2_set2_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf3"><?php Products::getValue('pro_feed1p2_set2_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_percon" value = "<?php Products::getValue('pro_feed1p2_set2_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf4"><?php Products::getValue('pro_feed1p2_set2_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf5"><?php Products::getValue('pro_feed1p2_set2_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_incused" value = "<?php Products::getValue('pro_feed1p2_set2_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set2_endt" value = "<?php Products::getValue('pro_feed1p2_set2_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set2_perf6"><?php Products::getValue('pro_feed1p2_set2_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>



                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Feeding#1, P2 (SET 3)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 3

                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_day" value = "<?php Products::getValue('pro_feed1p2_set3_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_prep" value = "<?php Products::getValue('pro_feed1p2_set3_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_exp" value = "<?php Products::getValue('pro_feed1p2_set3_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p2_set3_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p2_set3_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_bscaflow" value = "<?php Products::getValue('pro_feed1p2_set3_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf1"><?php Products::getValue('pro_feed1p2_set3_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_labutil" value = "<?php Products::getValue('pro_feed1p2_set3_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p2_set3_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed1p2_set3_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_stdt" value = "<?php Products::getValue('pro_feed1p2_set3_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf2"><?php Products::getValue('pro_feed1p2_set3_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_nff" value = "<?php Products::getValue('pro_feed1p2_set3_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf3"><?php Products::getValue('pro_feed1p2_set3_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_percon" value = "<?php Products::getValue('pro_feed1p2_set3_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf4"><?php Products::getValue('pro_feed1p2_set3_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf5"><?php Products::getValue('pro_feed1p2_set3_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_incused" value = "<?php Products::getValue('pro_feed1p2_set3_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_endt" value = "<?php Products::getValue('pro_feed1p2_set3_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf6"><?php Products::getValue('pro_feed1p2_set3_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>




                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Feeding#2, P2 (SET 1)<span> (if needed))</span></h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 1



                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_day" value = "<?php Products::getValue('pro_feed2p2_set1_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_prep" value = "<?php Products::getValue('pro_feed2p2_set1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_exp" value = "<?php Products::getValue('pro_feed2p2_set1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed2p2_set1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed2p2_set1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_bscaflow" value = "<?php Products::getValue('pro_feed2p2_set1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf1"><?php Products::getValue('pro_feed2p2_set1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_labutil" value = "<?php Products::getValue('pro_feed2p2_set1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed2p2_set1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed2p2_set1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_stdt" value = "<?php Products::getValue('pro_feed2p2_set1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf2"><?php Products::getValue('pro_feed2p2_set1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_nff" value = "<?php Products::getValue('pro_feed2p2_set1_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf3"><?php Products::getValue('pro_feed2p2_set1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_percon" value = "<?php Products::getValue('pro_feed2p2_set1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf4"><?php Products::getValue('pro_feed2p2_set1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf5"><?php Products::getValue('pro_feed2p2_set1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_incused" value = "<?php Products::getValue('pro_feed2p2_set1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set1_endt" value = "<?php Products::getValue('pro_feed2p2_set1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set1_perf6"><?php Products::getValue('pro_feed2p2_set1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>



                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Feeding#2, P2 (SET 2) <span> (if needed)</span></h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 2




                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_day" value = "<?php Products::getValue('pro_feed2p2_set2_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_prep" value = "<?php Products::getValue('pro_feed2p2_set2_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_exp" value = "<?php Products::getValue('pro_feed2p2_set2_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed2p2_set2_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed2p2_set2_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_bscaflow" value = "<?php Products::getValue('pro_feed2p2_set2_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf1"><?php Products::getValue('pro_feed2p2_set2_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_labutil" value = "<?php Products::getValue('pro_feed2p2_set2_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed2p2_set2_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_feed2p2_set2_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_stdt" value = "<?php Products::getValue('pro_feed2p2_set2_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf2"><?php Products::getValue('pro_feed2p2_set2_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_nff" value = "<?php Products::getValue('pro_feed2p2_set2_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf3"><?php Products::getValue('pro_feed2p2_set2_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_percon" value = "<?php Products::getValue('pro_feed2p2_set2_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf4"><?php Products::getValue('pro_feed2p2_set2_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf5"><?php Products::getValue('pro_feed2p2_set2_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_incused" value = "<?php Products::getValue('pro_feed2p2_set2_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed2p2_set2_endt" value = "<?php Products::getValue('pro_feed2p2_set2_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed2p2_set2_perf6"><?php Products::getValue('pro_feed2p2_set2_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>





                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">Feeding#2, P2 (SET 3)  <span> (if needed)</span></h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Cell feeding 1, P2
                                            SET 3




                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_day" value = "<?php Products::getValue('pro_feed1p2_set3_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_prep" value = "<?php Products::getValue('pro_feed1p2_set3_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_exp" value = "<?php Products::getValue('pro_feed1p2_set3_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_feed1p2_set3_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_feed1p2_set3_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_bscaflow" value = "<?php Products::getValue('pro_feed1p2_set3_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_pref1"><?php Products::getValue('pro_feed1p2_set3_pref1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_labutil" value = "<?php Products::getValue('pro_feed1p2_set3_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_feed1p2_set3_vsp_check" value = "<?php Products::getValue('pro_feed1p2_set3_vsp_check', $sopdata) ?>">
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_stdt" value = "<?php Products::getValue('pro_feed1p2_set3_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf2"><?php Products::getValue('pro_feed1p2_set3_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_nff" value = "<?php Products::getValue('pro_feed1p2_set3_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf3"><?php Products::getValue('pro_feed1p2_set3_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_percon" value = "<?php Products::getValue('pro_feed1p2_set3_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf4"><?php Products::getValue('pro_feed1p2_set3_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf5"><?php Products::getValue('pro_feed1p2_set3_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_incused" value = "<?php Products::getValue('pro_feed1p2_set3_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_feed1p2_set3_endt" value = "<?php Products::getValue('pro_feed1p2_set3_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_feed1p2_set3_perf6"><?php Products::getValue('pro_feed1p2_set3_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>







                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">FINAL HARVEST P2 (SET 1)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Final harvesting (P2)

                                            <b>Set 1 of P2 harvest</b>





                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_day" value = "<?php Products::getValue('pro_fhp2_set1_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_prep" value = "<?php Products::getValue('pro_fhp2_set1_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_exp" value = "<?php Products::getValue('pro_fhp2_set1_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_fhp2_set1_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_fhp2_set1_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_bscaflow" value = "<?php Products::getValue('pro_fhp2_set1_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf1"><?php Products::getValue('pro_fhp2_set1_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_labutil" value = "<?php Products::getValue('pro_fhp2_set1_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_fhp2_set1_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_fhp2_set1_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_stdt" value = "<?php Products::getValue('pro_fhp2_set1_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf2"><?php Products::getValue('pro_fhp2_set1_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_nff" value = "<?php Products::getValue('pro_fhp2_set1_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf3"><?php Products::getValue('pro_fhp2_set1_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_percon" value = "<?php Products::getValue('pro_fhp2_set1_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf4"><?php Products::getValue('pro_fhp2_set1_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf5"><?php Products::getValue('pro_fhp2_set1_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_incused" value = "<?php Products::getValue('pro_fhp2_set1_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set1_endt" value = "<?php Products::getValue('pro_fhp2_set1_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set1_perf6"><?php Products::getValue('pro_fhp2_set1_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>


                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">FINAL HARVEST P2 (SET 2)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Final harvesting (P2)

                                            <b>Set 2 of P2 harvest</b>





                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_day" value = "<?php Products::getValue('pro_fhp2_set2_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = "mrg-hidden" type = "text" name = "pro_fhp2_set2_prep" value = "<?php Products::getValue('pro_fhp2_set2_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_exp" value = "<?php Products::getValue('pro_fhp2_set2_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_fhp2_set2_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_fhp2_set2_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_bscaflow" value = "<?php Products::getValue('pro_fhp2_set2_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf1"><?php Products::getValue('pro_fhp2_set2_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_labutil" value = "<?php Products::getValue('pro_fhp2_set2_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_fhp2_set2_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_fhp2_set2_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_stdt" value = "<?php Products::getValue('pro_fhp2_set2_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf2"><?php Products::getValue('pro_fhp2_set2_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_nff" value = "<?php Products::getValue('pro_fhp2_set2_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf3"><?php Products::getValue('pro_fhp2_set2_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_percon" value = "<?php Products::getValue('pro_fhp2_set2_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf4"><?php Products::getValue('pro_fhp2_set2_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf5"><?php Products::getValue('pro_fhp2_set2_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_incused" value = "<?php Products::getValue('pro_fhp2_set2_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set2_endt" value = "<?php Products::getValue('pro_fhp2_set2_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set2_perf6"><?php Products::getValue('pro_fhp2_set2_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>



                        <div class = "col-xs-12 col-md-12 ">
                            <div class = "informations-box">
                                <h1 class = "Initial-hd">FINAL HARVEST P2 (SET 3)</h1>
                            </div>
                        </div>
                        <table class = "processing-table" border = "1" width = "100%">
                            <tbody><tr class = "processing-table-background">
                                    <th width = "23%"><h4 class = "mailn-processing-hadding">PROCESS</h4></th>
                                    <th width = "45%"><h4 class = "mailn-processing-hadding">ACTIVITY</h4></th>
                                    <th width = "17%"><h4 class = "mailn-processing-hadding">PERFORMED</h4></th>
                                </tr>
                                <tr>
                                    <td rowspan = "6" height = "100"><p class = "col-md-12">Final harvesting (P2)



                                            <b>Set 3 of P2 harvest</b>





                                        </p>
                                        <label class = "btn "> Day: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_day" value = "<?php Products::getValue('pro_fhp2_set3_day', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <p class = "col-md-12">following initial seeding. </p>
                                        <p class = "col-md-12 ">Complete Media without Antibiotics </p>
                                        <label class = "btn "> Prep: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_prep" value = "<?php Products::getValue('pro_fhp2_set3_prep', $sopdata) ?>">
                                            </div>
                                        </label>
                                        <label class = "btn "> Exp </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_exp" value = "<?php Products::getValue('pro_fhp2_set3_exp', $sopdata) ?>">
                                            </div>
                                        </label></td>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> BSC prepared for processing: </label>
                                            <label class = "btn both-pad-hidden">
                                                <input class = "checkbox-inline" type = "checkbox" name = "pro_fhp2_set3_bscprep_check"  <?php
                                                if ((Products::getCheckValue('pro_fhp2_set3_bscprep_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                yes </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> BSC Air Flow </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_bscaflow" value = "<?php Products::getValue('pro_fhp2_set3_bscaflow', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12 ">Assemble supplies and reagents in the BSC </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf1"><?php Products::getValue('pro_fhp2_set3_perf1', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn "> Laboratory utilized </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_labutil" value = "<?php Products::getValue('pro_fhp2_set3_labutil', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <input class = "checkbox-inline " type = "checkbox" name = "pro_fhp2_set3_vsp_check"  <?php
                                            if ((Products::getCheckValue('pro_fhp2_set3_vsp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Verify sanitization performed

                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn "> Start date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_stdt" value = "<?php Products::getValue('pro_fhp2_set3_stdt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf2"><?php Products::getValue('pro_fhp2_set3_perf2', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class = "btn "> Number of flasks fed: </label>
                                        <label class = "btn">
                                            <div class = "col-md-12">
                                                <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_nff" value = "<?php Products::getValue('pro_fhp2_set3_nff', $sopdata) ?>">
                                            </div></label></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf3"><?php Products::getValue('pro_fhp2_set3_perf3', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">Percent confluency: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_percon" value = "<?php Products::getValue('pro_fhp2_set3_percon', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <p class = "col-md-12">Look for signs of contamination
                                            In case of contamination, immediately inform Operations Director OR Designee </p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf4"><?php Products::getValue('pro_fhp2_set3_perf4', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><p class = "both-pad-hidden">Aspirate media from the flask and add 25 ml of Complete Culture Media without Antibiotics.</p></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf5"><?php Products::getValue('pro_fhp2_set3_perf5', $sopdata) ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><div class = "col-md-12">
                                            <label class = "btn ">CO<sub>2</sub> Incubator used: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_incused" value = "<?php Products::getValue('pro_fhp2_set3_incused', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div>
                                        <div class = "col-md-12">
                                            <label class = "btn ">End process date and time: </label>
                                            <label class = "btn">
                                                <div class = "col-md-12">
                                                    <input class = " mrg-hidden " type = "text" name = "pro_fhp2_set3_endt" value = "<?php Products::getValue('pro_fhp2_set3_endt', $sopdata) ?>">
                                                </div>
                                            </label>
                                        </div></td>
                                    <td><textarea class = "detail-content-form border-hidden" name = "pro_fhp2_set3_perf6"><?php Products::getValue('pro_fhp2_set3_perf6', $sopdata) ?></textarea></td>
                                </tr>
                            </tbody></table>
                        <?php
                        if (Yii::$app->user->can('reviewer')) {
                            ?>
                            <div class = "col-md-6">
                                <div class = "input-group btn-group-lg">
                                    <label class = "btn"> Review by: </label>
                                    <label class = "btn col-md">
                                        <input class = "mrg-hidden " type = "text" name = "50001_review_by" value = "<?php Products::getValue('50001_review_by', $sopdata) ?>" id="reviewed_by">
                                    </label>
                                </div>
                            </div>


                            <div class = "col-md-6">
                                <div class = "input-group btn-group-lg">
                                    <label class = "btn"> Date: </label>
                                    <label class = "btn col-md">
                                        <input class = " mrg-hidden datetimepicker4" type = "text" name = "50001_review_date" value = "<?php Products::getValue('50001_review_date', $sopdata) ?>">
                                    </label>
                                </div>

                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">
                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="50001_pro_comments" class="form-control rcom"><?php Products::getValue('50001_pro_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>

                    <div class = "clearfix"></div>
                </div>
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
                <?php
                ActiveForm::end();
                ?>








            </div>