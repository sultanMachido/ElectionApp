<?php 

namespace app\models;

use Yii;



class Lga extends \yii\db\ActiveRecord{

     public static function tableName(){

     	return 'lga';
     }
     
     public function rules(){
      
         return [
                  [['lga_id','lga_name','state_id','lga_description','entered_by_user','date_entered','user_ip_address'],'required'],
                  
                  

                ];

     }

     public function attributeLabels(){
     	return[
           'lga_id'=>'LGA',
           'lga_name'=>'LGA Name',
           'state_id'=>'State',
           'lga_description'=>'LGA Description',
           'entered_by_user'=>'Entered By',
           'date_entered'=>'Date',
           'user_ip_address'=>'ip'
     	];
     }
     
     

}
 ?>