<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\PollingUnit; 
use app\models\Ward;


class WardController extends \yii\web\Controller{
    public function actionList($id){

      $wardcount = Ward::find()
        ->where(['lga_id'=>$id])
        ->count();

         $wards = Ward::find()
        ->where(['lga_id'=>$id])
        ->all();

        if ($wardcount > 0) {
           foreach ($wards as $ward) {
               echo "<option value='".$ward->ward_id."'>".$ward->ward_name."</option>";
           }
        }else{
          echo  "<option>-</option>";
        }
       
    }
    public function actionUnique($id){

      $wardcount = Ward::find()
        ->where(['ward_id'=>$id])
        ->count();

         $wards = Ward::find()
        ->where(['ward_id'=>$id])
        ->all();

        if ($wardcount > 0) {
           foreach ($wards as $ward) {
               echo "<option value='".$ward->ward_id."'>".$ward->ward_id."</option>";
           }
        }else{
          echo  "<option>-</option>";
        }
       
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex(){
       
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
        ]);
    }

    public function actionResult($id){ 
        $results = PuResult::find()
        ->where(['polling_unit_uniqueid'=>$id])
        ->all();
        return $this->render('result',[
          'results'=>$results
        ]);
    }
   
   
}
