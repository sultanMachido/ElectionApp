<?php 

namespace app\models;

use Yii;



class PollingUnit extends \yii\db\ActiveRecord{

     public static function tableName(){

     	return 'polling_unit';
     }
     
     public function rules(){
      
         return [
                  [['polling_unit_id','ward_id','lga_id','uniquewardid','polling_unit_number','polling_unit_name','polling_unit_description','lat','long','entered_by_user','date_entered','user_ip_address'],'required'],
                 
                  
                  

                ];

     }

     public function attributeLabels(){
     	return[
           'polling_unit_id'=>'Polling Unit ID',
           'ward_id'=>'Ward',
           'lga_id'=>'LGA',
           'polling_unit_number'=>'Polling Unit Number',
           'polling_unit_name'=>'Polling Unit Name',
           'polling_unit_description'=>'Polling Unit Description',
           'uniquewardid'=>'unique ward id',
           'lat'=>'Latitude',
           'long'=>'Longitude',
           'entered_by_user'=>'Entered By',
           'date_entered'=>'Date',
           'user_ip_address'=>'ip'
     	];
     }
     public function getWard(){
      return $this->hasOne(Ward::className(),['id'=>'ward_id']);
     }
     public function getLga(){
      return $this->hasOne(Lga::className(),['id'=>'lga_id']);
     }

}
 ?>