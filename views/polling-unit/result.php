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
			<th>Party</th>
			<th>Party Score</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
      foreach ($results as $result) {
      	
      	?>
			<tr>
				<td><?=$result->party_abbreviation; ?></td>
				<td><?=$result->party_score; ?></td>
			
				
			
			</tr>
		 <?php    
      ;}
	 ?>		
	</tbody>
</table>

<div><h2>Total Results:<?= $resultSum ?></h2></div>


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>