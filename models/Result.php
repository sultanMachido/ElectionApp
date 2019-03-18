<?php 

namespace app\models;

use Yii;
use app\models\Faculty;
use app\models\Courses;


class Result extends \yii\db\ActiveRecord{

     public static function tableName(){

     	return 'announced_pu_results';
     }
     
     public function rules(){
      
         return [
                  [['polling_unit_uniqueid','party_abbreviation','party_score','entered_by_user'],'required'],
                  [['entered_by_user','date_entered','user_ip_address'],'safe'],
                  
                  

                ];

     }

     public function attributeLabels(){
     	return[
           'polling_unit_id'=>'Polling Unit',
           'ward_id'=>'Ward',
           'lga_id'=>'LGA',
           'polling_unit_number'=>'Polling Unit Number',
           'polling_unit_name'=>'Polling Unit Name',
           'polling_unit_description'=>'Polling Unit Description',
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