<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination; 
use app\models\Result;


class ResultController extends \yii\web\Controller{
    public function actionCreate(){
        $result = new Result();

        if($result->load(Yii::$app->request->post())&& $result->validate()){
            
            $result->save();

            Yii::$app->session->setFlash('success','$faculty->name'.'added');

            $this->redirect('index.php');

        }
        
        return $this->render('create',[
          'result'=>$result
        ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex(){
       
       $query = PuResult::find();
        $pagination = new Pagination([
            'defaultPageSize'=> 20,
            'totalCount'=> $query->count(),
        ]);

        $results = $query->orderBy('id DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
           'results' => $results,
           'pagination' => $pagination,
        ]);
    }

    public function actionUpdate($id){ 
        $department = Department::findOne($id);

        if ($department->load(Yii::$app->request->post())&& $department->validate()) {

            $department->save();
        }
        return $this->render('update',[
          'department'=>$department
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
