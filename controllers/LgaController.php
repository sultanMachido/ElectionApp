<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\PollingUnit; 

use app\models\Lga;


class LgaController extends \yii\web\Controller{
    public function actionCreate(){
        
        return $this->render('create',[
          'department'=>$department
        ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex(){
      $query = Lga::find();
        $pagination = new Pagination([
            'defaultPageSize'=> 20,
            'totalCount'=> $query->count(),
        ]);

        $Lgas = $query->orderBy('uniqueid ASC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
           'Lgas' => $Lgas,
           'pagination' => $pagination,
        ]);
    }

    public function actionResults($id){ 
        $pollingunits = PollingUnit::find()
        ->where(['lga_id'=>$id])
        ->all();


         return $this->render('results',[
           'pollingunits' => $pollingunits,
           
        ]);
    }
    public function actionList($id){
        $departmentCount = Department::find()
        ->where(['faculty_id'=>$id])
        ->count();

         $departments = Department::find()
        ->where(['faculty_id'=>$id])
        ->all();

        if ($departmentCount > 0) {
           foreach ($departments as $department) {
               echo "<option value='".$department->id."'>".$department->name."</option>";
           }
        }else{
          echo  "<option>-</option>";
        }
    }

}
