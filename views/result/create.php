<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PollingUnit;


 ?>

 <div> 
    <h2 class="page-header">Create Faculty</h2>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($result,'polling_unit_uniqueid')->dropDownList(PollingUnit::find() ->select(['polling_unit_name','uniqueid'])
        ->indexBy('uniqueid')
        ->column(),['prompt'=>'Select Polling Unit']); ?>
        <?= $form->field($result,'party_abbreviation'); ?>
        <?= $form->field($result,'party_score'); ?>
        <?= $form->field($result,'entered_by_user'); ?>
        <?= $form->field($result,'date_entered'); ?>
        <?= $form->field($result,'user_ip_address'); ?>
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 </div><?php
/* @var $this yii\web\View */
?>


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
