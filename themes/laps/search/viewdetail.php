<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'View Detail';
?>



<div class="row">
    <div class="col-md-6">
        <div class="heading-block">
            <h2>View Detail</h2>
        </div>
    </div>
</div>
<div>&nbsp;</div>
<div class="cleafix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h5>Product MSCID</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[MSCID] ?>
        </div>
        <div class="col-md-3">
            <h5>Product Name</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[prodName] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Product Status</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[status] ?>
        </div>
        <div class="col-md-3">
            <h5>Current SOP</h5>
        </div>
        <div class="col-md-3">
            <?php echo $sop->description; ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Added By</h5>
        </div>
        <div class="col-md-3">
            <?php echo $user->username; ?>
        </div>
        <div class="col-md-3">
            <h5>Request Type</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[request_type] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Recipient ID</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[recipient_id] ?>
        </div>
        <div class="col-md-3">
            <h5>Recipient Name</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[recipient_name] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>IND No</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[ind_no] ?>
        </div>
        <div class="col-md-3">
            <h5>IRB No</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[irb_no] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Recipient DOB</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[recipient_dob] ?>
        </div>
        <div class="col-md-3">
            <h5>Process Type</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[process_type] ?>
        </div>

    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Donor DOB</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[donorDOB] ?>
        </div>
        <div class="col-md-3">
            <h5>DONOR Weight</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[wieght] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Hospital Id</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[hospital_id] ?>
        </div>
        <div class="col-md-3">
            <h5>Industry name</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[industry_name] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Study Name</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[study_name] ?>
        </div>
        <div class="col-md-3">
            <h5>Study Number</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[study_number] ?>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
        <div class="col-md-3">
            <h5>Donor ID</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[donor_id] ?>
        </div>
        <div class="col-md-3">
            <h5>Donor Name</h5>
        </div>
        <div class="col-md-3">
            <?php echo $result[donorName] ?>
        </div>
    </div>
</div>






