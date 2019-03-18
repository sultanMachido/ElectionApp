<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;


 ?>

 <div> 
    <h2 class="page-header">Create Faculty</h2>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($faculty,'name'); ?>
        <?= $form->field($faculty,'dean'); ?>

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
