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
            <th>LGA ID</th>
            <th>LGA Name</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
      foreach ($Lgas as $Lga) {
        
        ?>
            <tr>
                <td><?=$Lga->lga_id; ?></td>
                <td><?=$Lga->lga_name; ?></td>
                <td><a class="btn btn-sm btn-success" href="index.php?r=lga/results&id=<?=$Lga->lga_id; ?>">Result</a></td>
                
            
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