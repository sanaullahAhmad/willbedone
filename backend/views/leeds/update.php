<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Leeds */

$this->title = 'Update Lead: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Update Lead</a></li>
    <li><a data-toggle="tab" href="#menu1">Lead Assingment</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Update Vendor</h3>


        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'building_size')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'service_required')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'finish_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'construction_priority')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'construction_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lead_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'project_type')->textInput(['maxlength' => true]) ?>


        <?=  $form->field($model, 'status')->dropdownList([
            '1' => 'Active',
            '0' => 'InActive'
        ],
            ['prompt'=>'Select']
        ); ?>

        <?php /* = $form->field($model, 'date_created')->textInput()*/ ?>

        <?= $form->field($model, 'interior_design_required')->textInput(['maxlength' => true]) ?>



    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Lead Assingment</h3>
        <div class="row">
            <div class="col-lg-3">
                Select User Type
            </div>
                <div class="col-lg-3">
                <select class="form-control" id="user_type">
                    <option value="vendor">vendor</option>
                    <option value="architect">architect</option>
                    <option value="manufacturer">manufacturer</option>
                </select>
            </div>
            <div class="col-lg-3">
                <span class="btn btn-info add"  onclick="add_member()">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add </span>
                </span>
            </div>
        </div>


        <table role="presentation" class="table table-striped memebrs-table">
            <tbody class="files">
            <tr>
                <th>User Type</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            <?php
            if($LeedAssignments){
                foreach ($LeedAssignments as $row)
                {?>
                    <tr class="template-download fade in img_id_<?= $row->id?>">
                        <td>
                            <?php
                                echo $u_type = $model->getUserinfo($row->leeds_user_id, 'user_type');
                            ?>
                        </td>
                        <td>
                            <p class="name">
                                <select name="leeds_user_id[<?= $row->id ?>]"  class="form-control">
                                    <?php if($users){
                                        foreach($users as $user){
                                            if($user->user_type==$u_type) {
                                                echo "<option value=" . $user->id . "";
                                                if ($user->id == $row->leeds_user_id) {
                                                    echo " selected";
                                                }
                                                echo ">" . $user->username . "</option>";
                                            }
                                        }
                                    }?>

                                </select>
                            </p>
                        </td>
                        <td>
                            <span class="btn btn-danger delete"  onclick="delete_member('<?= $model->id ?>','<?= $row->id ?>')">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
            }?>
            </tbody>
        </table>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
<script>
    function add_member() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        var user_type = $('#user_type').val();
        if(user_type=='architect')
        {
            var vendorslist = '<?php if($users){foreach($users as $user){ if($user->user_type=='architect') {echo "<option value=".$user->id.">".$user->username."</option>";}}}?>';
        }
        else if(user_type=='manufacturer')
        {
            var vendorslist = '<?php if($users){foreach($users as $user){ if($user->user_type=='manufacturer') {echo "<option value=".$user->id.">".$user->username."</option>";}}}?>';
        }
        else if(user_type=='vendor')
        {
            var vendorslist = '<?php if($users){foreach($users as $user){ if($user->user_type=='vendor') {echo "<option value=".$user->id.">".$user->username."</option>";}}}?>';
        }
        $('.memebrs-table') .append('<tr class="template-download fade in img_id_'+ran+'"><td>'+user_type+'</td> <td><select name="leeds_user_id['+ran+']" class="form-control">'+vendorslist+'</select></td><td><span class="btn btn-danger delete"  onclick="delete_temp_member(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i><span>Delete</span></span></td></tr>');

    }
    function delete_temp_member(ran) {
        $('.img_id_'+ran).remove();
    }
    function delete_member( user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=leeds/member-delete&&row_id='+row_id+'&user_id='+user_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.img_id_'+row_id).remove();
            }
        })
    }
</script>





