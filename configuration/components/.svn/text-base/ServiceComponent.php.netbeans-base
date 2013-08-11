<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceComponent
 *
 * @author nngao
 */
class ServiceComponent {
    private $_service;
    private $_controller;
    public $listview_params=array();
    public $gridview_params=array();
    
    public function __construct($controller='',$serviceName='', $database=DB_DATABASE) {  
        $this->setController($controller);
        $this->setService($serviceName, $database);   
    }
    private function setService($name,$database){
        
        $object=Service::model()->getService($name,$database);
        if($object){
            $this->_service=$object;
            return true;
        }
        else{
            $this->_service=false;
            return false;
        }
        
    }
    private function setController($controller){
        $this->_controller=$controller;
    }
    public function getService(){
        return $this->_service;
    }
        
    public function showAll(){
                                
           $result=Service::model()->findByAttributes(array('service_name'=>$this->_service->service_name));
           if($result){
                $service=Service::model()->findAllByAttributes(array('category'=>$result->category));
                    if($service){
                        //get service portlets
                        foreach($service as $serve){
                            $criteria = new CDbCriteria();
                            $criteria->condition='service_id=:service_id and scope="generic" and portlet_name != "MenuPortlet"';
                            $criteria->params=array('service_id'=>$serve->id);
                            $criteria->order = "id desc";
                                                                               
                        $serviceportlets=Portlets::model()->findAll($criteria);
                            if($serviceportlets){    
                              foreach($serviceportlets as $portlet){
                                                                        
                                  $model=$portlet->portlet_model;   
                                  $modelObject=new $model();
                                  $object=$modelObject->findAll();
                                  
                                  $relation=array('');
                                  if($portlet->relations!=''){
                                      $relation=$portlet->relations;
                                      $relation=explode(',',$portlet->relations);  if(!is_array($relation)){ $relation=array('');   }
                                  }
                                  
                                //$params=array();  //if($portlet->)
                                $params=array('object'=>$object,'title'=>$portlet->portlet_title,'label'=>$portlet->label,'relations'=>$relation,'view'=>$portlet->viewpath,
                                 'viewid'=>$portlet->viewid);

                                $params["controller"]=$this->_controller;

                                $pg=new PortletGenerator();
                                $pg->generate($this->_controller,$portlet,$params);
                               }
                             }
                             
                        }
                        
                     }
           }
           else {
               throw new CHttpException(400,"Service Portlet implementation for $this->_service doesn't exist" );
           }
          
            
    }
    public function show(){
                                
                    if($this->_service){
                        if($this->_service->_status==1){  
                        //get service portlets
                        $criteria = new CDbCriteria();
                        $criteria->condition='service_id=:service_id and scope="specific" and portlet_name != "MenuPortlet"';
                        $criteria->params=array('service_id'=>$this->_service->id);
                            
                        $serviceportlets=Portlets::model()->findAll($criteria);
                            if($serviceportlets){    
                              foreach($serviceportlets as $portlet){
                                  
                                  $model=$portlet->portlet_model;   
                                  $modelObject=new $model();
                                  $object=$modelObject->findAll();
                                  
                                  $relation=array('');
                                  if($portlet->relations!=''){
                                      $relation=$portlet->relations;
                                      $relation=explode(',',$portlet->relations);  if(!is_array($relation)){ $relation=array('');   }
                                  }
                                  
                                //$params=array();  //if($portlet->)
                                $params=array('object'=>$object,'title'=>$portlet->portlet_title,'label'=>$portlet->label,'relations'=>$relation,'view'=>$portlet->viewpath,
                                 'viewid'=>$portlet->viewid);

                                $params["controller"]=$this->_controller;

                                $pg=new PortletGenerator();
                                $pg->generate($this->_controller,$portlet,$params);
                               }
                             }
                             
                       }
                    }
    }
    
    public function evaluateLabels($object,array $labels,array $relations=array()){
        $label='';
        if(isset($relations)){
                $label=$object->$relations['relation1']->$labels['label1'];
                }
          else {
              $label=$params['labels']['label1'];
        }
        
        return $label;
    }
    
    public function showCustom($criteria,$name_alias,$title='Portlet title'){
        
        $portlet=Portlets::model()->findByAttributes(array('name_alias'=>$name_alias));
        if($portlet){
            
           
            $model=$portlet->portlet_model;   
            $modelObject=new $model();
            $object=$modelObject->findAll($criteria);
            if($object){
    
                    $relations=explode(",",$portlet->relations);
                    if($portlet->portlet_title != "custom"){
                        $title=$portlet->portlet_title;
                    }
                    
                    
                    $params=array('object'=>$object,'title'=>$title,'label'=>$portlet->label,'relations'=>$relations,'view'=>$portlet->viewpath,
                                 'viewid'=>$portlet->viewid);
                    $pg=new PortletGenerator();
                    $pg->generate($this->_controller,$portlet,$params); 
            }
            else {
               // throw new CHttpException(400,'Service Portlet Model for '.$name_alias.' doesn\'t exist' );
            }
            
        }
        else {
                throw new CHttpException(400,'Service Portlet definition for '.$name_alias.' doesn\'t exist' );
         }
        
    }
    
    public function WebServiceObject($criteria,$name_alias,$title=''){
        
        $viewobject=$this->getServiceView($name_alias);   
       
        if($viewobject){  // print "Tuko hapa"; exit;
          if($viewobject->_status==1){
            $view=$viewobject->view_name;

           // $model=$viewobject->view_model;
           // $dp=$model::model()->findAll($criteria);
            
            $model=$viewobject->view_model;
            $modelObject=new $model();
            $dp=$modelObject->findAll($criteria);
            
            
            
           
            return $dp;
            
       }
     }
    }
    
      public function WebServiceRecord($criteria,$name_alias,$title=''){
        
        $viewobject=$this->getServiceView($name_alias);  
        
       
        if($viewobject){  // print "Tuko hapa"; exit;
          if($viewobject->_status==1){
            $view=$viewobject->view_name;

            $model=$viewobject->view_model;
            if($criteria->condition != ''){
            	$modelObject=new $model();
                $dp=$modelObject->find($criteria);
            }
            else {  
                
                $dp = new $model();
            }
            
           
            return $dp;
            
       }
     }
     else {
         throw new CHttpException(404,'View '.$name_alias.' not found' );
     }
    }
    
    public function WebServiceDeleteRecord($name_alias,$id){
        
        $viewobject=$this->getServiceView($name_alias);   
       
        if($viewobject){  
          if($viewobject->_status==1){
            $view=$viewobject->view_name;
          
            $model=$viewobject->view_model;
            $modelObject=new $model();
            $dp=$modelObject->findByPk((int)$id);
            if($dp)
              $dp->delete(); 
       }
     }
     else {
         throw new CHttpException(404,'View '.$name_alias.' not found' );
     }
    }


    public function showListView($criteria,$name_alias,$title='',$options=array()){
        $pagesize=10;
        $totalItemCount='';
        if(isset($options['pagesize'])){
            $pagesize=$options['pagesize'];
        }
        if(isset($options['totalItemCount'])){
            $pagesize=$options['totalItemCount'];
        }
        
        $viewobject=$this->getServiceView($name_alias);
        
        if($viewobject){
          if($viewobject->_status==1){
            $view=$viewobject->view_name;
            
            print $title;

            $path=lcfirst($viewobject->view_model);
            if($view=="automated"){ $view='list';  $path="automated"; }

            $dp=new CActiveDataProvider("$viewobject->view_model",array(
                     'criteria'=>$criteria,
                     'pagination' => array('pageSize' => $pagesize),
                      //'totalItemCount' => $totalItemCount,
                      ));
            
            

            $this->_controller->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dp,
                    'itemView'=>"../$path/$view", 
                    'summaryText'=>'',
                 
            ));
            
            
           
       }
     }
     
    }
    
   
    
    public function showGridView($view_title,$name_alias,$filter=''){  
        
        $viewobject=$this->getServiceView($name_alias);   
        if($viewobject){      
            if($viewobject->_status==1){      
              $class=$viewobject->view_model;
              $view=$viewobject->view_name; 
              $path=strtolower($class);
                if($view=="automated"){
                       $path='automated';
                       $view='grid'; 
                }
                
                   print "<p><h3>".$view_title."</h3></p>"; 
                   
                   $model=new $class("../$class/search");
                        $model->unsetAttributes();  // clear any default values

                        if(isset($_GET["$class"]))
                                $model->attributes=$_GET["$class"];

                        $this->_controller->renderPartial("../$path/$view",array(
                                'model'=>$model, 'filter'=>$filter, 'viewID'=>$viewobject
                        ),false,true);
              }
        }
  
    }
    
    public function showScrollableGridView($view_title,$name_alias,$filter=''){  
        
        $viewobject=$this->getServiceView($name_alias);   
        if($viewobject){      
            if($viewobject->_status==1){      
              $class=$viewobject->view_model;
              $view=$viewobject->view_name; 
              $path=strtolower($class);
                if($view=="automated"){
                       $path='automated';
                       $view='scrollablegrid'; 
                }
                
                   print "<p><h3>".$view_title."</h3></p>"; 
                   
                   $model=new $class("../$class/search");
                        $model->unsetAttributes();  // clear any default values

                        if(isset($_GET["$class"]))
                                $model->attributes=$_GET["$class"];

                        $this->_controller->renderPartial("../$path/$view",array(
                                'model'=>$model, 'filter'=>$filter, 'viewID'=>$viewobject
                        ),false,true);
              }
        }
  
    }
    
    //@ details view
     public function showDetailView($view_title,$name_alias,$id,$return=false,$processOutput=false){
        
        $viewobject=$this->getServiceView($name_alias);
        if($viewobject){   
            if($viewobject->_status==1){
              $class=$viewobject->view_model;
              $view=$viewobject->view_name; 
              $path=strtolower($class);
                if($view=="automated"){
                       $path='automated';
                       $view='detail'; 
                }
                $modelObject=new $class();
                $model=$modelObject->findByPk($id);
                    
                   if(!$return){
                       print "<p><h3>".$view_title."</h3></p>";
                   }
                      
                     
                      $this->_controller->renderPartial("../$path/$view",array('model'=>$model),$return,$processOutput);
              }
        }
  
    }
    
    public function relationalMapping($object, array $relations, $end_attribute){
        $datamap="";
        
        $datamap=$object;
        foreach($relations as $relation){
            if($relation !="")
               $datamap=$datamap->$relation;
        }                                        
        //process end_atrribute
        $_method=substr($end_attribute, -2);    
        if($_method=='()'){                          
            $_len=strlen($end_attribute)-2;
            $newattr=substr($end_attribute,0,$_len); 
            $datamap=$datamap->$newattr();
        }
        else{
           if(isset($datamap->$end_attribute))
            $datamap=$datamap->$end_attribute;
           else
              $datamap = ''; 
        }
        
        return $datamap;
      }
      
      public function gridData($view_id,$view_model){
          $params=array($this->gridview_params,$view_id,$view_model);
          array_walk($this->gridview_params['fieldnames'], 'ServiceComponent::gridwalk',$params);
          
          return $this->gridview_params['fieldnames'];
      }
      
      public static function gridwalk(&$item,$key,$params){
         
         
          if($params[0]['fieldtypes'][$key]=='value' || $params[0]['fieldtypes'][$key]=='textfield'){ 
             
             if( $params[0]['labels'][$key] == "Image"){
                   
                  $item = array(     
                    
                    'value'=>'$data->getLink("'.$params[1].'","'.$key.'")',
                    'type'=>'image',
                    'header' => $params[0]['labels'][$key],
                    'htmlOptions'=>array('class'=>'myimage'), 
                    'type'=>'raw'
                  );
             }
             elseif(isset($params[0]['options_type'][$key]) && $params[0]['options_type'][$key]=="CEditableColumn"){
                  $item= array(
                      'header' => $params[0]['labels'][$key],
                      'value' =>  '$data->getLink("'.$params[1].'","'.$key.'")',
                      'name' => $params[0]['fieldnames'][$key],
                      'class'=>$params[0]['options_type'][$key],  
                      );  // ServiceComponent::getLink('$data->id')
                    
             }
             elseif(isset($params[0]['options_type'][$key]) && $params[0]['options_type'][$key]=="CMonkColumn"){
                 
                  $item= array(
                      'header' => $params[0]['labels'][$key],
                      'value' =>  '$data->getLink("'.$params[1].'","'.$key.'")',
                      'name' => $params[0]['fieldnames'][$key],
                      'class'=>$params[0]['options_type'][$key],  
                      );  // ServiceComponent::getLink('$data->id')
                    
             }
             else{     
                  
                    $item= array(
                      'header' => $params[0]['labels'][$key],
                      'value' =>  '$data->getLink("'.$params[1].'","'.$key.'")',
                      'name' => $params[0]['fieldnames'][$key],
                      'cssClassExpression'=>'$data->getCssClass($this->name)',
                      'filter'=>$params[2]::model()->getFilterOptions($params[0]['fieldnames'][$key]),  
                      );  // ServiceComponent::getLink('$data->id')
                      
             }
             
             
          }
          if($params[0]['fieldtypes'][$key]=='controls-full'){  
                 $url=Yii::app()->createAbsoluteUrl("automated/update");  
                 $hybridgridid = "hybridgrid-ModelValidations_hybridgrid";
                 $view = "ModelValidations_form";
              $item= array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                'url'=>'Yii::app()->createUrl("'.$params[2].'/view", array("id"=>$data->id))',
                            ),
                            
                            'update' => array
                            (                           
                                'click'=>ServiceComponent::ajaxUpdate($params[2],$params[0]['presentation']),
                                                  
                                'url'=>'Yii::app()->createUrl("automated/update", array("view"=>"'.$params[2].'_form","id"=>$data->id))',
                             
                            ),
                            
                            'delete' => array
                            (
                                'url'=>'Yii::app()->createUrl("'.$params[2].'/delete", array("id"=>$data->id,"safe"=>"safe"))',
                            )
                        ),
                        
		);
          }
          
         if($params[0]['fieldtypes'][$key]=='controls-update'){  
                
              $item= array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}',
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                
                                'url'=>'Yii::app()->createUrl("'.$params[2].'/view", array("id"=>$data->id))',
                            ),
                            
                            'update' => array
                            (   
                                 
                                 'click'=>ServiceComponent::ajaxUpdate($params[2],$params[0]['presentation']),
                                 //'url'=>'Yii::app()->createUrl("'.$params[2].'/update", array("id"=>$data->id))',
                                 'url'=>'Yii::app()->createUrl("automated/update", array("view"=>"'.$params[2].'_form","id"=>$data->id))',
                            )
                            
                        ),
                        
		);
          }
         if($params[0]['fieldtypes'][$key]=='controls-delete'){  
                
              $item= array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{delete}',
                        'buttons'=>array
                        (
                            'view' => array
                            (
                                'url'=>'Yii::app()->createUrl("'.$params[2].'/view", array("id"=>$data->id))',
                            ),
                            
                             'delete' => array
                            (
                                'url'=>'Yii::app()->createUrl("'.$params[2].'/delete", array("id"=>$data->id,"safe"=>"safe"))',
                            )
                            
                        ),
                        
		);
          }
          if($params[0]['fieldtypes'][$key]=='controls-custom'){  
              $viewID_viewDetailsID=array($params[1],$key);
              $item = $params[2]::getCustomControls($viewID_viewDetailsID);
          }
          
      }
      
      public static function getValue($model,$args){
         $view_id=$args[0];   
         $viewdetailsID=$args[1];
         $valueAttr='';                
                                 
         $sc=new ServiceComponent();
         
         $vdObject=  ViewDetails::model()->findByPk($viewdetailsID);
         $r=explode(',',$vdObject->relations); if(!is_array($r)){ $r=array('');   }
         
               if(isset($vdObject->functions)){ 
                   $valueAttr=$vdObject->functions;
                   $value=$sc->relationalMapping($model, $r, $valueAttr);
                     
                   echo CHtml::encode($value);
                  
               }
               else if( $vdObject->linkid){
                   
                 $valueAttr=$vdObject->relation_endattribute;
                 $value=$sc->relationalMapping($model, $r, $valueAttr);
                 $link=$sc->relationalMapping($model, $r, $vdObject->linkid);
                 echo CHtml::link(CHtml::encode($value), array($vdObject->linkpath, 'id'=>$link));
                 
                }
                else if($vdObject->relation_endattribute){
                   
                    $valueAttr=$vdObject->relation_endattribute;    
                    $value=$sc->relationalMapping($model, $r, $valueAttr);
                    
                   echo CHtml::encode($value);
                }

              else{
                     $valueAttr=$vdObject->fieldname;
                     $value=$sc->relationalMapping($model, $r, $valueAttr);

                   echo CHtml::encode($value);
                 }  
      }
      
      // @returns listview_params or gridview_params array
      public function getServiceView($name_alias){
          
       if($this->_service){
              
          $labels=array();
          $fieldnames=array();
          $fieldtypes=array();
          $linkids=array();
          $relations=array();
          $linkpath=array();
          $options_type=array();
          
          $criteria=new CDbCriteria();
          $criteria->condition="service_id=:service_id and name_alias=:name_alias";
          $criteria->params=array(':service_id'=>$this->_service->id,':name_alias'=>$name_alias);
          
          $view=Views::model()->find($criteria);                  //array('service_id'=>$this->_service->id,'name_alias'=>$name_alias)
          if($view){     
              //get view details
              $crit=new CDbCriteria();
              $crit->condition='view_id='.$view->id.' and _status=1';
              $crit->order='display_order';
               $viewdetails=  ViewDetails::model()->findAll($crit);
               if($viewdetails){         
                  foreach($viewdetails as $vd){
                    
                    
                     $fieldnames[$vd->id]=$vd->fieldname; 
                    $labels[$vd->id]= $vd->label; 
                    $fieldtypes[$vd->id] = $vd->fieldtypes;
                    $linkids[$vd->id] = $vd->linkid;
                    $r=explode(',',$vd->relations); if(!is_array($r)){ $r=array('');   }
                    $relations[$vd->id] = $r; // print_r($relations); 
                    $linkpath[$vd->id] = $vd->linkpath;
                    $options_type[$vd->id] = $vd->options_type;
                    
                  }
                  
                  if($view->view_type=="list"){
                      $this->listview_params=array('labels'=>$labels,'fieldnames'=>$fieldnames,'linkids'=>$linkids,'relations'=>$relations,
                                                   'linkpath'=>$linkpath);
                      
                  }
                  else if($view->view_type=="grid"){   
                      $this->gridview_params=array('labels'=>$labels,'fieldnames'=>$fieldnames,'gridid'=>$view->gridid,'relations'=>$relations,'fieldtypes'=>$fieldtypes,
                                                   'presentation'=>$view->presentation);
                  }
                  else if($view->view_type=="hybridgrid"){
                        $other_params=explode(',',$view->other_params);
                         $form = trim($other_params[0]);
                         $detail=trim($other_params[1]);
                         if(isset($other_params[2]))
                           $disable_create=trim($other_params[2]);
                         else
                            $disable_create = 0;
                        
                      $this->gridview_params=array('labels'=>$labels,'fieldnames'=>$fieldnames,'gridid'=>$view->gridid,'relations'=>$relations,'fieldtypes'=>$fieldtypes,
                                                   'presentation'=>$view->presentation, 'form'=>$form, 'detail'=>$detail, 'disable_create'=>$disable_create);
                  }
                  else if($view->view_type=="editablegrid"){   
                      $this->gridview_params=array('labels'=>$labels,'fieldnames'=>$fieldnames,'gridid'=>$view->gridid,'relations'=>$relations,'fieldtypes'=>$fieldtypes,
                                                   'presentation'=>$view->presentation, 'options_type'=>$options_type);
                  }
                  else if($view->view_type=="detail"){
                      $this->listview_params=array('labels'=>$labels,'fieldnames'=>$fieldnames,'linkids'=>$linkids,'relations'=>$relations,
                                                   'linkpath'=>$linkpath, 'gridid'=>$view->gridid);   
                  }
                 
                  
               
               }
               else{
                   
                   throw new CHttpException(404,'View Details for '.$name_alias.' not found' );
               }
               return $view;
          }
          else{
              return false;
          }
       }
      }
      
      public function showDraggableControls($view_name_alias){
          
         
          $viewObject=$this->getServiceView($view_name_alias);
          if($viewObject){
            if($viewObject->_status==1){     
              $view_id=$viewObject->id;
              $models=ViewDetails::model()->findAllByAttributes(array('view_id'=>$view_id));
              if($models){  
                  foreach($models as $model){  
                      Views::model()->draggableControl($this->_controller,"DragDiv_".$model->id,$model->fieldname);
                  }
              }
              
            }
          }
      }
      
      public function showDroppableControls($view_name_alias){
          $return = '';
          $viewObject=$this->getServiceView($view_name_alias);
          if($viewObject){
            if($viewObject->_status==1){   
              $view_id=$viewObject->id;
              $cr=new CDbCriteria();
              $cr->condition="view_id=$view_id";
              $cr->order='display_order';
              $models=ViewDetails::model()->findAll($cr);
              if($models){  
                  foreach($models as $model){  
                      $return = Views::model()->droppableControl($this->_controller,"DropDiv_".$model->id,$model->fieldname);
                  }
              }
              return $return;
            }
          }
      }
      
      public function getAutomatedFormElements($model,$viewobject, $additional_params=array()){
         
          
          $title="<h3> $viewobject->title </h3>";
           $elements=array();
           $buttons=array();
           
           //get viewdetails
            $criteria=new CDbCriteria();
            $criteria->condition="view_id=$viewobject->id and _status=1";
            $criteria->order='display_order';
            $viewdetails=ViewDetails::model()->findAll($criteria);
            if($viewdetails){ 
             
                 $elements[]= '<div id="myajaxflash"> </div>';
                 $elements["submit"]=array(
                                            'type'=>'hidden',
                                            'value'=>0,
                                            //'label'=>$vd->label,
                                           ); 
                 
                foreach($viewdetails as $vd){
                    
                 if($vd->fieldtypes=="textfield"){   
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'text',
                                            //'maxlength'=>32,
                                            'label'=>$vd->label,
                                            'attributes'=>array(),
                                           ); 
                 }

                 else if($vd->fieldtypes=="hidden"){   $method=$vd->functions;
                    $elements["$vd->fieldname"]=array(
                                            'type'=>'hidden',
                                            //'value'=>$method(),
                                           ); 
                    if(isset($method)){
                        $elements["$vd->fieldname"]['value'] = $model->$method();
                    }
                 }
                 else if($vd->fieldtypes=="textarea"){
                     $cols = 30;
                     $rows = 2;
                     
                     $options = WidgetHelper::explode_assoc($vd->other_params, array(',',':'));
                     if(isset($options['cols'])){
                         $cols = $options['cols'];
                     }
                     if(isset($options['rows'])){
                         $rows = $options['rows'];
                     }
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'textarea',
                                            'label'=>$vd->label,
                                            'cols'=>$cols,
                                            'rows'=>$rows
                                           ); 
                 }
                 else if($vd->fieldtypes=="dropdownlist"){  
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'dropdownlist',
                                            'items'=>ViewElementOptions::model()->getOptions($vd,$model), 
                                            'prompt'=>'Please select:',
                                            'label'=>$vd->label,
                                           ); 
                 }
                 else if($vd->fieldtypes=="radiolist"){  
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'radiolist',
                                            'items'=>ViewElementOptions::model()->getOptions($vd,$model), 
                                           // 'prompt'=>'Please select:',
                                            'label'=>$vd->label,
                                            'separator'=>' ',
                                            'labelOptions'=>array('style'=>'display:inline'),
                                           ); 
                 }
                 else if($vd->fieldtypes=="checkboxlist"){  
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'checkboxlist',
                                            'items'=>ViewElementOptions::model()->getOptions($vd,$model), 
                                           // 'prompt'=>'Please select:',
                                            'label'=>$vd->label,
                                            'separator'=>' ',
                                            //'class'=>'default_class'
                                            'labelOptions'=>array('style'=>'display:inline'), 
                                           ); 
                 }
                 else if($vd->fieldtypes=="datetimepicker"){ 
                      
                     $elements["$vd->fieldname"]='<div id="'.$vd->fieldname.'_div" class="row field_'.$vd->fieldname.'"><label>'.$vd->label.'</label>'.
                                           $this->_controller->widget('system.extensions.configuration.widgets.CJuiDateTimePicker.CJuiDateTimePicker',array(
                                             'model'=>$model, //Model object
                                             'attribute'=>$vd->fieldname,
                                            // 'value'=>$model->{$vd->fieldname}, //attribute name
                                             'mode'=>'datetime', //use "time","date" or "datetime" (default)
                                             'options'=>array(
                                                     'showAnim'=>'fold',
                                                     'showButtonPanel'=>true,                     
                                                     'dateFormat'=>'yy-mm-dd',
                                                                     'yearRange' =>'1960:2030',
                                                                     'changeYear'=>'true',//allow you to change year
                                                                                ) // jquery plugin options
                                            ),true).'</div>';
                     
                   
                 }
                  else if($vd->fieldtypes=="datepicker"){ 
                      
                     $elements["$vd->fieldname"]='<div id="'.$vd->fieldname.'_div" class="row field_'.$vd->fieldname.'"><label>'.$vd->label.'</label>'.
                                           $this->_controller->widget('system.extensions.configuration.widgets.CJuiDateTimePicker.CJuiDateTimePicker',array(
                                             'model'=>$model, //Model object
                                             'attribute'=>$vd->fieldname,
                                            // 'value'=>$model->{$vd->fieldname}, //attribute name
                                             'mode'=>'date', //use "time","date" or "datetime" (default)
                                             'options'=>array(
                                                     'showAnim'=>'fold',
                                                     'showButtonPanel'=>true,                     
                                                     'dateFormat'=>'yy-mm-dd',
                                                                     'yearRange' =>'1960:2030',
                                                                     'changeYear'=>'true',//allow you to change year
                                                     ) // jquery plugin options
                                            ),true).'</div>';
                     
                   
                 }
                  else if($vd->fieldtypes=="timepicker"){ 
                      
                     $elements["$vd->fieldname"]='<div id="'.$vd->fieldname.'_div" class="row field_'.$vd->fieldname.'"><label>'.$vd->label.'</label>'.
                                           $this->_controller->widget('system.extensions.configuration.widgets.CJuiDateTimePicker.CJuiDateTimePicker',array(
                                             'model'=>$model, //Model object
                                             'attribute'=>$vd->fieldname,
                                            // 'value'=>$model->{$vd->fieldname}, //attribute name
                                             'mode'=>'time', //use "time","date" or "datetime" (default)
                                             'options'=>array(
                                                     'showAnim'=>'fold',
                                                     'showButtonPanel'=>true,                     
                                                     'dateFormat'=>'yy-mm-dd',
                                                                     'yearRange' =>'1960:2030',
                                                                     'changeYear'=>'true',//allow you to change year
                                                                                ) // jquery plugin options
                                            ),true).'</div>';
                     
                   
                 }
                 else if($vd->fieldtypes=="password"){
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'password',
                                            'label'=>$vd->label,
                                           ); 
                 }
                 else if($vd->fieldtypes=="file"){
                     $elements["$vd->fieldname"]='<div id="'.$vd->fieldname.'_div" class="row"> '.$vd->label.': 
                                                  <input name="'.$vd->fieldname.'" type="file" id="'.$vd->fieldname.'" />  '.
                                                 '</div>'; 
                 }
                 else if($vd->fieldtypes=="checkbox"){  
                     $elements["$vd->fieldname"]=array(
                                            'type'=>'checkbox',
                                            'label'=>$vd->label,
                                            'attributes'=>array('value'=>1,'unCheckValue'=>0),
                                           ); 
                 }
                 else if($vd->fieldtypes=="literal"){  $method=$vd->functions;
                     $elements["$vd->fieldname"]='<div id="'.$vd->fieldname.'_div" class="row"> '.$model->$method().
                                                 '</div>';  
                 }
                 else if($vd->fieldtypes == "autocomplete"){
                     $elements["$vd->fieldname"]= '<div class="row field_'.$vd->fieldname.'"><label>'.$vd->label.'</label>'.
                                                $this->_controller->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                        	    'name'=>$vd->fieldname,
                                        	    //'value'=>'test21',
                                        	    'source'=>$this->_controller->createUrl($vd->linkpath),
                                                    'options'=>array(
                                                            'minLength'=>'1', // min chars to start search
                                                            'select'=>'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }'
                                                    ),
                                        	    // additional javascript options for the autocomplete plugin
                                        	    'options'=>array(
                                        	            'showAnim'=>'fold',
                                        	    ),
                                        	),true).'</div>';  
                     
                 }
                 else if($vd->fieldtypes=="submitbutton"){
                     $buttons["$vd->fieldname"]=array(
                                            'type'=>'submit',
                                            'label'=>$vd->label,
                                            'id'=>$vd->fieldname.'-id',
                                           // 'onClick'=>"$('#{$viewobject->view_model}_submit').val('1');"
                                           ); 
                 }
                 else if($vd->fieldtypes=="ajaxsubmitbutton"){  // print $this->_controller->createAbsoluteUrl('automated/create',array('view'=>'PaymentMethods_methods')); exit;
                                                             
                     $buttons["$vd->fieldname"]=array(
                                            'type'=>'button',
                                            'label'=>$vd->label,
                                            'id'=>$vd->fieldname.'-id',
                                            'onClick'=>"ajaxFormSubmit('{$this->_controller->createAbsoluteUrl($additional_params['form_action_route'],$additional_params['form_action_params'])}','hybridgrid-{$viewobject->view_model}_hybridgrid','{$viewobject->name_alias}');",

                                           ); 
                 }
                  else if($vd->fieldtypes=="ajaxbutton"){
                      $method=$vd->functions;
                      $onclick='';
                      if($vd->functions){
                          $onclick = $model->$method($this->_controller,$viewobject, $additional_params); 
                      }
                      else
                        $onclick = "ajaxFormSubmit('{$this->_controller->createAbsoluteUrl($additional_params['form_action_route'],$additional_params['form_action_params'])}','$viewobject->other_params','{$viewobject->name_alias}'); return false;";  
                                                       
                     $buttons["$vd->fieldname"]=array(
                                            'type'=>'button',
                                            'label'=>$vd->label,
                                            'id'=>$vd->fieldname.'-id',
                                            'onClick'=>$onclick,

                                           ); 
                 }
                
               }
            }
           
           

            $formArray= array(
                              'activeForm' => array(
                                                    'class' => 'CActiveForm',
                                                    'enableAjaxValidation' => true,
                                                    'enableClientValidation' => false,
                                                    'id' => $viewobject->gridid,
                                                    'htmlOptions' =>array('enctype'=>"multipart/form-data" ),
                                                    //'action'=>CHtml::normalizeUrl('index.php?r=prescription/create'),
                                                    ),
                             'title'=>$title, 
                             'showErrorSummary' => true,
                             'inputElementClass'=>'CMonkFormInputElement',
                             'elements'=>$elements,
                             'buttons'=>$buttons
                       );
                      // print_r($elements); exit;
            return $formArray;
      }
      
      public static function ajaxUpdate($model_name,$presentation){
          
          if($presentation=='float'){
              
              return 'js:function(e){  
                                    e.preventDefault();
                                     $( "#'.$model_name.'-dialog-id" ).children( ":eq(0)" ).empty(); 
                                    getUpdateDialog($( this ).attr( \'href\' ),"'.$model_name.'_form","'.$model_name.'-dialog-id"); 
                                    $("#'.$model_name.'-dialog-id").dialog("open"); return false;
                               }';

          }
          if($presentation=='slide'){
              return 'js:function(e){}';
          }
          
          return 'js:function(e){}';
      }
      
      public function getCreateForm($view, $additional_params=array()){
          
          $return = array();
          
          if($this->getService()){
            
                $viewObject=$this->getServiceView($view);   

                $modelName=$viewObject->view_model;
                
                if(isset($additional_params['form_action_params']['id'])){  
                    $model=new $modelName('update');  
                    $model = $model->findByPk($additional_params['form_action_params']['id']);
                   
                }
                else
                    $model=new $modelName;
              
                $return['model'] = $model;
                $return['viewObject'] = $viewObject;
                
                return $return;
                
        }
        
      }
      
      public function showTabView($tabs,$id){
          
           $this->_controller->widget('zii.widgets.jui.CJuiTabs', array(
                    'tabs'=>$tabs,
                    'options'=>array(
                        'collapsible'=>true,
                        'selected'=>0,
                        
                    ),
                    'htmlOptions'=>array(
                        'style'=>'width:100%; ',
                        'idPrefix'=>$id,
                        
                    ),
           ));
           
           
      }
      
      public function showHybridGridView($view_title,$name_alias,$filter=array()){
          
            $viewobject=$this->getServiceView($name_alias);
            if($viewobject){     
                if($viewobject->_status==1){      
                  $class=$viewobject->view_model;
                  $view=$viewobject->view_name; 
                  $path=strtolower($class);
                    if($view=="automated"){
                           $path='automated';
                           $view='hybridgrid'; 
                    }
                    
                       
                       print "<p><h3>".$view_title."</h3></p>";
                       
                       
                       $model=new $class("../$class/search");
                            $model->unsetAttributes();  // clear any default values

                            if(isset($_GET["$class"]))
                                    $model->attributes=$_GET["$class"];
                            
                            $this->_controller->renderPartial("../$path/$view",array(
                                    'model'=>$model, 'filter'=>$filter, 'viewID'=>$viewobject
                            ),false,true);
                            
                  }
            }
      }
      
      public function showEditableGridView($view_title,$name_alias,$filter=array()){
            $viewobject=$this->getServiceView($name_alias);
            if($viewobject){     
                if($viewobject->_status==1){      
                  $class=$viewobject->view_model;
                  $view=$viewobject->view_name; 
                  $path=strtolower($class);
                    if($view=="automated"){
                           $path='automated';
                           $view='editablegrid'; 
                    }

                       print "<p><h3>".$view_title."</h3></p>";

                       $model=new $class("../$class/search");
                            $model->unsetAttributes();  // clear any default values

                            if(isset($_GET["$class"]))
                                    $model->attributes=$_GET["$class"];

                            $this->_controller->renderPartial("../$path/$view",array(
                                    'model'=>$model, 'filter'=>$filter, 'viewID'=>$viewobject
                            ),false,true);
                  }
            }
      }
          
      public static function MenuRenderer($controller_id, $default_items=array(), $module=''){
           $modelName = $controller_id;
           //get menu portlet of this request
           $bool = false;
           $items = array();
           $portlet = new Portlets;
           $portlet = $portlet->findByAttributes(array('portlet_model'=>$modelName,'portlet_name'=>'MenuPortlet'));
           if($portlet){
               if($portlet->scope == "specific"){
                   $bool=true;   
                   //create a dynamic object and pull the specific menu for this request.
                   $model = new $modelName();
                   $items = $model->MenuRenderer();
                   
               }
               
           }
           if(!$bool){
             //check if we have a module level menu
             if($module){
                 $portlet = new Portlets;
                 $portlet = $portlet->findByAttributes(array('name_alias'=>$module.'_menu','portlet_name'=>'MenuPortlet'));
                 if($portlet){  
                     $modelName = $portlet->portlet_model;
                     $model = new $modelName();
                     $items = $model->MenuRenderer();
                 }
             }
             if(empty ($items)){
                 $items = $default_items;
             }
             
           }
           
           return $items;
      }
      
      public function ajaxResetValidationFields($model,$row=''){
            
         
           $string =  "<script type='text/javascript'>";
                    $attributes = $model->attributeLabels();
                    
                    foreach($attributes as $key=>$label){
                        if(isset($row)){
                            $string .="$('#{$key}{$row}').css({'border-color': '#ffffff'});";   
                            $string .="$('#{$key}{$row}').css({'background-color': '#ffffff'});";   //#C6D880
                            $string .="$('#{$key}{$row}').css({'color': '#264409'});"; 
                        }
                        else{
                            $string .="$('#{$key}').css({'border-color': '#ffffff'});";   
                            $string .="$('#{$key}').css({'background-color': '#ffffff'});"; 
                            $string .="$('#{$key}').css({'color': '#264409'});"; 
                        }
                         
                    }
                    $string .=  "</script>";
                     
            return $string;
      }
      
      public function ajaxShowValidationErrors($model,$row=''){
          
          $string = '';
          if($model->hasErrors()){
                        $message = '';
                        $string .=  "<script type='text/javascript'>
                                     // $('#ajaxflash').css({ 'color': '#ffffff'});
                                     $('#Error_$row').css({ 'color': '#ffffff'});
                                    ";
                        
                        foreach($model->getErrors() as $field=>$errors){
                            
                            if(isset($row)){
                                $string .="$('#{$field}{$row}').css({'border-color': 'maroon'});";   
                                $string .="$('#{$field}{$row}').css({'background-color': '#ffffff'});"; 
                                $string .="$('#{$field}{$row}').css({'color': '#8a1f11'});"; 
                            }
                            else{
                                 $string .="$('#{$field}').css({'border-color': 'maroon'});";   
                                 $string .="$('#{$field}').css({'background-color': '#ffffff'});";  //#FBE3E4
                                 $string .="$('#{$field}').css({'color': '#8a1f11'});"; 
                            }
                            
                            
                            foreach($errors as $error){
                               
                                $message .=$error."<br/>";
                            }
                        }
                         $string .=  "</script>";
                         $string .= $message;
                       
           }
           
           return $string;
      }
      
      
      public function registerAssets($viewobject){
          
           $cs=Yii::app()->clientScript;
           $widgetHelper=new WidgetHelper();
           $assets=$viewobject->assets_files;
           if($assets){
              $assetsArray=$widgetHelper::explode_assoc($assets,array(',',':'));
               if(isset($assetsArray['js'])){
                   $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/general-validate.js', CClientScript::POS_HEAD); 
                   $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/'.trim($assetsArray['js']), CClientScript::POS_HEAD); 
               }
               if(isset($assetsArray['css'])){
                   $uri =  Yii::app()->theme->baseUrl."/css/".trim($assetsArray['css']);
                   $cs->registerCssFile($uri, 'screen');
               }
           }
             
      }
      
      public function showForm($form_action_route, array $form_action_params, $view_file='/automated/form', $return = false){
               
               $add_params=array(
                                 'form_action_route' => $form_action_route,
                                 'form_action_params' => $form_action_params
                             );
                
                $formArray = $this->getCreateForm($form_action_params['view'],$add_params);
                $model = $formArray['model'];
                $viewObject = $formArray['viewObject'];
                
                if (method_exists ($model ,  "ajaxServiceBeforePost") ){
                  $errors = $model->ajaxServiceBeforePost($form_action_params['token'],$form_action_params);
                }
                
                if(!$return){
                  echo $this->_controller->renderPartial($view_file,array('sc'=>$this,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$add_params),true,true);
                }
                else{
                   return $this->_controller->renderPartial($view_file,array('sc'=>$this,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$add_params),true,true);
                }
      }
      
      public function launchDiv($div)
      {
             
        echo CJSON::encode(array(
              'status'=>'failure',
              'div'=>$div
              ));
     }
        
    
}

?>
