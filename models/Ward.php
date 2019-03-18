<?php 

namespace app\models;

use Yii;
use app\models\Faculty;
use app\models\Courses;



class Ward extends \yii\db\ActiveRecord{

     public static function tableName(){

     	return 'ward';
     }
     
     public function rules(){
      
         return [
                  [['ward_id','ward_name','lga_id','ward_description'],'required'],
                  [['entered_by_user','date_entered','user_ip_address'],'safe'],
                  
                  

                ];

     }

     public function attributeLabels(){
     	return[
           'ward_id'=>'LGA',
           'ward_name'=>'LGA Name',
           'lga_id'=>'State',
           'ward_description'=>'LGA Description',
           'entered_by_user'=>'Entered By',
           'date_entered'=>'Date',
           'user_ip_address'=>'ip'
     	];
     }
    
     public function getLga(){
      return $this->hasOne(Lga::className(),['lga_id'=>'ward_id']);
     }

}
 ?>