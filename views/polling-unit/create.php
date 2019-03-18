<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ward;
use app\models\Lga;


 ?>


 <div> 
    <h2 class="page-header">Register</h2>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($pollingunits,'polling_unit_id'); ?>
       
        <?= $form->field($pollingunits,'lga_id')->dropDownList(Lga::find()->select(['lga_name','lga_id'])
        ->indexBy('lga_id')
        ->column(),[
            'prompt'=>'Select LGA',
            'onchange'=>'$.post("index.php?r=ward/list&id='.'"+$(this).val(),function(data){
                $("select#pollingunit-ward_id").html(data);
            })'
        ]);  ?>
        <?= $form->field($pollingunits,'ward_id')->dropDownList(Ward::find() ->select(['ward_name','ward_id'])
        ->indexBy('ward_id')
        ->column(),['prompt'=>'Select Ward',
            'onchange'=>'$.post("index.php?r=ward/unique&id='.'"+$(this).val(),function(data){
                $("select#pollingunit-uniquewardid").html(data);
            })']); ?>
        <?= $form->field($pollingunits,'uniquewardid')->dropDownList(Ward::find() ->select(['ward_id'])
        ->indexBy('ward_id')
        ->column(),['prompt'=>'Select Unique ID']);?>    
        <?= $form->field($pollingunits,'polling_unit_number')?>
        <?= $form->field($pollingunits,'polling_unit_name') ?>
         <?= $form->field($pollingunits,'polling_unit_description');?>
         <?= $form->field($pollingunits,'lat');?>
         <?= $form->field($pollingunits,'long');?>
         <?= $form->field($pollingunits,'entered_by_user');?>
         <?= $form->field($pollingunits,'date_entered');?>
         <?= $form->field($pollingunits,'user_ip_address');?>
        
        

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 </div>