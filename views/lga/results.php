<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Student;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\Enrollment;
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


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>