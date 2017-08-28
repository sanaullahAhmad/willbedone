<?php
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga- Hire Architect';
?>

<div class="how-works-section">
    <div class="container">
        <div class="row" style="margin-top:60px">
            <div class="col-lg-12 text-center">
                <h3 class="section-heading section-heading-cust-font how-works">How it works?</h3>
                <p class="section-subheading text-muted text-muted-cust-font">Everything You need to know about using Banjaiga: Below are four features that make us easy and intuitive to use.</p>
            </div>

        </div>
        <div class="row text-center how-works-options">
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="<?php echo $themeUrl;?>/img/one-stop-shop.png" >
                        </span>
                <h4 class="service-heading">One stop shop for construction </h4>
                <p class="text-muted">You choose a product or service you require for your project.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                           <img src="<?php echo $themeUrl;?>/img/professional-network.png" >
                        </span>
                <h4 class="service-heading">Professional Network</h4>
                <p class="text-muted">We magically activate our networks of Architects, contractors, service providers and match them with you.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="<?php echo $themeUrl;?>/img/buy-confidence.png" >
                        </span>
                <h4 class="service-heading">Buy wth confidence</h4>
                <p class="text-muted">We help you with selection and buying at great prices and make sure it get delivered on site.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="<?php echo $themeUrl;?>/img/customer-satisfaciton.png" >
                        </span>
                <h4 class="service-heading">Customer Satisfaction </h4>
                <p class="text-muted">We make it a very pleasant experience. You will just love to be part of it.</p>
            </div>
        </div>
    </div>

</div>

<div class="submit-requirments-section">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-sm-push-6">
                <div class="requirments-img"> <img class="content-layout-img" src="<?php echo $themeUrl;?>/img/submit-requirments.png" ></div>
            </div>

            <div class="col-sm-6 col-sm-pull-6 submit-requirments-content">
                <h4 class="service-heading service-heading-cust-font"> <img class="features-selected-tick" src="<?php echo $themeUrl;?>/img/checkbox-checked.png" >Sumbit your requirments</h4>
                <p class="text-muted text-muted-cust-font">Tell us about the project you're planning so we can match you with the right service providers or material suppliers for your project. You can do that by either calling us or using our website. It is that simple. </p>
            </div>

        </div>
    </div>
</div>

<div class="get-matched-section">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <img class="content-layout-img" src="<?php echo $themeUrl;?>/img/get-matched.png" >
            </div>

            <div class="col-sm-6 get-matched-content">
                <h4 class="service-heading service-heading-cust-font"> <img class="features-selected-tick" src="<?php echo $themeUrl;?>/img/checkbox-checked.png" >Get Matched</h4>
                <p class="text-muted text-muted-cust-font">Browse our recommendations, review their services, prices and products then we can schedule a time to arrange meeting with ones you like the best.</p>
            </div>



        </div>
    </div>
</div>

<div class="products-services-section">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-sm-push-6">
                <img class="content-layout-img" src="<?php echo $themeUrl;?>/img/products-services.png" >
            </div>

            <div class="col-sm-6 col-sm-pull-6 products-services-content">
                <h4 class="service-heading service-heading-cust-font"> <img class="features-selected-tick" src="<?php echo $themeUrl;?>/img/checkbox-checked.png" >Choose your products and services</h4>
                <p class="text-muted text-muted-cust-font">Receive and compare estimates from vendors and service providers before hiring your favourite and getting started on your project, with Banjaiga there to help throughout the process. </p>
            </div>

        </div>
    </div>

</div>

<div class="make-happen-section">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <img class="content-layout-img" src="<?php echo $themeUrl;?>/img/make-happen.png" >
            </div>

            <div class="col-sm-6">
                <h4 class="service-heading make-happen-content service-heading-cust-font"> <img class="features-selected-tick" src="<?php echo $themeUrl;?>/img/checkbox-checked.png" >We make it happen</h4>
                <p class="text-muted text-muted-cust-font">The moment you are ready, just let us know and we make it happen; from arranged meetings, negotiating prices, assisted buying of materials and delivery on site. We are committed to making it a great experience to ensure you have a good time building your dream porject.</p>
            </div>




        </div>
    </div>
</div>

<div class="form-process-section" style="background-color:#fafafa; padding-bottom:50px; padding-top:50px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <button type="button" class="btn btn-info contractor-step-btn" style="background-color:#35b0a0; padding: 12px 28px; font-weight:bold; text-transform:uppercase" id="get_started_btn">I'm interested</button>

                <div class="form-process-content" style="display:none">
                    <h3 class="section-heading section-heading-cust-font" style="color:#6f7270"> Become part of the Future of Home building </h3>
                    <p>Please fill in the form below to receive a special invitation for the earlybird registration on Banjaiga. </p>
                    <div class="col-md-10 col-md-offset-2 col-sm-offset-0">
                        <div class="col-md-10 contact-information">
                            <div class="row">
                                <form id="form_info_cont" action="#">

                                    <div class="col-sm-6 contact-information-input">
                                        <select class="selectpicker is_required" name="i_am" id="i_am">
                                            <option value="">I am a</option>
                                            <option value="vendor">Vendor</option>
                                            <option value="manufacturer">Manufacturer</option>
                                            <option value="architect">Architect</option>
                                            <option value="contractor">Contractor</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 contact-information-input full-name-cont">
                                        <input type="text" placeholder="Full name" name="full_name" id="full_name" class="is_required">
                                    </div>

                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Company name" name="compnay" id="compnay" class="is_required">
                                    </div>

                                    <!--<div class="col-md-6 contact-information-input">
                                      <input type="text" placeholder="Products " name="products" id="products" class="is_required">
                                    </div>-->

                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Email Address" name="user_email" id="user_email" class="is_required">
                                    </div>

                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Telephone Number" name="telephone_number" id="telephone_number" class="is_required">
                                    </div>


                                    <div class="col-sm-6 contact-information-input">
                                        <select class="selectpicker is_required" name="interest_mode" id="interest_mode">
                                            <option value="">How interested are you?</option>
                                            <option value="reference">I want to become a member, NOW!</option>
                                            <option value="friends">This sounds interesting, tell me more</option>
                                            <option value="google">I think I want to be on the platform but I am not sure yet.</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-md-6">
                                       <div class="form-group">
                                          <div class="g-recaptcha" data-sitekey="6Lc-HSEUAAAAACYKlVS4RCY-hzfJ_OdTTk5gCmO0"></div>
                                       </div>
                                   </div>
                                   <div class="custom-captcha-msg col-md-6">
                                       <div class="form-group">
                                          <p class="captcha"></p>
                                       </div>
                                   </div>-->
                                </form>
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
                                    <h4 class="modal-title">Thanks for sharing your information!</h4>
                                </div>
                                <div class="modal-body thanks-modal-body">
                                    <!-- <p>What happens next?</p>-->
                                    <ul>
                                        <li>Thanks for sharing your information. Please note that Banjaiga receives a lot of applications but only selects a few companies that successfully pass through our rigorous selection process. Our representative will call you soon, to take you through the onboarding process.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled list-inline ">

                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn" id="submit-final-step" style="background-color:#35b0a0; border: 1px solid #35b0a0; padding: 10px 48px">Submit</button>
                        </li>
                    </ul>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="why-choose-section">
    <div class="container">
        <div class="row why-choose-us">
            <h1 style="text-align:center"> Why Choose Us </h1>
            <p style="text-align:center"> Everything You need to know about using Banjaiga. Below are our four features <br>that make us unique </p>

            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon" ><img src="<?php echo $themeUrl;?>/img/free-use.png" ></div>
                        <h4>Free to Use</h4>
                        <p>Use our free service and share your requirements with our friendly team to get started. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img src="<?php echo $themeUrl;?>/img/trust-suppliers.png" ></div>
                        <h4>Trust Worthy Suppliers</h4>
                        <p> We have checked our suppliers so you can relax and test the services. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img src="<?php echo $themeUrl;?>/img/one-call.png" ></div>
                        <h4>One Call Ordering</h4>
                        <p>As easy as picking up the phone and calling us to order items.</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon" ><img src="<?php echo $themeUrl;?>/img/helpful-team.png" ></div>
                        <h4>Helpful Team</h4>
                        <p>Our small but helpful team is always at your service. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img src="<?php echo $themeUrl;?>/img/timely-delivery.png" ></div>
                        <h4>Timely Delivery</h4>
                        <p>Because of our contacts, whatever you buy gets delivered on time, every time. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img src="<?php echo $themeUrl;?>/img/transparent-process.png" ></div>
                        <h4>Transparent Process</h4>
                        <p>We have a transparent system of operation so you are always aware of what's going on.</p>
                    </div>

                </div>
            </div>


            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon" ><img src="<?php echo $themeUrl;?>/img/complete-control.png" ></div>
                        <h4>Complete Control</h4>
                        <p>You choose, we check and then you decide. You are alwyas in control of the process. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img  src="<?php echo $themeUrl;?>/img/great-prices.png" ></div>
                        <h4>Great Prices</h4>
                        <p>Our prices are better than what you would get in the shops, and if they are not, we will negotiate with the sellers on your behalf. </p>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-sm-6 choose-us-box">
                <div class="box"><div class="aligncenter">
                        <div class="icon"><img src="<?php echo $themeUrl;?>/img/better-brands.png" ></div>
                        <h4>Better Brands</h4>
                        <p>We take pride in offering only the best brands because we believe in choice. </p>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>