<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$loginmodel = new LoginForm();
?>
<div class="footer">
    <div class="fooer-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3> Company </h3>
                    <ul>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> About Us </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Committee </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> The Team </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Board </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Sponsors </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Vision & Mission </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3>Quick Links</h3>
                    <ul>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Blog </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> News </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Press Releases</a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Support</a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Sponsors</a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Career</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3>Professionals</h3>
                    <ul>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Vendors </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Architects </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Manufacturers </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Products </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Suppliers </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> Testimonials </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6 ">
                    <h3>Connect with Us</h3>
                    <p>Banjaiga (Pvt) Ltd. </p>
                    <p>First floor, 12th Nazimuddin road, </p>
                    <p>F-6/1, Islamabad, Pakistan.</p>
                    <p>Phone: +92 51 2814068</p>
                    <p>support@banjaiga.com</p>
                    <ul class="social">
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> <i class=" fa fa-facebook"> </i> </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> <i class="fa fa-twitter"> </i> </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> <i class="fa fa-instagram"> </i> </a> </li>
                        <li> <a href="#" data-toggle="modal" data-target="#workingModal"> <i class="fa fa-pinterest"> </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
    </div>
    <!--/.container-->
    <!--/.footer-->
    <div class="footer-bottom">
        <div class="container">
            <p class="">Copyright &copy; Banjaiga (Pvt) Ltd. 2017. All right reserved.</p>
        </div>
    </div>
</div>
<div class="modal thanks-modal fade" id="workingModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <button type="button"  data-dismiss="modal"><img src="<?php echo $themeUrl;?>/img/close-icon.png"></button>
                <!-- <img src="themes/banjaiga/img/cong-icon.png">-->
                <h4 class="modal-title" style="text-align:center">Coming Soon!</h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li>We are currently working tirelessly to put our platform online.  </li>
                    <li>Please bear with us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal thanks-modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <button type="button"  data-dismiss="modal"><img src="<?php echo $themeUrl;?>/img/close-icon.png"></button>
                <!-- <img src="themes/banjaiga/img/cong-icon.png">-->
                <h4 class="modal-title" style="text-align:center">Login!</h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <p>Please fill out the following fields to login:</p>
                <div class="row">
                    <div class="col-lg-12">
                        <?php $form = ActiveForm::begin(['action' =>['site/login'], 'id' => 'login-form']); ?>
                        <?= $form->field($loginmodel, 'username')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($loginmodel, 'password')->passwordInput() ?>
                        <?= $form->field($loginmodel, 'rememberMe')->checkbox() ?>
                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal thanks-modal fade" id="qoutationModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <!--<button type="button"  data-dismiss="modal"><img src="<?php echo $themeUrl;?>/img/close-icon.png"></button>
                 <img src="themes/banjaiga/img/cong-icon.png">-->
                <h4 class="modal-title" style="text-align:center">Confirm! <span class="glyphicon glyphicon-question-sign"></span></h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li>Banjaiga is the only platform that gets “Real-time” quotations for you from the market. This means that real people are involved in this process.</li>
                    <li> You are about to request a real quotation from us. Are you sure you want to do this? </li>
                </ul>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal" style="margin-left: 15px;">Cancel</button>
                <a href="javascript:void(0)" class="btn btn-default pull-right" id="confirm-qoutation" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div class="modal thanks-modal fade" id="saveShoppingListModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Place Order </h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li> Your quote has been saved for a limited time. </li>
                    <li> Please press “Place Order” when you are ready to place an order through Banjaiga.</li>
                    <li> Or call us at <a href="tel:+92 51 2814068">+92 51 2814068</a> to do it over the phone. </li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div class="modal thanks-modal fade" id="placeOrderListModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Order Placed </h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li> Thank you for placing you order through Banjaiga.</li>
                    <li> One of our customer representatives will be getting in touch with you to assist you with your order.</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>
<div class="modal thanks-modal fade" id="visitShowroomListModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Visit Showroom </h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li> Thank you for booking an appointment to the showroom. </li>
                    <li> One of our customer representatives will be getting in touch with you to assist you with your appointment.</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div class="modal thanks-modal fade" id="declineListModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Decline </h4>
            </div>
            <div class="modal-body thanks-modal-body">
                 You just declined the quotation generated by Banjaiga. Please choose a reason: <br><br>
                <form id="list_feedback_form">
                     1) <input type="radio" name="list_feedback" value="Too expensive" checked> Too expensive,<br>
                     2) <input type="radio" name="list_feedback" value="Too cheap">Too cheap,<br>
                     3) <input type="radio" name="list_feedback" value="I don&#39;t like the vendor">I don’t like the vendor,<br>
                     4) <input type="radio" name="list_feedback" value="I don&#39;t like the product">I don’t like the product,<br>
                     5) <input type="radio" name="list_feedback" value="I will buy later">I will buy later,<br>
                     6) <input type="radio" name="list_feedback" value="I was just testing how it works, sorry">I was just testing how it works, sorry.<br><br>
                </form>
                    <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal" data-toggle="modal" data-target="#confirmDeclineListModal">Okay</a>
            </div>
        </div>
    </div>
</div>

<div class="modal thanks-modal fade" id="confirmDeclineListModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Thank You </h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <ul>
                    <li> Thanks fro your feedback! Please remember there are real people working tirelessly to ensure you get the best service possible. </li>
                    <li>Your feedback is very important for us to become better. Please continue to use the platform or call us at <a href="tel:+92 51 2814068">+92 51 2814068</a> to talk to our team member. </li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-default pull-right submit_decline_feedback" data-dismiss="modal" onclick="submit_decline_feedback()" >Submit</a>
                <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal" >Go Back</a>
            </div>
        </div>
    </div>
</div>
<div class="modal thanks-modal fade" id="qouteConfirmModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content" style="background: #35AFA0;">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center;color: #fff;"> Congratulations! <span class="glyphicon glyphicon-thumbs-up"></span></h4>
                <p class="modal-title" style="text-align:center;color: #fff; line-height: 1px;font-size: 14px;">___</p>
            </div>
            <div class="modal-body thanks-modal-body" style="text-align: center;">
                <ul>
                    <li style="color: #fff;">You have just requested a quotation for the product. We have activated our network to find you the best rates.</li>
                    <li style="color: #fff;">We will send you the quote within the next 48 hours. </li>
                    <li style="color: #fff;">Why wait? Add more products to the shopping list and get real-time quotations!</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-default"  data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"></span> OKAY</a>
            </div>
        </div>
    </div>
</div>




<div class="modal thanks-modal fade" id="make_a_requestModal" role="dialog">
    <div class="modal-dialog  thanks-modal-dialog">
        <div class="modal-content">
            <div class="modal-header thanks-modal-header">
                <h4 class="modal-title" style="text-align:center">Make a request</h4>
            </div>
            <div class="modal-body thanks-modal-body">
                <form id="make_a_request">
                    <input type="hidden" name="shopping_list_item_id" id="shopping_list_item_id">
                    <p style="text-align: center">Please fill in the form so Banjaiga can get in touch with you.</p> <br>
                     Who are you?<br>
                    <select class="form-control" name="who_are_you" id="who_are_you">
                        <option>Architect</option>
                        <option>Vendor</option>
                        <option>Buyer</option>
                        <option>Specifier</option>
                        <option>Interior designer</option>
                        <option>Contractor</option>
                        <option>Other</option>
                    </select>
                    <br>
                    <input type="checkbox" name="is_send_price_qoute" >&nbsp;&nbsp;Please send me a price goute.<br><br>
                    <textarea class="form-control" placeholder="Add a message..." name="message" id="message"></textarea><br>
                    <input type="checkbox" name="is_general_request" >&nbsp;&nbsp;I have a general request, please call me<br>
                    <input type="checkbox" name="is_send_catalogue" >&nbsp;&nbsp;Please send me your catalogue<br>
                    <input type="checkbox" name="is_send_more_info" >&nbsp;&nbsp;Please send me more product information<br>
                    <input type="checkbox" name="is_nearest_dealer" >&nbsp;&nbsp;Where can I find the nearest dealers?<br>
                    <input type="checkbox" name="is_send_spec_sheet" >&nbsp;&nbsp;Please send me spec sheet<br>
                    <a href="javascript:void(0)" class="btn btn-default pull-right" data-dismiss="modal" onclick="submit_make_a_request_form()">NEXT</a>
                </form>
            </div>
        </div>
    </div>
</div>