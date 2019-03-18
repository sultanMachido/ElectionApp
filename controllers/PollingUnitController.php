<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\PollingUnit; 
use app\models\Result;


class PollingUnitController extends \yii\web\Controller{
    public function actionCreate(){
       $pollingunits = new PollingUnit();
       
        if($pollingunits->load(Yii::$app->request->post())&& $pollingunits->validate()){
            
                 $pollingunits->save();
                Yii::$app->getSession()->setFlash('success',''.$pollingunits->polling_unit_name.'created');
                $this->redirect('index.php?r=site/index');
             
            }
        return $this->render('create',[
          'pollingunits'=>$pollingunits,
          ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex(){
       $unit = new PollingUnit();
       $query = PollingUnit::find();
        $pagination = new Pagination([
            'defaultPageSize'=> 20,
            'totalCount'=> $query->count(),
        ]);

        $pollingunits = $query->orderBy('uniqueid ASC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
           'pollingunits' => $pollingunits,
           'pagination' => $pagination,
           'unit'=>$unit
        ]);
    }

    public function actionResult($id){ 
        $results = Result::find()
        ->where(['polling_unit_uniqueid'=>$id])
        ->all();

        $resultSum = Result::find()
        ->where(['polling_unit_uniqueid'=>$id])
        ->sum('party_score');
        return $this->render('result',[
          'results'=>$results,
          'resultSum'=>$resultSum
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
    public function actionUnits($id){
      $unitCount = PollingUnit::find()
        ->where(['ward_id'=>$id])
        ->count();

         $units = PollingUnit::find()
        ->where(['ward_id'=>$id])
        ->all();

        if ($unitCount > 0) {
           foreach ($units as $unit) {
               echo "<option value='".$unit->uniqueid."'>".$unit->polling_unit_name."</option>";
           }
        }else{
          echo  "<option>-</option>";
        }

    }

}
