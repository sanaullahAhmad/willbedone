<?php
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga- Hire Architect';
?>
<div class="slide-oinner"> <img src="<?php echo $themeUrl;?>/img/steps-banner1.jpg" width="100%" class="rs-hidden" style="margin-bottom:100px">
    <div class="slide-inner-contant steps-inner-contant"> <img src="<?php echo $themeUrl;?>/img/man-icon-step.png">
        <h1 class="steps-mail-hadding"> I need a Contractor</h1>
        <p class="steps-mainhadding-content">Once you have your designs finalized, it is time to find a good, trust-worthy contractor for your project. The right contractor can make<br/>
            the process of building your project fun and hasselfree, where as a bad contractor can make the process a complete <br/>
            headache.
            Don't worry, we  have you covered. </p>
        <button type="button" class="btn btn-info contractor-step-btn" style="min-width:15%; margin-top:15px; background-color:#ef5350; padding: 12px 28px; font-weight:bold; text-transform:uppercase" id="get_started_btn">Lets Get Started</button>
    </div>
</div>
<div class="container" style="display:none; margin-top:10%" id="main_tabs_form_content">
    <div class="row">
        <div class="process">
            <div class="process-row nav nav-tabs contractor-steps-tabs">
                <div class="process-step">
                    <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><!--<img src="<?php echo $themeUrl;?>/img/checked-icon.png">--> Step 1</button>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle secondsteptab disabledTab" data-toggle="tab" href="#menu2"> Step 2</button>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle thirdsteptab disabledTab" data-toggle="tab" href="#menu3">Step 3</button>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle fourthsteptab disabledTab" data-toggle="tab" href="#menu4">Step 4</button>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle disabledTab" data-toggle="tab" href="#menu5">ITS DONE</button>
                </div>
            </div>
        </div>
        <form id="contractor-form-cont" action="#">
            <div class="tab-content tab-content-steps">
                <div id="menu1" class="tab-pane fade active in steps-taps-pane"> <img src="<?php echo $themeUrl;?>/img/map-icon.png">
                    <h3>Select Location</h3>
                    <p>Great!  A house is a life time investment. One should be careful. Great!  A house is a life time investment.<br/>
                        One should be careful. Great!  A house is a life time investment. </p>
                    <div class="col-lg-12 select-location">
                        <select class="selectpicker is_required" name="location">
                            <option value="">Select Location</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="rawalpindi">Rawalpindi</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="faisalabad">Faisalabad</option>
                            <!--<option value="other">Other</option>-->
                        </select>
                        <input type="text" placeholder="Please Specify" class="other-feild others_input" id="other_location" style="display:none">
                    </div>

                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn first-next-step">NEXT STEP </button>
                        </li>
                    </ul>
                </div>
                <div id="menu2" class="tab-pane fade steps-taps-pane"> <img src="<?php echo $themeUrl;?>/img/size-icon.png">
                    <h3>Project Scope</h3>
                    <p>This section deals with what you would like to get constructed. Please select the best responses: </p>
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">You would like a Contractor for a <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox1" value="new-construction"  name="hire-type">
                                    <label for="inlineCheckbox1"> New Construction</label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox2" value="renovation"  name="hire-type">
                                    <label for="inlineCheckbox2">Renovation</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">What type of project are you building? <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox4" value="house"  name="project-type">
                                    <label for="inlineCheckbox4"> House </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox5" value="farm-house"  name="project-type">
                                    <label for="inlineCheckbox5">Farm House </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox6"  value="interior-design"  name="project-type">
                                    <label for="inlineCheckbox6">Interior Design Project </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox"  id="inlineCheckbox7" value="commercial-building"  name="project-type">
                                    <label for="inlineCheckbox7">Commercial Building </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox"  id="inlineCheckbox8" value="other"  name="project-type">
                                    <label for="inlineCheckbox8">Other (Please Specify) <input type="text" class="other-feild others_input" id="other_project_type" style="display:none"> </label>

                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">Do you already have the drawings for your project? <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox10" value="yes"  name="drawings">
                                    <label for="inlineCheckbox10"> Yes</label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox11" value="no"  name="drawings">
                                    <label for="inlineCheckbox11">No  (Please note it might add to the overall costs and increase your budget) </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">What is the size of your plot? <span class="custom_required_error">required *</span> </h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox12" value="5-marla"  name="plot-area">
                                    <label for="inlineCheckbox12"> 5 Marla </label>
                                </div>
                                <!--<div class="checkbox checkbox-success checkbox-inline contractor-check">
                                  <input  class="CB2RBVehicles"type="checkbox" id="inlineCheckbox13" value="7-marla"  name="plot-area">
                                  <label for="inlineCheckbox13">7 Marla </label>
                                </div>-->
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox14" value="10-marla" name="plot-area">
                                    <label for="inlineCheckbox14">10 Marla </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox"  id="inlineCheckbox15" value="1-kanal" name="plot-area">
                                    <label for="inlineCheckbox15">1 Kanal </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox"  id="inlineCheckbox16" value="2-kanal" name="plot-area">
                                    <label for="inlineCheckbox16">2 Kanal </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox"  id="inlineCheckbox17" value="other" name="plot-area">
                                    <label for="inlineCheckbox17">Other (Please specify) <input type="text" class="other-feild others_input" id="other_plot_size" style="display:none"></label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">Do you know the size of the building you would like to construct? <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox66" value="yes"  name="building-size">
                                    <label for="inlineCheckbox66">Yes (then specify in SFT) <input type="text" class="other-feild others_input" id="other_building_size" style="display:none"></label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input type="checkbox" id="inlineCheckbox19" value="no"  name="building-size">
                                    <label for="inlineCheckbox19">No</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope fieldset-services-box">
                                <h3 class="scope-hadding">What services would you like to hire for? <span class="custom_required_error">required *</span></h3>
                                <div class="col-md-6 services-box"> <img src="<?php echo $themeUrl;?>/img/van-icon.png">
                                    <p>(You want the Contractor to buy <br/>
                                        the materials for the project)</p>
                                    <div class="col-md-12 services-btn">
                                        <a href="#" class="services-box-btn">With Materials</a>
                                    </div>
                                </div>

                                <div class="col-md-6 services-box"> <img src="<?php echo $themeUrl;?>/img/labor-icon.png">
                                    <p>(You want to buy your own materials and <br/>
                                        only pay the contractor his labor)</p>
                                    <div class="col-md-12 services-btn">
                                        <a href="#" class="services-box-btn">at labor rate</a>
                                    </div>
                                </div>
                            </fieldset>
                        </div>


                    </div>
                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-default prev-step back-btn"> Back</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn second-next-step">NEXT STEP </button>
                        </li>
                    </ul>
                </div>
                <div id="menu3" class="tab-pane fade steps-taps-pane"> <img src="<?php echo $themeUrl;?>/img/note-icon.png">
                    <h3>Budget & Time Estimation</h3>
                    <p>Please select the quality of materials that you would like to use for your project. It does not have <br/>
                        to be exact and you can always change it later. Please note that the recommendations you will <br/>
                        receive will be based on your selection. </p>
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">Choose according to your budget: <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox22" value="luxury"  name="finish-type">
                                    <label for="inlineCheckbox22">Luxury Finishes $$$$ </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input  class="CB2RBVehicles"type="checkbox" id="inlineCheckbox23" value="premium"  name="finish-type">
                                    <label for="inlineCheckbox23">Premium Finishes $$$ </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox24" value="high-end"  name="finish-type">
                                    <label for="inlineCheckbox24">High end Finishes $$ </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox"  id="inlineCheckbox25" value="economy" name="finish-type">
                                    <label for="inlineCheckbox25">Economy Finishes C $ </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 text-left">
                            <fieldset class="fieldset-list fieldset-list-scope">
                                <h3 class="scope-hadding">When would you like to start the construction? <span class="custom_required_error">required *</span></h3>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox32" value="immediately"  name="start-time">
                                    <label for="inlineCheckbox32">Immediately </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input  class="CB2RBVehicles"type="checkbox" id="inlineCheckbox33" value="1-month"  name="start-time">
                                    <label for="inlineCheckbox33">Within 1 Month </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox" id="inlineCheckbox34" value="2-3-months"  name="start-time">
                                    <label for="inlineCheckbox34">2-3 Months </label>
                                </div>
                                <div class="checkbox checkbox-success checkbox-inline contractor-check">
                                    <input class="CB2RBVehicles" type="checkbox"  id="inlineCheckbox35" value="other" name="start-time">
                                    <label for="inlineCheckbox35">Other (Please specify) <input type="text" placeholder="Please Specify" class="other-feild others_input" id="other_start_time" style="display:none"> </label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-default prev-step back-btn">Back</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn third-next-step">NEXT STEP </button>
                        </li>
                    </ul>
                </div>
                <div id="menu4" class="tab-pane fade steps-taps-pane"> <img src="<?php echo $themeUrl;?>/img/search-icon.png">
                    <h3>Summary</h3>
                    <p>Almost there! Make sure your details look good and then give us your contact information so we <br/>
                        can connect you with the right people. </p>
                    <div class="summry-section col-md-12">
                        <div class="col-md-10 col-xs-offset-2">
                            <div class="col-md-10 summry-section-top">
                                <h4 class="summry-section-hadding">Select Location</h4>
                                <a data-toggle="tab" href="#menu1" class="summry-section-link first-link">Edit</a> </div>
                            <div class="summry-content">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>Your Location</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-location">Your Location</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="summry-section col-md-12">
                        <div class="col-md-10 col-xs-offset-2">
                            <div class="col-md-10 summry-section-top">
                                <h4 class="summry-section-hadding">Project Scope</h4>
                                <a data-toggle="tab" href="#menu2" class="summry-section-link second-link">Edit</a> </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>You would like a Contractor for a ?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-hire-type">New Construction</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>What type of project are you building?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-project-type">Farm House</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>Do you already have the drawings for your project?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-drawings">No</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>What is the size of your plot?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-plot-area">5 Marla</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>Do you know the size of the building you would like to construct?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-building-size">No</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>What services would you like to hire for?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-services-hiring">With materials</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="summry-section col-md-12">
                        <div class="col-md-10 col-xs-offset-2">
                            <div class="col-md-10 summry-section-top">
                                <h4 class="summry-section-hadding">Budget & Time Estimation</h4>
                                <a data-toggle="tab" href="#menu3" class="summry-section-link third-link">Edit</a> </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>Choose according to your budget:</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-finishing-type">Premium Finishes$$$</p>
                                </div>
                            </div>
                            <div class="summry-content col-md-12">
                                <div class="col-md-7 summry-section-bottom">
                                    <p>When would you like to start the construction?</p>
                                </div>
                                <div class="col-md-5 summry-section-bottom">
                                    <p class="dark-color" id="user-start-time">Within 1 Month </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-default prev-step back-btn"> Back</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn fourth-next-step">NEXT STEP </button>
                        </li>
                    </ul>
                </div>
                <div id="menu5" class="tab-pane fade steps-taps-pane"> <img src="<?php echo $themeUrl;?>/img/box-thing-icon.png">
                    <h3>Ready to meet your best match? </h3>
                    <p>Yaay its done! share your contact information so we can connect you with the right people, <br/>
                        architects and even facilitate a meeting if required. </p>
                    <div class="col-md-10 col-xs-offset-2">
                        <div class="col-md-10 contact-information">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="contact-information-main-hadding">Contact Information</h4>
                                </div>
                                <div class="col-md-6 contact-information-input">
                                    <input type="text" placeholder="Name" name="user_fullname" id="user_fullname" class="is_required">
                                </div>
                                <div class="col-md-6 contact-information-input">
                                    <input type="text" placeholder="Phone Number" name="user_phone" id="user_phone" class="is_required">
                                </div>
                                <div class="col-md-6 contact-information-input">
                                    <input type="text" placeholder="Email Address" name="user_email" id="user_email" class="is_required">
                                </div>
                                <div class="col-md-6 contact-information-input">
                                    <select class="selectpicker is_required" name="discover-source" id="discover-source">
                                        <option value="">How did you discover us?</option>
                                        <option value="reference">Reference</option>
                                        <option value="friends">Friends</option>
                                        <option value="google">Google</option>
                                        <option value="advertisement">Advertisement</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal thanks-modal fade" id="successPostingModel" role="dialog">
                        <div class="modal-dialog  thanks-modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header thanks-modal-header">
                                    <button type="button"  data-dismiss="modal"><img src="<?php echo $themeUrl;?>/img/close-icon.png"></button>
                                    <img src="<?php echo $themeUrl;?>/img/cong-icon.png">
                                    <h4 class="modal-title">Thanks for posting!</h4>
                                </div>
                                <div class="modal-body thanks-modal-body">
                                    <p>What happens next?</p>
                                    <ul>
                                        <li>1.  Sit back while we review your budget, scope and expert availability. </li>
                                        <li>2.  Our team will contact you and speak to you on the phone. </li>
                                        <li>3.  Relax, make a hot cup of chai and let us do all the hard work! </li>
                                        <li>4.  We are committed to building happiness in the construction industry!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-default prev-step back-btn"> Back</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn" id="submit-final-step">Submit</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<div class="footer" style=""> <img src="<?php echo $themeUrl;?>/img/footer-background.png" width="100%">

    <script>
    window.onload =function () {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
                $(this).toggleClass('open');
            }
        );
        //
        $('.btn-circle').on('click',function(){
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            $(this).addClass('btn-info').removeClass('btn-default').blur();
        });


        if( $("input[name='project-type']:checked").val()=='other'  ) {
            $('#other_project_type').show();
        } else {
            $('#other_project_type').hide();
        }

        if( $("input[name='start-time']:checked").val()=='other'  ) {
            $('#other_start_time').show();
        } else {
            $('#other_start_time').hide();
        }

        if( $("input[name='plot-area']:checked").val()=='other'  ) {
            $('#other_plot_size').show();
        } else {
            $('#other_plot_size').hide();
        }

        if( $("input[name='building-size']:checked").val()=='yes'  ) {
            $('#other_building_size').show();
        } else {
            $('#other_building_size').hide();
        }

        /*if( $("select[name='location'] option:selected").val()=='other'  ) {
         $('#other_location').show();
         } else {
         $('#other_location').hide();
         }*/

        /*new js following*/

        $("input:checkbox").change(function(){
            var group = ":checkbox[name='"+ $(this).attr("name") + "']";
            if($(this).is(':checked')){
                // removing required error style if it's checked
                // $(this).closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                $(this).closest('.fieldset-list').find('span.custom_required_error').hide();
                $(group).not($(this)).attr("checked",false);
            } else {
                // adding required error style if it's checked
                //  $(this).closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                $(this).closest('.fieldset-list').find('span.custom_required_error').show();
            }

            if( $(this).attr("name")=='project-type') {
                if( $(this).val()=='other' && $(this).is(':checked')  ) {
                    $('#other_project_type').show();
                } else {
                    $('#other_project_type').hide();
                }
            }

            if( $(this).attr("name")=='plot-area') {
                if( $(this).val()=='other' && $(this).is(':checked')  ) {
                    $('#other_plot_size').show();
                } else {
                    $('#other_plot_size').hide();
                }
            }

            if( $(this).attr("name")=='building-size') {
                if( $(this).val()=='yes' && $(this).is(':checked')  ) {
                    $('#other_building_size').show();
                } else {
                    $('#other_building_size').hide();
                }
            }

            if( $(this).attr("name")=='start-time') {
                if( $(this).val()=='other' && $(this).is(':checked')  ) {
                    $('#other_start_time').show();
                } else {
                    $('#other_start_time').hide();
                }
            }

        });

        $('select').on('change', function() {

            if ($(this).val() == ''){
                $(this).parent('.bootstrap-select').addClass('red-border');
                validation_error = true;
            } /*else if ($(this).val() == 'other'){
             $('#other_location').show();
             $(this).parent('.bootstrap-select').removeClass('red-border');
             }*/ else {
                $('#other_location').hide();
                $(this).parent('.bootstrap-select').removeClass('red-border');
            }
        })

        $('input:text').blur(function() {
            if ($(this).val() == '' && ! $(this).hasClass('others_input')) {
                $(this).addClass('red-border');
            } else {
                $(this).removeClass('red-border');
            }

            if( $(this).attr('name')=='user_email' && !banjaiga_validateEmail( $(this).val() ) ) {
                $(this).addClass('red-border');
            }

        });


        $('.next-step, .prev-step').on('click',function(e){
            validation_error = false;

            if ( $(e.target).hasClass('first-next-step') ) {
                $('button[href="#menu1"]').html('Step 1');
                $.each($(this).closest('.tab-pane').find('select.is_required'), function (e){
                    /*if ($(this).val() == '' || ( $(this).val() == 'other' && $('#other_location').val()=='' ))*/
                    if ($(this).val() == '')
                    {
                        $(this).parent('.bootstrap-select').addClass('red-border');
                        validation_error = true;
                    }else{
                        $(this).parent('.bootstrap-select').removeClass('red-border');
                    }
                });


                if(!validation_error) {
                    $('button[href="#menu1"]').html('<img src="<?php echo $themeUrl;?>/img/checked-icon.png"> Step 1');
                    $(".secondsteptab").removeClass('disabledTab');
                } else {

                    $('html, body').animate({
                        scrollTop: $('select[name="location"]').offset().top
                    });
                    $('button[href="#menu1"]').html('Step 1');
                    $(".secondsteptab, .thirdsteptab, .fourthsteptab").addClass('disabledTab');
                }


            }


            if ( $(e.target).hasClass('second-next-step') ) {

                if(!$("input[name='hire-type']").is(":checked")){
                    // $("input[name='hire-type']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='hire-type']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {
                    //$("input[name='hire-type']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                    $("input[name='hire-type']").closest('.fieldset-list').find('span.custom_required_error').hide();
                }

                if(!$("input[name='project-type']").is(":checked")){
                    //  $("input[name='project-type']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='project-type']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;

                } else {

                    if($("input[name='project-type']:checked").val()=='other' && $("#other_project_type").val()=='') {
                        // $("input[name='project-type']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                        $("input[name='project-type']").closest('.fieldset-list').find('span.custom_required_error').show();
                        // $("#other_project_type").addClass('red-border');
                        validation_error = true;
                    } else {
                        // $("input[name='project-type']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                        $("input[name='project-type']").closest('.fieldset-list').find('span.custom_required_error').hide();
                    }
                }

                if(!$("input[name='drawings']").is(":checked")){
                    // $("input[name='drawings']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='drawings']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {
                    // $("input[name='drawings']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                    $("input[name='drawings']").closest('.fieldset-list').find('span.custom_required_error').hide();
                }

                if(!$("input[name='plot-area']").is(":checked")){
                    // $("input[name='plot-area']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='plot-area']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {

                    if($("input[name='plot-area']:checked").val()=='other' && $("#other_plot_size").val()=='') {
                        // $("input[name='plot-area']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                        $("input[name='plot-area']").closest('.fieldset-list').find('span.custom_required_error').show();
                        // $("#other_plot_size").addClass('red-border');
                        validation_error = true;
                    } else {
                        // $("input[name='plot-area']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                        $("input[name='plot-area']").closest('.fieldset-list').find('span.custom_required_error').hide();
                    }

                }

                if(!$("input[name='building-size']").is(":checked")){
                    // $("input[name='building-size']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='building-size']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {

                    if($("input[name='building-size']:checked").val()=='yes' && $("#other_building_size").val()=='') {
                        // $("input[name='building-size']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                        $("input[name='building-size']").closest('.fieldset-list').find('span.custom_required_error').show();
                        // $("#other_building_size").addClass('red-border');
                        validation_error = true;
                    } else {
                        // $("input[name='building-size']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                        $("input[name='building-size']").closest('.fieldset-list').find('span.custom_required_error').hide();
                    }

                }

                if($('.fieldset-services-box').find('a.contractor-selected-service').length == 0) {
                    // $('.fieldset-services-box').find('h3.scope-hadding').addClass('red-border');
                    $('.fieldset-services-box').closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {
                    // $('.fieldset-services-box').find('h3.scope-hadding').removeClass('red-border');
                    $('.fieldset-services-box').closest('.fieldset-list').find('span.custom_required_error').hide();
                }


                if ( !validation_error ) {
                    $('button[href="#menu2"]').html('<img src="<?php echo $themeUrl;?>/img/checked-icon.png"> Step 2');
                    $(".secondsteptab, .thirdsteptab").removeClass('disabledTab');
                }	 else {
                    $(".thirdsteptab, .fourthsteptab").addClass('disabledTab');
                    $('button[href="#menu2"]').html('Step 2');
                }
            }



            if ( $(e.target).hasClass('third-next-step') ) {

                if(!$("input[name='finish-type']").is(":checked")){
                    //  $("input[name='finish-type']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='finish-type']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {
                    // $("input[name='finish-type']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                    $("input[name='finish-type']").closest('.fieldset-list').find('span.custom_required_error').hide();
                }

                if(!$("input[name='start-time']").is(":checked")){
                    // $("input[name='start-time']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                    $("input[name='start-time']").closest('.fieldset-list').find('span.custom_required_error').show();
                    validation_error = true;
                } else {
                    // $("input[name='start-time']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');

                    if($("input[name='start-time']:checked").val()=='other' && $("#other_start_time").val()=='') {
                        // $("input[name='start-time']").closest('.fieldset-list').find('h3.scope-hadding').addClass('red-border');
                        $("input[name='start-time']").closest('.fieldset-list').find('span.custom_required_error').show();
                        // $("#other_start_time").addClass('red-border');
                        validation_error = true;
                    } else {
                        // $("input[name='start-time']").closest('.fieldset-list').find('h3.scope-hadding').removeClass('red-border');
                        $("input[name='start-time']").closest('.fieldset-list').find('span.custom_required_error').hide();
                    }

                }



                if ( !validation_error ) {
                    $(".fourthsteptab").removeClass('disabledTab');
                    $('button[href="#menu3"]').html('<img src="<?php echo $themeUrl;?>/img/checked-icon.png"> Step 3');
                    $(".thirdsteptab").removeClass('disabledTab');
                    $(".summry-section-link").removeClass('btn-info');

                    $("#user-location").html($( "select[name='location'] option:selected" ).text());
                    $("#user-hire-type").html($("input[name='hire-type']:checked").next('label').text());

                    if($("input[name='project-type']:checked").val()=='other') {
                        $("#user-project-type").html("Other (Please Specify):   " + $('#other_project_type').val() + ' ');
                    } else {
                        $("#user-project-type").html($("input[name='project-type']:checked").next('label').text());
                    }


                    $("#user-drawings").html($("input[name='drawings']:checked").next('label').text());

                    if($("input[name='plot-area']:checked").val()=='other') {
                        $("#user-plot-area").html("Other (Please specify):   " + $('#other_plot_size').val() + ' ');
                    } else {
                        $("#user-plot-area").html($("input[name='plot-area']:checked").next('label').text());
                    }

                    if($("input[name='building-size']:checked").val()=='yes') {
                        $("#user-building-size").html("Yes (then specify in SFT):   " + $('#other_building_size').val() + ' ');
                    } else {
                        $("#user-building-size").html($("input[name='building-size']:checked").next('label').text());
                    }

                    $("#user-finishing-type").html($("input[name='finish-type']:checked").next('label').text());

                    if($("input[name='start-time']:checked").val()=='other') {
                        $("#user-start-time").html("Other (Please specify):   " + $('#other_start_time').val() + ' ');
                    } else {
                        $("#user-start-time").html($("input[name='start-time']:checked").next('label').text());
                    }

                    $("#user-services-hiring").html($("a.contractor-selected-service").text());

                } else {
                    $(".fourthsteptab").addClass('disabledTab');
                    $('button[href="#menu3"]').html('Step 3');
                }

            }



            if ( $(e.target).hasClass('fourth-next-step') ) {
                $('button[href="#menu4"]').html('<img src="<?php echo $themeUrl;?>/img/checked-icon.png"> Step 4');
                $(".fourthsteptab").removeClass('disabledTab');
            }


            if(!validation_error){
                var $activeTab = $('.tab-pane.active');

                $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

                if ( $(e.target).hasClass('next-step') )
                {

                    var nextTab = $activeTab.next('.tab-pane').attr('id');
                    $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
                    $('[href="#'+ nextTab +'"]').tab('show');

                    $('html, body').animate({
                        scrollTop: $('#'+ nextTab +'').offset()
                    });

                }
                else
                {

                    var prevTab = $activeTab.prev('.tab-pane').attr('id');
                    $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
                    $('[href="#'+ prevTab +'"]').tab('show');

                    $('html, body').animate({
                        scrollTop: $('#'+ prevTab +'').offset()
                    });
                }

            }
            else {

                $('html, body').animate({
                    scrollTop: $(".custom_required_error:visible").first().offset().top
                });

                $('button[href="#menu4"]').html('Step 4');
            }



        });

        $('a.services-box-btn').on('click',function(e){
            e.preventDefault();
            if($(this).hasClass('contractor-selected-service')) {
                $(this).removeClass('contractor-selected-service');
            } else {
                $('a.services-box-btn').removeClass('contractor-selected-service');
                $(this).addClass('contractor-selected-service');
            }

            if($('.fieldset-services-box').find('a.contractor-selected-service').length == 0) {
                // $('.fieldset-services-box').find('h3.scope-hadding').addClass('red-border');
                $('.fieldset-services-box').find('span.custom_required_error').show();
            } else {
                //	$('.fieldset-services-box').find('h3.scope-hadding').removeClass('red-border');
                $('.fieldset-services-box').find('span.custom_required_error').hide();
            }

        });

        $('.summry-section-link.first-link').on('click',function(e){
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            $('[href="#menu1"]').addClass('btn-info').removeClass('btn-default');
            $('[href="#menu1"]').tab('show');
            $('html, body').animate({
                scrollTop: $('#menu1').offset()
            });
            $('button[href="#menu4"]').html('Step 4');
        });

        $('.summry-section-link.second-link').on('click',function(e){
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            $('[href="#menu2"]').addClass('btn-info').removeClass('btn-default');
            $('[href="#menu2"]').tab('show');
            $('html, body').animate({
                scrollTop: $('#menu2').offset()
            });
            $('button[href="#menu4"]').html('Step 4');
        });

        $('.summry-section-link.third-link').on('click',function(e){
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            $('[href="#menu3"]').addClass('btn-info').removeClass('btn-default');
            $('[href="#menu3"]').tab('show');
            $('html, body').animate({
                scrollTop: $('#menu3').offset()
            });
            $('button[href="#menu4"]').html('Step 4');
        });


        $('#get_started_btn').on('click',function(e){
            $('.slide-oinner').fadeOut(500, function() {
                $('#main_tabs_form_content').fadeIn(500);
                $('html, body').animate({
                    scrollTop: $('#menu1').offset()
                });
            });
            //$('.slide-oinner').hide();
            //$('#main_tabs_form_content').show();
        });


        $('#submit-final-step').on('click',function(e){
            validation_error = false;

            if($("#user_fullname").val()==''){
                $("#user_fullname").addClass('red-border');
                validation_error = true;
            } else {
                $("#user_fullname").removeClass('red-border');
            }

            if($("#user_phone").val()==''){
                $("#user_phone").addClass('red-border');
                validation_error = true;
            } else {
                $("#user_phone").removeClass('red-border');
            }

            if($("#user_email").val()=='' || !banjaiga_validateEmail($("#user_email").val())){
                $("#user_email").addClass('red-border');
                validation_error = true;
            } else {
                $("#user_email").removeClass('red-border');
            }

            if($("#discover-source").val()==''){
                $("#discover-source").parent('.bootstrap-select').addClass('red-border');
                validation_error = true;
            } else {
                $("#discover-source").parent('.bootstrap-select').removeClass('red-border');
            }



            if(!validation_error){

                var url = "<?php $ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
                    echo $ssl[0];?>://<?php echo $_SERVER['SERVER_NAME'];?>/banjaiga/frontend/web/index.php?r=site/need-contractor-contact";

                var all_data = {
                    user_fullname: $("#user_fullname").val(),
                    user_phone: $("#user_phone").val(),
                    user_email: $("#user_email").val(),
                    discover_source: $( "#discover-source option:selected" ).text(),
                    location: $("#user-location").html(),
                    hire_type: $("#user-hire-type").html(),
                    project_type: $("#user-project-type").html(),
                    drawings: $("#user-drawings").html(),
                    plot_area: $("#user-plot-area").html(),
                    building_size: $("#user-building-size").html(),
                    finishing_type: $("#user-finishing-type").html(),
                    start_time: $("#user-start-time").html(),
                    services_hiring: $("#user-services-hiring").html()

                };


                $.ajax({
                    type: "POST",
                    url: url,
                    data: all_data,
                    dataType: 'json',
                    success: function (data)
                    {
                        var messageAlert = 'alert-' + data.type;
                        var messageText = data.message;

                        if (messageAlert && messageText) {
                            //alert(messageText);
                            $('button[href="#menu5"]').html('<img src="<?php echo $themeUrl;?>/img/checked-icon.png"> ITS DONE');
                            $('#successPostingModel').modal('show');
                            $('#contractor-form-cont')[0].reset();

                        }
                    }
                });

            } else {
                $('html, body').animate({
                    scrollTop: $(".is_required:visible").first().offset().top
                });
                $('button[href="#menu5"]').removeClass('btn-default');
                $('button[href="#menu5"]').addClass('btn-info');

            }

        });
    }
    function banjaiga_validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>
    <style>
        .disabledTab{
            pointer-events: none;
        }
        .red-border {
            border:1px solid red !important;
        }
    </style>