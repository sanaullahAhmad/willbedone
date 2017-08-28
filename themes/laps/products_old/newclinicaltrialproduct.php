<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Products;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'SOP CMP 2.039 I';
?>


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
                    'action' => ['products/newclinicaltrialproduct']
        ]);
        ?>
        <div class="row text-center">
            <?php
            if ($approvedflag == 'true' || $productsopflag == 'true') {
                ?>
                <input type="text" name="product_MSCID" value="<?php echo $product->MSCID; ?>" class="mrg-hidden" disabled="disabled"> 
                <?php
            } else {
                ?>
                <input type="text" name="product_MSCID" value="<?php echo $product->MSCID; ?>" class="mrg-hidden"> 
                <?php
            }
            ?>

        </div>
        <h1 class="text-center ">CLINICAL TRIAL PRODUCT</h1>
        <h2 class="text-center text-primary">Request for Processing of Mesenchymal Stem Cell</h2> 
        <h3 class="text-danger text-center"> SECTION 1 TO 6 OF THIS FORM MUST BE COMPLETED BY CLINICAL COORDINATOR TEAM</h3>
        <br>
        <div class="row no-padding">
            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp ">
                <div class="panel-heading">
                    <div class="tools pull-right">
                        <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>   
                    </div>
                </div>
                <div id="announcement" class="panel-body no-padding-top">
                    <h2 class="text-center ">1. DONOR INFORMATION</h2>
                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                </div>
            </div>
        </div><!-- DONOR INFORMATION -->
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

                <div class="col-md-6 border-right-light">
                    <!-- Name -->
                    <div class="col-xs-12">

                        <div class="input-group ">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="icon-user text-transparent"></i></button>
                            </span>
                            <input type="text" class="form-control" placeholder="DONOR Full Name" required="" name="donor_name" value="<?php Products::getValue('donor_name', $sopdata) ?>">
                        </div><!-- /input-group -->

                    </div><!-- / Name -->
                    <!-- Email -->
                    <div class="col-xs-12">
                        <div class="input-group col-md-8 col-xs-12 no-padding-left">
                            <div class="col-xs-3 col-md-2">
                                <label class="btn">
                                    DOB
                                </label></div>
                            <div class="col-xs-3 col-md-3">
                                <select class="form-control di_dob_select" name="dob_month">
                                    <option value="<?php Products::getValue('dob_month', $sopdata) ?>"><?php Products::getValue('dob_month', $sopdata) ?></option>
                                    <option value="">Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <select class="form-control di_dob_select" name="dob_day">
                                    <option value="<?php Products::getValue('dob_day', $sopdata) ?>"><?php Products::getValue('dob_day', $sopdata) ?></option>
                                    <option value="">Day</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-xs-3 col-md-4">
                                <select class="form-control di_dob_select" name="dob_year">
                                    <option value="<?php Products::getValue('dob_year', $sopdata) ?>"><?php Products::getValue('dob_year', $sopdata) ?></option>
                                    <option value="Year">Year</option>
                                    <option value="2007">2016</option>
                                    <option value="2007">2015</option>
                                    <option value="2007">2014</option>
                                    <option value="2007">2013</option>
                                    <option value="2007">2012</option>
                                    <option value="2007">2011</option>
                                    <option value="2007">2010</option>
                                    <option value="2007">2009</option>
                                    <option value="2007">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                </select>
                            </div>

                        </div><!-- /input-group -->
                        <!-- input-group -->
                        <div class="input-group col-xs-12 col-md-4">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="icon-truck text-transparent"></i></button>
                            </span>
                            <input type="text" class="form-control" placeholder="Weight Kg" required="" name="weight" value="<?php Products::getValue('weight', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div><!-- / email -->
                    <!-- Password -->
                    <div class="col-xs-12 col-md-12 ">

                        <h4> This product is for the generation of :</h4>
                        <div class="input-group btn-group-lg">
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="autologous" <?php
                                if ((Products::getCheckValue('autologous', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>> Autologous
                            </label>
                            <label class="btn">
                                <input type="checkbox" class="checkbox-inline" name="allogeneic" <?php
                                if ((Products::getCheckValue('allogeneic', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>> Allogeneic
                            </label>

                        </div>
                    </div><!-- / password -->
                </div>
                <div class="col-md-6  "> <!-- Birthday -->
                    <div class="row">
                        <div class="input-group padding-left ">
                            <input type="text" class="form-control" placeholder="DONOR ID# " required="" name="donor_id" value="<?php Products::getValue('donor_id', $sopdata) ?>">
                        </div><!-- /input-group -->
                        <div class="input-group">
                            <div class="col-xs-3 col-md-3">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline" name="JMH" <?php
                                    if ((Products::getCheckValue('JMH', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> JMH
                                </label>
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline" name="UMH" <?php
                                    if ((Products::getCheckValue('UMH', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> UMH
                                </label>
                            </div>
                            <div class="col-xs-3 col-md-3">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline" name="VA" <?php
                                    if ((Products::getCheckValue('VA', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> VA
                                </label>
                            </div>
                            <div class="col-xs-3  col-md-3">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline" name="other" <?php
                                    if ((Products::getCheckValue('other', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Other
                                </label>
                            </div>
                        </div>
                    </div><!-- / birthday -->
                    <div class="row">

                        <div class="col-xs-1 col-md-1">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline" name="industry_name_check" <?php
                                if ((Products::getCheckValue('industry_name_check', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>> 
                            </label>
                        </div>
                        <div class="input-group col-xs-11 col-md-11">

                            <input type="text" class="form-control" placeholder="Industry Name" required="" name="industry_name" value="<?php Products::getValue('industry_name', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div><!-- / birthday -->
                    <div class="row">

                        <div class="col-xs-1 col-md-1">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="study_number_check" <?php
                                if ((Products::getCheckValue('study_number_check', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>> 
                            </label>
                        </div>
                        <div class="input-group col-xs-11 col-md-11">

                            <input type="text" class="form-control" placeholder="Study #" required="" name="study_number" value="<?php Products::getValue('study_number', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                </div>
                <div class="clear"></div>
            </div><!-- DONOR INFORMATION FIELDS -->

            <?php
            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                ?>
                <div class="row">
                    <h3>Comments</h3>
                </div>
                <div class="row">
                    <textarea rows="6" name="donor_comments" class="form-control rcom"><?php Products::getValue('donor_comments', $sopdata) ?></textarea>
                </div>
                <?php
            }
            ?>

            <div class="row no-padding">
                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp">
                    <div class="panel-heading">
                        <div class="tools pull-right">
                            <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>         
                        </div>
                    </div>
                    <div id="announcement" class="panel-body no-padding-top">
                        <h2 class="text-center ">2. TESTING OF RELEVANT COMMUNICABLE DISEASES</h2>
                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                    </div>
                </div>
            </div> <!-- TESTING OF RELEVANT COMMUNICABLE DISEASES -->


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


                    <div class="col-xs-12 col-md-4">
                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="HBsAg" <?php
                                if ((Products::getCheckValue('HBsAg', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>HBsAg 
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">
                            <input type="text" class="form-control" placeholder="" required="" name="HBsAg_comment" value="<?php Products::getValue('HBsAg_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="col-xs-12 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="HTLV" <?php
                                if ((Products::getCheckValue('HTLV', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>HTLV I/II   
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">
                            <input type="text" class="form-control" placeholder="" required="" name="HTLV_comment" value="<?php Products::getValue('HTLV_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="Treponema" <?php
                                if ((Products::getCheckValue('Treponema', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>Treponema <br>
                                Pallidum
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">
                            <input type="text" class="form-control" placeholder="(RPR--syphilis):" required="" name="Treponema_comment" value="<?php Products::getValue('Treponema_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="HBcAb" <?php
                                if ((Products::getCheckValue('HBcAb', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>HBcAb  
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">
                            <input type="text" class="form-control" placeholder="" required="" name="HBcAb_comment" value="<?php Products::getValue('HBcAb_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="HIV" <?php
                                if ((Products::getCheckValue('HIV', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>HIV 1/2   
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">
                            <input type="text" class="form-control" placeholder="" required="" name="HIV_comment" value="<?php Products::getValue('HIV_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">

                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="VDRL" <?php
                                if ((Products::getCheckValue('VDRL', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>VDRL 
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">

                            <input type="text" class="form-control" placeholder="" required="" name="VDRL_comment" value="<?php Products::getValue('VDRL_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">

                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="HCV" <?php
                                if ((Products::getCheckValue('HCV', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>HCV 
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">

                            <input type="text" class="form-control" placeholder="" required="" name="HCV_comment" value="<?php Products::getValue('HCV_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">

                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="CMV" <?php
                                if ((Products::getCheckValue('CMV', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>CMV 
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">

                            <input type="text" class="form-control" placeholder="" required="" name="CMV_comment" value="<?php Products::getValue('CMV_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">

                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="testing_of_relevant_communicable_diseases_other" <?php
                                if ((Products::getCheckValue('testing_of_relevant_communicable_diseases_other', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>Other 
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">

                            <input type="text" class="form-control" placeholder="" required="" name="testing_of_relevant_communicable_diseases_other_comment" value="<?php Products::getValue('testing_of_relevant_communicable_diseases_other_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-6 col-md-4">

                        <div class="col-xs-4 col-md-4">
                            <label class="btn btn-lg">
                                <input type="checkbox" class="checkbox-inline checkbox" name="WNV" <?php
                                if ((Products::getCheckValue('WNV', $sopdata)) == "on") {
                                    echo 'checked="checked" ';
                                }
                                ?>>WNV  
                            </label>
                        </div>
                        <div class="input-group col-xs-8 col-md-8">

                            <input type="text" class="form-control" placeholder="" required="" name="WNV_comment" value="<?php Products::getValue('WNV_comment', $sopdata) ?>">
                        </div><!-- /input-group -->
                    </div>


                </div> <!-- / Tests -->

                <?php
                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                    ?>
                    <div class="row">
                        <h3>Comments</h3>
                    </div>
                    <div class="row">
                        <textarea rows="6" name="torcd_comments" class="form-control rcom"><?php Products::getValue('torcd_comments', $sopdata) ?></textarea>
                    </div>
                    <?php
                }
                ?>

                <div class="row no-padding">
                    <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                        <div class="panel-heading">
                            <div class="tools pull-right">
                                <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>  
                            </div>
                        </div>
                        <div id="announcement" class="panel-body no-padding-top">
                            <h2 class="text-center ">3. DONOR ELIGIBILITY DETERMINATION</h2>
                            <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                        </div>

                    </div>

                </div> <!-- DONOR ELIGIBILITY DETERMINATION -->


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




                        <div class="row">

                            <div class="col-xs-12 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check1" <?php
                                    if ((Products::getCheckValue('ded_check1', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Check if all infectious disease markers are negative 
                                </label>
                            </div>
                            <div class="input-group col-xs-12 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input1" value="<?php Products::getValue('ded_input1', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check2" <?php
                                    if ((Products::getCheckValue('ded_check2', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Confirm CMV status of the IND:  Negative only     Negative or Positive 
                                </label>
                            </div>
                            <div class="input-group col-xs-12 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input2" value="<?php Products::getValue('ded_input2', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check3" <?php
                                    if ((Products::getCheckValue('ded_check3', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach copies of infectious disease test results (check when attached)
                                </label>
                            </div>
                            <div class="input-group col-xs-12 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input3" value="<?php Products::getValue('ded_input3', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check4" <?php
                                    if ((Products::getCheckValue('ded_check4', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach donor’s medical history (check when attached) 
                                </label>
                            </div>
                            <div class="input-group col-xs-12 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input4" value="<?php Products::getValue('ded_input4', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-6 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check5" <?php
                                    if ((Products::getCheckValue('ded_check5', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach donor’s social history (check when attached) 
                                </label>
                            </div>
                            <div class="input-group col-xs-6 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input5" value="<?php Products::getValue('ded_input5', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-6 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check6" <?php
                                    if ((Products::getCheckValue('ded_check6', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach donor eligibility questionnaire (check when attached)
                                </label>
                            </div>
                            <div class="input-group col-xs-6 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input6" value="<?php Products::getValue('ded_input6', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-6 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check7" <?php
                                    if ((Products::getCheckValue('ded_check7', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach results of donor’s physical examination (check when attached) 
                                </label>
                            </div>
                            <div class="input-group col-xs-6 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input7" value="<?php Products::getValue('ded_input7', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-6 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check8" <?php
                                    if ((Products::getCheckValue('ded_check8', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> Attach donor’s consent (check when attached)
                                </label>
                            </div>
                            <div class="input-group col-xs-6 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input8" value="<?php Products::getValue('ded_input8', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-md-10">
                                <label class="btn btn-lg">
                                    <input type="checkbox" class="checkbox-inline checkbox" name="ded_check9" <?php
                                    if ((Products::getCheckValue('ded_check9', $sopdata)) == "on") {
                                        echo 'checked="checked" ';
                                    }
                                    ?>> In case of female donor, pregnancy test results (attached a copy of test results) 
                                </label>
                            </div>
                            <div class="input-group col-xs-6 col-md-2">

                                <input type="text" class="form-control" placeholder="" required="" name="ded_input9" value="<?php Products::getValue('ded_input9', $sopdata) ?>">
                            </div><!-- /input-group -->
                        </div>



                    </div> <!-- DONOR ELIGIBILITY DETERMINATION  -->

                    <?php
                    if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                        ?>
                        <div class="row">
                            <h3>Comments</h3>
                        </div>
                        <div class="row">
                            <textarea rows="6" name="ded_comments" class="form-control rcom"><?php Products::getValue('ded_comments', $sopdata) ?></textarea>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="row no-padding">
                        <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                            <div class="panel-heading">
                                <div class="tools pull-right">
                                    <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>                      	</div>
                            </div>
                            <div id="announcement" class="panel-body no-padding-top">
                                <h2 class="text-center ">4. REQUEST FOR PROCESSING</h2>
                                <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                            </div>

                        </div>

                    </div> <!-- 4. REQUEST FOR PROCESSING -->


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



                            <div class="col-md-6  border-right-light">
                                <h3>Product Type (Check one)</h3>    
                                <div class="col-xs-12 col-md-12 ">

                                    <label class="btn btn-lg">
                                        <input type="checkbox" class="checkbox-inline" name="rfp_bone_marrow_aspirate" <?php
                                        if ((Products::getCheckValue('rfp_bone_marrow_aspirate', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>> Bone Marrow Aspirate (Iliac Crest): 
                                    </label>
                                    <div class="input-group btn-group-lg padding-left">
                                        <label class="btn padding-left">
                                            <input type="checkbox" class="checkbox-inline" name="rfp_filtered" <?php
                                            if ((Products::getCheckValue('rfp_filtered', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>> Filtered
                                        </label>
                                        <label class="btn">
                                            <input type="checkbox" class="checkbox-inline" name="rfp_unfiltered" <?php
                                            if ((Products::getCheckValue('rfp_unfiltered', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>> Un filtered
                                        </label>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-6 col-md-6">
                                        <label class="btn btn-lg">
                                            <input type="checkbox" class="checkbox-inline checkbox" name="rfp_pt_anticipated_date_of_processing_check1" <?php
                                            if ((Products::getCheckValue('rfp_pt_anticipated_date_of_processing_check1', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>> Anticipated date of processing 
                                        </label>
                                    </div>
                                    <div class="input-group col-xs-6 col-md-6">
                                        <input type="text" class="form-control" placeholder="Anticipated date of processing " required="" name="rfp_pt_anticipated_date_of_processing_comment1" value="<?php Products::getValue('rfp_pt_anticipated_date_of_processing_comment1', $sopdata) ?>">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <div class="col-md-6  "> 

                                <h3>Processing Request (check all that apply)</h3>
                                <div class="row">

                                    <div class="input-group">
                                        <div class="col-xs-12 col-md-12">
                                            <label class="btn btn-lg">
                                                <input type="checkbox" class="checkbox-inline" name="rfp_mononuclear_cell_enrichment"  <?php
                                                if ((Products::getCheckValue('rfp_mononuclear_cell_enrichment', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>> Mononuclear cell enrichment
                                            </label>
                                        </div>
                                        <div class="col-xs-12 col-md-112">
                                            <label class="btn btn-lg">
                                                <input type="checkbox" class="checkbox-inline" name="rfp_msc_culture_expansion" <?php
                                                if ((Products::getCheckValue('rfp_msc_culture_expansion', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>> MSC Culture &amp; Expansion
                                            </label>
                                        </div>


                                    </div>
                                </div><!-- / birthday -->
                                <div class="row">

                                    <div class="col-xs-6 col-md-2">
                                        <label class="btn btn-lg">
                                            <input type="checkbox" class="checkbox-inline" name="rfp_request_for_processing_other" <?php
                                            if ((Products::getCheckValue('rfp_request_for_processing_other', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>Others
                                        </label>
                                    </div>
                                    <div class="input-group col-xs-6 col-md-10">
                                        <input type="text" class="form-control" placeholder="" required="" name="rfp_request_for_processing_other_comment" value="<?php Products::getValue('rfp_request_for_processing_other_comment', $sopdata) ?>">
                                    </div><!-- /input-group -->
                                </div><!-- / birthday -->
                                <div class="row">

                                    <div class="col-xs-6 col-md-6">
                                        <label class="btn btn-lg">
                                            <input type="checkbox" class="checkbox-inline checkbox" name="rfp_pr_anticipated_date_of_processing_check" <?php
                                            if ((Products::getCheckValue('rfp_pr_anticipated_date_of_processing_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>> Anticipated date of processing 
                                        </label>
                                    </div>
                                    <div class="input-group col-xs-6 col-md-6">

                                        <input type="text" class="form-control" placeholder="Anticipated date of processing " required="" name="rfp_pr_process_request_anticipated_date_of_processing_comment" value="<?php Products::getValue('rfp_pr_process_request_anticipated_date_of_processing_comment', $sopdata) ?>">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div><!-- 4. REQUEST FOR PROCESSING FIELDS -->

                        <?php
                        if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                            ?>
                            <div class="row">
                                <h3>Comments</h3>
                            </div>
                            <div class="row">
                                <textarea rows="6" name="rfp_comments" class="form-control rcom"><?php Products::getValue('rfp_comments', $sopdata) ?></textarea>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="row no-padding">
                            <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                <div class="panel-heading">
                                    <div class="tools pull-right">
                                        <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>                      	</div>
                                </div>
                                <div id="announcement" class="panel-body no-padding-top">
                                    <h2 class="text-center ">5. LENGTH OF STORAGE</h2>
                                    <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                </div>

                            </div>

                        </div> <!-- 5. LENGTH OF STORAGE -->


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


                                <div class="row">

                                    <div class="col-xs-12 col-md-12 ">
                                        <label class="btn btn-lg">
                                            <input class="checkbox-inline" type="checkbox" name="los_rft_check" <?php
                                            if ((Products::getCheckValue('los_rft_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Release for transplant </label>

                                        <div class="sub-list">
                                            <label class="btn btn-lg">
                                                <input class="checkbox-inline" type="checkbox" name="los_rft_ifp_check" <?php
                                                if ((Products::getCheckValue('los_rft_ifp_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                Immediately following processing (fresh product) </label>
                                            <label class="btn btn-lg">
                                                <input class="checkbox-inline" type="checkbox" name="los_rft_twp_check" <?php
                                                if ((Products::getCheckValue('los_rft_twp_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                Thawed/washed product: </label>
                                            <label class="btn btn-lg">
                                                <input class="checkbox-inline" type="checkbox" name="los_rft_other_check" <?php
                                                if ((Products::getCheckValue('los_rft_other_check', $sopdata)) == "on") {
                                                    echo 'checked="checked" ';
                                                }
                                                ?>>
                                                Other (specify): </label>
                                            <label class="btn">
                                                <input class="mrg-hidden" type="text" name="los_rft_other_comment" value="<?php Products::getValue('los_rft_other_comment', $sopdata) ?>">
                                            </label>
                                        </div>
                                        <label class="btn btn-lg">
                                            <input class="checkbox-inline" type="checkbox" name="los_rft_styfp_check" <?php
                                            if ((Products::getCheckValue('los_rft_styfp_check', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>>
                                            Store for 2 years following processing </label>

                                    </div>


                                </div>
                            </div><!-- 5. LENGTH OF STORAGE -->

                            <?php
                            if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                ?>
                                <div class="row">
                                    <h3>Comments</h3>
                                </div>
                                <div class="row">
                                    <textarea rows="6" name="los_comments" class="form-control rcom"><?php Products::getValue('los_comments', $sopdata) ?></textarea>
                                </div>
                                <?php
                            }
                            ?>


                            <div class="row no-padding">
                                <div class="panel panel-gray-solid panel-body-only animated-med-delay fadeInUp downarrowdiv">
                                    <div class="panel-heading">
                                        <div class="tools pull-right">
                                            <a href="#" class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>                      	</div>
                                    </div>
                                    <div id="announcement" class="panel-body no-padding-top">
                                        <h2 class="text-center ">6. DONOR ELIGIBILITY CONFIRMATION</h2>
                                        <div class="add-arrow-down-left animated-med-delay fadeInUp"></div>
                                    </div>

                                </div>

                            </div><!-- 5. LENGTH OF STORAGE -->
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



                                    <p>Based on the results of screening, testing, and specific IND’s inclusion-exclusion criteria, the donor is determined to be
                                    </p>
                                    <div class="row">
                                        <label class="btn btn-lg">
                                            <input type="checkbox" class="checkbox-inline checkbox" name="dec_eligible" <?php
                                            if ((Products::getCheckValue('dec_eligible', $sopdata)) == "on") {
                                                echo 'checked="checked" ';
                                            }
                                            ?>> Eligible
                                        </label>
                                    </div>
                                    <div class="row text-center italic">
                                        This is to certify that (1) this donor eligibility determination has been made in accordance with current federal regulations and (2) infectious disease testing was performed by a laboratory certified to perform such testing on human specimens under the CLIA or that has met equivalent requirements as determined by CMS.
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <label class="btn btn-lg">
                                            Requesting Physician
                                        </label> 
                                        <input type="text" class="form-control" placeholder="Requesting Physician " required="" name="requesting_physician" value="<?php Products::getValue('requesting_physician', $sopdata) ?>">
                                    </div><!-- /input-group -->
                                    <div class="input-group ">

                                        <input type="checkbox" class="form-control" required="" name="requesting_physician_signed" <?php
                                        if ((Products::getCheckValue('requesting_physician_signed', $sopdata)) == "on") {
                                            echo 'checked="checked" ';
                                        }
                                        ?>>Requesting Physician signed
                                    </div><!-- /input-group -->
                                </div><!-- 5. LENGTH OF STORAGE -->

                                <?php
                                if (Yii::$app->user->can('reviewer') || $approvedflag == 'true') {
                                    ?>
                                    <div class="row">
                                        <h3>Comments</h3>
                                    </div>
                                    <div class="row">
                                        <textarea rows="6" name="dec_comments" class="form-control rcom"><?php Products::getValue('dec_comments', $sopdata) ?></textarea>
                                    </div>
                                    <?php
                                }
                                ?>


                                <input type="hidden" value="<?php echo $product_sop_id; ?>" name="product_sop_id" id="product_sop_id">

                            </div>
                            <?php
                            if ($flag == "false") {
                                ?>


                                <div class="row">
                                    <h2>Attached Files</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <h5>Sr. #</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <h5>File</h5>
                                    </div>
                                    <?php
                                    if (Yii::$app->user->can('lab-staff') && $productsopflag == 'false') {
                                        ?>
                                        <div class="col-md-6">
                                            <h5>Options</h5>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div>&nbsp;</div>
                                <?php
                            } else {
                                ?>
                                <div class="row">
                                    <h2>No Files Attached!</h2>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            $count = 1;
                            if ($flag == "true") {
                                
                            } else {
                                foreach ($model as $m) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-1 upfiles">
                                            <?php echo $count; ?>
                                        </div>
                                        <div class="col-md-5 upfiles">
                                            <a href="<?php echo $m->file_url; ?>" target="_blank"><?php echo $m->file_name; ?></a>
                                        </div>
                                        <?php
                                        if (Yii::$app->user->can('lab-staff') && $productsopflag == 'false' || $approvedflag == 'true') {
                                            ?>
                                            <div class="col-md-6 upfiles">
                                                <?= Html::a('Delete', Url::to(['products/deleteuploadedfile', 'id' => $m->id]), ['class' => 'btn btn-primary']) ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div>&nbsp;</div>
                                    <?php
                                    $count++;
                                }
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

                            <?php
                            if ($productsopflag == 'true' || $approvedflag == 'true') {
                                
                            } else {
                                ?>
                                <div class="row">
                                    <?=
                                    FileUploadUI::widget([
                                        'model' => new frontend\models\ProductFiles,
                                        'attribute' => 'file_url',
                                        'url' => ['products/fileupload', 'product_id' => $product_id],
                                        'gallery' => false,
                                        'fieldOptions' => [
                                            'accept' => 'image/*, pdf, doc'
                                        ],
                                        'clientOptions' => [
                                            'maxFileSize' => 2000000
                                        ],
                                        // ...
                                        'clientEvents' => [
                                            'fileuploaddone' => 'function(e, data) {
                                    console.log(data);
                                }',
                                            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
                                        ],
                                    ]);
                                    ?>
                                </div>

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




