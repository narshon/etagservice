<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataHelper
 *
 * @author nngao
 */
class DataHelper extends ServiceComponent {
    
    public $modelID;
    public $modelName;
    
    public function __construct($modelClass,$tableName=''){   
        $this->modelName = $modelClass;                            
        $this->modelID = $this->getModelID($modelClass,$tableName); 
                                                         
        if(!$this->modelID){
           if(CODE_GENERATION == 1){  
               $this->modelID = $this->setModel($modelClass,$tableName);
           }
            
        }
    }
   
   private function getDatabase($tableName){
                $meta_tables=array('meta_module','meta_model_relations','meta_model_search','meta_model_validations','meta_skip_patterns','meta_view_element_options',
                                    'meta_groups','meta_permissions','meta_group_perms','meta_model','meta_model_details','meta_views','meta_view_details','meta_portlets','tbl_user_groups');
                $other_db_tables=Yii::app()->params['other_db']['tables'];
                $other_db_name=Yii::app()->params['other_db']['db_name'];
                
                
                //get db name
                    if(in_array($tableName, $meta_tables)){
                        
                             $dataconnection = Yii::app()->metadb;
                                 $sql="SELECT DATABASE() as db FROM $tableName LIMIT 1";
                                 try{ 
                                        $command=$dataconnection->cache(3600)->createCommand($sql);
                                        $datareader=$command->query(); 
                                        $row=$datareader->read();
                                        $dbname = $row['db'];  
                                    }
                                    catch(CDbException $e){ 
                                         //use default database
                                         $dbname=DB_DATABASE;
                                        // print "Error! Database Not Found"; exit;

                                    }

                    }
                    else if(in_array($tableName, $other_db_tables)){
                        $dataconnection = Yii::app()->$other_db_name;
                                 $sql="SELECT DATABASE() as db FROM $tableName LIMIT 1";
                                 try{ 
                                        $command=$dataconnection->cache(3600)->createCommand($sql);
                                        $datareader=$command->query(); 
                                        $row=$datareader->read();
                                        $dbname = $row['db'];  
                                    }
                                    catch(CDbException $e){ 
                                         //use default database
                                         $dbname=DB_DATABASE;
                                        // print "Error! Database Not Found"; exit;

                                    }
                    }
                    else{   
                            $dataconnection = Yii::app()->db;
                            $dbname='';
                            //current database
                            $sql="SELECT DATABASE() as db FROM $tableName LIMIT 1";
                            try{ 
                                $command=$dataconnection->cache(3600)->createCommand($sql);
                                $datareader=$command->query(); 
                                $row=$datareader->read();
                                $dbname = $row['db']; 
                                
                            }
                             catch (CDbException $e){
                                 $dataconnection = Yii::app()->metadb;
                                 $sql="SELECT DATABASE() as db FROM $tableName LIMIT 1";
                                 try{ 
                                        $command=$dataconnection->cache(3600)->createCommand($sql);
                                        $datareader=$command->query(); 
                                        $row=$datareader->read();
                                        $dbname = $row['db'];  
                                    }
                                    catch(CDbException $e){
                                            //use default database
                                            $dbname=DB_DATABASE;
                                           // print "Error! Database Not Found"; exit;
                                    }

                             }
                    }
                     
                    if(!$dbname){
                        $dbname=DB_DATABASE;
                    }
                    
                   return $dbname;
   }
   private function getTableName($modelClass){
       //get table name
      
        $model=new $modelClass();
        $tableName=$model->tableName();
        
        return $tableName;
   }
   private function getModelID($modelClass, $tableName=''){
       
          // print "Here".$modelClass." and ".$tableName; exit;
           
           if(!$tableName)
              $tableName= $this->getTableName($modelClass);
           
           
           $dbname = $this->getDatabase($tableName);   
               
            $criteria=new CDbCriteria();
            $criteria->condition = "service_name='$modelClass' and table_name='$tableName' and db_name= '$dbname' ";
            
     
         $check=Service::model()->cache(3600)->find($criteria);
         if($check){ 
             return $check->id;
         }
         else{   //print "Fatal Error! Contact The Developer of the model: $modelClass. "; exit;
             return false;
         }
   }
   private function setModel($modelClass,$tableName){
           
           $tableName = $tableName;
           $dbname = $this->getDatabase($modelClass);
          //get this entry's id.
           $criteria=new CDbCriteria();
           $criteria->condition = "service_name='$modelClass' and table_name='$tableName' and db_name= '$dbname' ";
            
          $getmodel=Service::model()->find($criteria);
          if($getmodel){
              return $getmodel->id;
          }
          else{    
                if($modelClass != "ModelValidations" || $modelClass != "ModelSearch" || $modelClass != "ModelRelations2"){
                    //create a service for this model
                    $service = new Service();
                    $service->service_name=strtolower($modelClass);
                    $service->service_desc="Provides information about {$modelClass} ";
                    $service->_status=1;
                    $service->model=$modelClass;
                    $service->table_name=$tableName;
                    $service->db_name=$dbname;
                    $service->category=5;
                    $service->save();
                }
              
              
              return $service->id;
          }
    }
   
    function setModelAttributes($name,$label){
        $checkAttrib = new ModelDetails("insert",0);
        $checkAttrib = $checkAttrib->findByAttributes(array('model_id'=>$this->modelID,'column_name'=>$name));
        if(!$checkAttrib){
          $md = new ModelDetails("",0);
          $md->model_id= $this->modelID;
          $md->column_name = $name;
          $md->column_label = $label;
          $md->save(false);
        }
          
    }
    function getModelAttributes(){
        //get attributes of given modelClass
        $returnArray = array();
        $mds = new ModelDetails("insert",0);
        $mds = $mds->cache(3600)->findAllByAttributes(array('model_id'=>$this->modelID));
        foreach($mds as $md){
            $returnArray[$md->column_name] = $md->column_label;
        }
        
        return $returnArray;
    }
    
    function setModelRules($validator,$fields,$opt_params='',$scenario='', $type="builtin",$message=""){
        
        if($this->modelID){
            $checkRule= new ModelValidations("insert",0);
            $checkRule=$checkRule->findByAttributes(array('validator_name'=>$validator,'validation_fields'=>$fields,'model_id'=>$this->modelID));
            if(!$checkRule){
                $mv = new ModelValidations("insert",0);
                $mv->validator_name = $validator;
                $mv->validation_fields = $fields;
                $mv->optional_parameters = $opt_params;
                $mv->scenario = $scenario;
                $mv->_status = 1;
                $mv->validation_type = $type;
                $mv->message = $message;
                $mv->model_id = $this->modelID;
                $mv->save(false);
            }
        }
        else{
            throw new Exception("Error! Check if Code Generation mode is set before you run this command.");
        }
                
        
    }
    function getModelRules(){
        //get attributes of given modelClass
        $returnArray = array();
        $mvs = new ModelValidations("insert",0);
        $mvs=$mvs->cache(3600)->findAllByAttributes(array('model_id'=>$this->modelID));
        foreach($mvs as $mv){   //array('_status, model_id', 'numerical', 'integerOnly'=>true),
            if($mv->_status==1){
                //explode params
                $params=explode( "=>",$mv->optional_parameters );
                if(!empty ($mv->optional_parameters)){
                    $rule=array(trim($mv->validation_fields), trim($mv->validator_name),trim($params[0])=>trim($params[1]),'on'=>trim($mv->scenario) );
                }
                else{
                    $rule=array(trim($mv->validation_fields), trim($mv->validator_name),'on'=>trim($mv->scenario) );
                }
               
               //  print "<pre>";  print_r($rule); print "</pre>";exit;
                $returnArray[] = $rule;
            }
        }
        
        // print "<pre>";  print_r($returnArray); print "</pre>";exit;
        return $returnArray;
    }
    function setModelSkipPatterns($pattern,$fields,$opt_params='',$scenario='',$message=""){
        
        $checkRule = new SkipPatterns("insert",0);
        $checkRule=$checkRule->findByAttributes(array('pattern_name'=>$pattern,'pattern_fields'=>$fields,'model_id'=>$this->modelID));
        if(!$checkRule){
            $mv = new SkipPatterns("insert",0);
            $mv->pattern_name = $validator;
            $mv->pattern_fields = $fields;
            $mv->optional_params = $opt_params;
            $mv->scenario = $scenario;
            $mv->message = $message;
            $mv->model_id = $this->modelID;
            $mv->save(false);
        }
    }
    function getModelSkipPatterns(){
        //get skip patterns of given modelClass
        
        $returnArray = array();
        $mvs = new SkipPatterns("insert",0);
        $mvs=$mvs->cache(3600)->findAllByAttributes(array('model_id'=>$this->modelID));
        foreach($mvs as $mv){   
            $returnArray[] = $mv->pattern_name;
        }
        
        return $returnArray;
    }
    function setModelSearch($method, $params){
        
        $checkSearch = new ModelSearch("insert",0);
        $checkSearch=$checkSearch->findByAttributes(array('method'=>$method,'params'=>$params,'model_id'=>$this->modelID));
        if(!$checkSearch){
            $ms = new ModelSearch("insert",0);
            $ms->method = $method;
            $ms->params = $params;
            $ms->model_id = $this->modelID;
            $ms->save(false);
        }
        
    
    }
    function getModelSearch(){
        //get search of given modelClass
        $ms = new ModelSearch("insert",0);                                
        $ms = $ms->cache(3600)->findAllByAttributes(array('model_id'=>$this->modelID));
               
        return $ms;
    }
    function setModelRelations($relation_name,$relation_type,$relation_model,$foreign_field){
        
        $checkRelation= new ModelRelations("insert",0);
       
        $checkRelation=$checkRelation->findByAttributes(array('relation_name'=>$relation_name,'related_model'=>$relation_model,'model_id'=>$this->modelID));
         
        if(!$checkRelation){
            $mr = new ModelRelations("insert",0);
            $mr->relation_name = $relation_name;
            $mr->relation_type = $relation_type;
            $mr->related_model = $relation_model;
            $mr->foreign_field = $foreign_field;
            $mr->model_id = $this->modelID;
            $mr->save(false);
        }
         
      
    }
    function getModelRelations(){
      
        $modelname = $this->modelName;
        $returnArray = array(); 
        $relation = array();
        
        $mrs = new ModelRelations("insert",0);  
        $mrs = $mrs->cache(3600)->findAllByAttributes(array('model_id'=>$this->modelID));
        if($mrs){
            foreach($mrs as $mr){   //array('_status, model_id', 'numerical', 'integerOnly'=>true),
                if($mr->relation_type=="self::HAS_ONE"){
                    $relation=array($modelname::HAS_ONE, $mr->related_model,$mr->foreign_field);
                }
                if($mr->relation_type=="self::HAS_MANY"){
                    $relation=array($modelname::HAS_MANY, $mr->related_model,$mr->foreign_field);
                }
                if($mr->relation_type=="self::BELONGS_TO"){
                    $relation=array($modelname::BELONGS_TO, $mr->related_model,$mr->foreign_field);
                } 
                if($mr->relation_type=="self::MANY_MANY"){
                    $relation=array($modelname::MANY_MANY, $mr->related_model,$mr->foreign_field);
                }
                $returnArray[$mr->relation_name] = $relation;
            }
        }
        
        return $returnArray;
    
    }
    
    
}

?>
