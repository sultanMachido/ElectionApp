<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Student;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\Enrollment;
use yii\widgets\ActiveForm;
use app\models\PollingUnit;
use app\models\Lga;
use app\models\Ward;
?>



	




<table class="table table-striped">
	<thead>
		<tr>
			<th>Polling Unit</th>
			<th>Polling Unit Number</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
      foreach ($pollingunits as $pollingunit) {
      	
      	?>
			<tr>
				<td><?=$pollingunit->polling_unit_name; ?></td>
				<td><?=$pollingunit->polling_unit_number; ?></td>
				<td><a class="btn btn-sm btn-success" href="index.php?r=polling-unit/result&id=<?=$pollingunit->uniqueid; ?>">Result</a></td>
				
			
			</tr>
		 <?php    
      ;}
	 ?>		
	</tbody>
</table>

<?php $form = ActiveForm::begin();	?>

        <?= $form->field($unit,'lga_id')->dropDownList(Lga::find()->select(['lga_name','lga_id'])
        ->indexBy('lga_id')
        ->column(),[
            'prompt'=>'Select LGA',
            'onchange'=>'$.post("index.php?r=ward/list&id='.'"+$(this).val(),function(data){
                $("select#pollingunit-ward_id").html(data);
            })'
        ]);  ?>
        <?= $form->field($unit,'ward_id')->dropDownList(Ward::find() ->select(['ward_name','ward_id'])
        ->indexBy('ward_id')
        ->column(),['prompt'=>'Select Ward',
            'onchange'=>'$.post("index.php?r=polling-unit/units&id='.'"+$(this).val(),function(data){
                $("select#pollingunit-uniqueid").html(data);
            })']); ?>
		<?= $form->field($unit,'uniqueid')->dropDownList(
			PollingUnit::find()->select(['polling_unit_name'])
        ->indexBy('uniqueid')
        ->column(),['prompt'=>'Select Polling Unit']); 	 ?>


<?php 	ActiveForm::end() ?>


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>