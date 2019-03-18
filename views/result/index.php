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
			<th>Name</th>
			<th>Dean</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
      foreach ($faculties as $faculty) {
      	
      	?>
			<tr>
				<td><?=$faculty->name; ?></td>
				<td><?=$faculty->dean; ?></td>
				<td><a class="btn btn-sm btn-success" href="index.php?r=faculty/update&id=<?=$faculty->id; ?>">Update</a></td>
				<td><a class="btn btn-sm btn-success" href="index.php?r=faculty/delete&id=<?= $faculty->id; ?>">Delete</a></td>
			
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