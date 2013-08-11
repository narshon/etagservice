<?php

/**
 * This is the model class for table "sus_service".
 *
 * The followings are the available columns in table 'sus_service':
 * @property integer $id
 * @property string $service_name
 * @property string $service_desc
 * @property integer $_status
 * @property string $model
 * @property integer $model_id
 * @property string $category
 * @property integer $default
 * @property integer $table_name
 * @property integer $db_name
 *
 * The followings are the available model relations:
 * @property Portlets[] $portlets
 * @property Views[] $views
 */
class Service extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string service_name
 * @soap
*/
public  $service_name;

/**
 * @var string service_desc
 * @soap
*/
public  $service_desc;

/**
 * @var integer _status
 * @soap
*/
public  $_status;

/**
 * @var string model
 * @soap
*/
public  $model;

/**
 * @var integer model_id
 * @soap
*/
public  $model_id;

/**
 * @var string category
 * @soap
*/
public  $category;

/**
 * @var string table_name
 * @soap
*/
public  $table_name;

/**
 * @var string db_name
 * @soap
*/
public  $db_name;

public $addview;
public $addportlet;


	/**
	 * Returns the static model of the specified AR class.
	 * @return Service the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'meta_model';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('_status, model_id, default', 'numerical', 'integerOnly'=>true),
                        array('service_name, service_desc, category, _status, default, model', 'required'),
			array('service_name, category', 'length', 'max'=>100),
			array('service_desc, model, table_name, db_name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_name, service_desc, _status, model, model_id, category, default', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'portlets' => array(self::HAS_MANY, 'Portlets', 'service_id'),
			'views' => array(self::HAS_MANY, 'Views', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_name' => 'Service Name',
			'service_desc' => 'Service Desc',
			'_status' => 'Status',
			'model' => 'Model',
			'model_id' => 'Model',
			'category' => 'Category',
                        'default'=>'default',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filters=array())
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('service_name',$this->service_name,true);
		$criteria->compare('service_desc',$this->service_desc,true);
		$criteria->compare('_status',$this->_status);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('category',$this->category,true);
                
                if(isset($filters)){
                    $condition='';
                   foreach($filters as $field=>$value){
                      $condition = " $field = $value ";
                    }
                    $criteria->condition = $condition;
                 }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
        
         public function behaviors()
        {
            return array(
                'LoggableBehavior'=>
                        'application.modules.auditTrail.behaviors.LoggableBehavior',
            );
        }
        
        public function beforeSave() {
            
           return true;
        }
        
        public  function getService($name,$database){
            $service=Service::model()->findByAttributes(array('service_name'=>$name,'db_name'=>$database));
            if($service){
                
                if($service->_status==1){
                    return $service;
                }
                else{
                    return false;
                }
                
            }
            else {
                return false;
            }
        }
        
      public function getViews($id) {
          
          $views=Views::model()->findAllByAttributes(array('service_id'=>$id));
          if($views){
                return $views;
            }
            else {
                return false;
            }
      }
      
        
        public function generateDefaultViews(){
            //get the models for this service
            $model_names=explode(',',$this->model);
                                                      
            if($model_names){
                //loop through each model and generate default views
            foreach($model_names as $modelname){
             for($i=0; $i<4; $i++){
                    $presentation = "";
                    $other_params = "";
                        
                    if($i==0){
                        //form view name_alias
                        $name_alias=$modelname.'_form';
                        $view_desc="Provides a $modelname form";
                        $view_type='_form';
                    }
                    elseif($i==1){
                        //grid view name_alias
                        $name_alias=$modelname.'_hybridgrid';
                        $view_desc="Provides a $modelname grid view";
                        $view_type='hybridgrid';
                        $presentation = "slide";
                        $other_params = $modelname."_form, ".$modelname."_detail";
                    }
                    elseif($i==2){
                        //grid view name_alias
                        $name_alias=$modelname.'_list';
                        $view_desc="Provides a $modelname's listing";
                        $view_type='list';
                    }
                    elseif($i==3){
                        //grid view name_alias
                        $name_alias=$modelname.'_detail';
                        $view_desc="Provides a $modelname detail's view";
                        $view_type='detail';
                    }
                   $criteria = new CDbCriteria();
                   $criteria->condition = "service_id = {$this->id} and name_alias = '$name_alias'";
                   $searchview=Views::model()->find($criteria);
                   //echo "<pre>"; print_r($searchview);  echo "</pre>"; exit;
                    if(!$searchview){   
                       $view = new Views();
                       $view->service_id=$this->id;
                       $view->view_name='automated';
                       $view->view_desc=$view_desc;
                       $view->_status=1;
                       $view->default=0;
                       $view->view_model=$modelname;
                       $view->view_type=$view_type;
                       $view->gridid=$name_alias;
                       $view->name_alias=$name_alias;
                       $view->presentation=$presentation;
                       $view->other_params=$other_params;
                       $view->save(false);
                       
                      

                    }
                }    
              }
            }
            
            
        }
        
        public function showServices($module_id){
            $services = Service::model()->findAllByAttributes(array('_status'=>1,'category'=>$module_id)); 
            
             echo "<div id='servicesdiv'><br/> <h3> Available Services  </h3> </div>";
            
              if($services){
                  foreach($services as $service){
                      $url=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getservice';
                      $url2=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getviewdetails';
                      $url3=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getservicetabs';
                      if($service->default==1){  
                          Yii::app()->session->add('service_id',$service->id); 
                         
                          echo "<div style='float:left; width:150px; height:30px;'> 
                                 <div style='width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/service-icon.png\"); background-repeat: no-repeat;'>".
                                 CHtml::link(CHtml::encode($service->service_name), "#",array('style'=>'color:green; text-decoration:none;','onClick'=>"showService('$url',$service->id,'serviceinfopane','viewpane','portletspane','viewdetailspane'); showDefaultViewDetails('$url2','viewdetailspane',$service->id );
                                      showAjaxServiceTabs('$url3','Service',$service->id, 'grid' );
                                      showAjaxServiceTabs('$url3','ModelValidations',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelDetails',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelSearch',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelRelations',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','SkipPatterns',$service->id, 'admin' );  ") )."
                                     </div> 
                                </div> "; 
                              
                      }
                      else {
                           
                           echo "<div style='float:left; width:150px; height:30px;'> 
                                     <div style='color:green; width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/service-icon.png\"); background-repeat: no-repeat;'>".
                                      CHtml::link(CHtml::encode($service->service_name), "#",array('style'=>'text-decoration:none;','onClick'=>"showService('$url',$service->id,'serviceinfopane','viewpane','portletspane','viewdetailspane'); showDefaultViewDetails('$url2','viewdetailspane',$service->id );
                                      showAjaxServiceTabs('$url3','Service',$service->id, 'grid' );
                                      showAjaxServiceTabs('$url3','ModelValidations',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelDetails',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelSearch',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','ModelRelations',$service->id, 'admin' );
                                      showAjaxServiceTabs('$url3','SkipPatterns',$service->id, 'admin' );  ") )."
                                     </div> 
                                </div> "; 
                        
                      } 
                  }
                  echo "<p> &nbsp; </p>";
              }
        }
        
        public function showDefaultServiceInfo(){
            $id=Yii::app()->session->get('service_id');
            $service = Service::model()->findByPk($id); //ByAttributes(array('default'=>1,'_status'=>1,'category'=>$module_id)); 
            if($service){

                 echo $service->service_name.": ".$service->service_desc; 
              }
        }
        
        public function getDefaultService($module_id){
            $service = Service::model()->findByAttributes(array('default'=>1,'_status'=>1,'category'=>$module_id)); 
            if($service){

                 return $service->id; 
              }
              return;
        }
        
        public function showServiceInfo($service_id){
            
            $service = Service::model()->findByPk($service_id);
            if($service){
                 return $service->service_name.": ".$service->service_desc; 

              }
            return '';
        }
        
        public function showDefaultServiceViews(){
            $service_id=Yii::app()->session->get('service_id');
            if($service_id){
               $views = Views::model()->findAllByAttributes(array('service_id'=>$service_id,'_status'=>1)); 
      
              if($views){
                        $url=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getviewtabs';
                        $permsurl=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getpermstab&type=view';
                  foreach($views as $view){
                         
                          if($view->default==1){
                               echo "<div style='float:left; width:150px; height:30px;'> 
                                     <div id='view-default' style='background-image:url(\"images/view-icon.png\");' >".
                                      CHtml::link(CHtml::encode($view->name_alias), "#",array('style'=>"text-decoration:none;",'onClick'=>"
                                            showAjaxViewTabs('$url','Views',$view->id, 'grid' );
                                            showAjaxViewTabs('$url','ViewDetails',$view->id, 'admin' );
                                            showAjaxViewTabs('$permsurl','GroupPerms',$view->id, 'admin' );
                                            ") )."
                                                
                                     </div> 
                                </div>";
                          }
                          else{
                              echo "<div style='float:left; width:150px; height:30px;'> 
                                     <div style='color:green; width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/view-icon.png\"); background-repeat: no-repeat;'>".
                                      CHtml::link(CHtml::encode($view->name_alias), "#",array('style'=>"text-decoration:none;",'onClick'=>"
                                                      showAjaxViewTabs('$url','Views',$view->id, 'grid' );
                                                      showAjaxViewTabs('$url','ViewDetails',$view->id, 'admin' );
                                                      showAjaxViewTabs('$permsurl','GroupPerms',$view->id, 'admin' );
                                                     ") )."
                                     </div> 
                                </div>"; 
                          }
                          
                          
                  }
              }
            }
        }
        public function showServiceViews($service_id){
            
            $views = Views::model()->findAllByAttributes(array('service_id'=>$service_id));
            $return='';
            if($views){ 
                 foreach($views as $view){ 
                     $return .= "<div style='float:left; width:150px; height:30px;'> 
                                     <div style='color:green; width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/view-icon.png\"); background-repeat: no-repeat;'>".
                                      CHtml::link(CHtml::encode($view->name_alias), "#",array('style'=>"text-decoration:none;",'onClick'=>"") )."
                                     </div> 
                                </div>"; 
                 }
                 
              }
            return $return;
        }
        public function showDefaultServicePortlets(){
            
            $service_id=Yii::app()->session->get('service_id');
            if($service_id){
               $ports = Portlets::model()->findAllByAttributes(array('service_id'=>$service_id,'_status'=>1)); 
      
              if($ports){
                            $url=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getviewtabs';
                            $permsurl=Yii::app()->params['domainUrl']. Yii::app()->baseUrl.'/index.php?r=configuration/service/getpermstab&type=portlet';
                  foreach($ports as $port){
                           echo "<div style='float:left; width:150px; height:30px;'> 
                                     <div style='color:green; width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/portlet-icon.png\"); background-repeat: no-repeat;'>".
                                      CHtml::link(CHtml::encode($port->name_alias), "#",array('style'=>"text-decoration:none;",'onClick'=>"
                                                    showAjaxViewTabs('$url','Portlets',$port->id, 'admin' );
                                                    showAjaxViewTabs('$permsurl','GroupPerms',$port->id, 'admin' );
                                            ") )."
                                     </div> 
                                </div>"; 
                       
                  }
              }
            }
            
        }
        public function showServicePortlets($service_id){
            
            $ports = Portlets::model()->findAllByAttributes(array('service_id'=>$service_id));
            $return='';
            if($ports){ 
                 foreach($ports as $port){ 
                     $return .= "<div style='float:left; width:150px; height:30px;'> 
                                     <div style='color:green; width:145px; height:26px;  text-align:center; display:table-cell; vertical-align:middle; background-image:url(\"images/portlet-icon.png\"); background-repeat: no-repeat;'>".
                                      CHtml::link(CHtml::encode($port->name_alias), "#",array('style'=>"text-decoration:none;",'onClick'=>"") )."
                                     </div> 
                                </div>"; 
                 }
                 
              }
            return $return;
        }
        public function showDefaultViewDetails ($controller, $module_id){
            
            $return ='';
            $view_elements_layout='';
            $service_id=$this->getDefaultService($module_id);
            $service=Service::model()->findbypk($service_id);
           if($service)
           {
              //get default view for this service and show its details.
              $default_view = Views::model()->findByAttributes(array('service_id'=>$service_id, 'default'=>'1'));
              
              if($default_view){
                                
                 $controller->service=new ServiceComponent($controller,"ViewDetails");
                 $controller->service->showGridView("{$service->service_name} {$default_view->view_type} view details","ViewDetails_grid", $default_view->id);
                 
                 
                 
              }
              
           }
           
           
        }       
        public function showViewDetails($service_id,$controller){
           
          
           
           $service=Service::model()->findbypk($service_id);
           if($service)
           {
              //get default view for this service and show its details.
              $default_view = Views::model()->findByAttributes(array('service_id'=>$service_id, 'default'=>'1'));
              
              if($default_view){
                  $controller->service=new ServiceComponent($controller,"ViewDetails");
                  $controller->service->showGridView("{$service->service_name} {$default_view->view_type} view details","ViewDetails_grid", $default_view->id);
                  
               
              }
            
           }
           
        }
        
        public function getServiceTabs($controller,$array){
            
            $tabs=array();
            
            if(array_key_exists ( "module_id", $array )){
                $service_id = $this->getDefaultService($array['module_id']);
            }
            else{
                $service_id = $this->getDefaultService($array['service_id']);
            }
            
            if($service_id){
                $tabs =  array(
                        'Model Meta'=>$this->ServiceTabContent($controller, "Service", $service_id,"grid"),
                        'Rules'=>$this->ServiceTabContent($controller, "ModelValidations", $service_id, "admin"),
                        'Labels'=>$this->ServiceTabContent($controller, "ModelDetails", $service_id, "admin"),     //$controller->renderPartial('configuration.views.ModelDetails.admin',(array('model_id'=>$service_id)),true,true),
                        'Relations'=>$this->ServiceTabContent($controller, "ModelRelations", $service_id, "admin"),
                        'Search Queries'=>$this->ServiceTabContent($controller, "ModelSearch", $service_id, "admin"),
                        'Skip Patterns'=>$this->ServiceTabContent($controller, "SkipPatterns", $service_id, "admin"),
                );
            }

            return $tabs;
        }
        
        public function ServiceTabContent($controller, $div, $service_id, $view_file){
            
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,(array('model_id'=>$service_id)),true,true)
                       ."</div>";    
            
            return $return;
        }
        
         public function ajaxServiceTabContent($controller, $service_id, $div, $view_file){
             Yii::app()->session->add('service_id',$service_id);
             $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,(array('model_id'=>$service_id)),true,true)
                       ."</div>";  
            echo $return;
            
        }
        public  function ajaxViewTabContent($controller, $view_id, $div, $view_file ){
            
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,(array('model_id'=>$view_id)),true,true)
                       ."</div>";  
            echo $return;
        }
         public  function ajaxPermsTabContent($controller, $view_id, $div, $view_file ){
            
            
             
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,(array('model_id'=>$view_id)),true,true)
                       ."</div>";  
            echo $return;
        }

        public function getAjaxButtons(){
           $model = "Service";
           $gridid = $model."_hybridgrid";
           $update = "";
           $view = "";
           $delete = "";
           $update_url = Yii::app()->createAbsoluteUrl("configuration/automated/update");
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = $model."_form";
           $view_url = Yii::app()->createAbsoluteUrl("configuration/automated/view");
          
           $delete_url = Yii::app()->createAbsoluteUrl("configuration/automated/delete");
               
           
           //get view id
           $viewObject=Views::model()->findByAttributes(array('gridid'=>$gridid));
           if($viewObject){
               $authorizer = new AuthorizationComponent;

               
               if($authorizer->authorize($viewObject->id, "edit")){
                   $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"$(\"#audit-id\").dialog(\"open\"); hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));
               }
               
               if($authorizer->authorize($viewObject->id, "view")){
                   $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
               }
               // the link that may open the dialog
                if($authorizer->authorize($viewObject->id, "delete")){
                     $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
                        'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
                    ));
                }
              
               

               echo $view.$update;
           }
           
            
        }
        
        
        public function getViewTabs($controller,$array){
            
            $tabs =array();
           
            if(array_key_exists ( "module_id", $array )){
                $service_id = $this->getDefaultService($array['module_id']);
            }
            else{
                $service_id = $array['service_id'];
            }
             if($service_id){
                 //Get Default View ID
                $view = Views::model()->findByAttributes(array('service_id'=>$service_id));
                 $viewArray = array('view_id'=>$view->id);

                $tabs =  array(
                            'View Meta'=>$this->ViewTabContent($controller, "Views", $view->id,"grid"),
                            'View Details'=>$this->ViewTabContent($controller, "ViewDetails", $view->id, "admin"),
                            'View Permissions'=>$this->AdvancedTabContent($controller, "GroupPerms", $viewArray, "admin"),     

                    );
             } 
            
            
            return $tabs;
        }
        
        public function AdvancedTabContent($controller, $div, $array_filter, $view_file){
            
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,array('model_id'=>$array_filter),true,true)
                       ."</div>";    
            
            return $return;
        }
        
        public function ViewTabContent($controller, $div, $service_id, $view_file){
            
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,(array('model_id'=>$service_id)),true,true)
                       ."</div>";    
            
            return $return;
        }

        public function getPortletTabs($controller,$array){
            $tabs=array();
            if(array_key_exists ( "module_id", $array )){
                $service_id = $this->getDefaultService($array['module_id']);
                
            }
            else{
                $service_id = $array['service_id'];
            }
            if($service_id){
                    //get default portlet... i.e. first portlet
                    $model_id='';
                    $portlet = Portlets::model()->findByAttributes(array('service_id'=>$service_id));
                    if($portlet){
                        $model_id=$portlet->id;
                        $portArray = array('portlet_id'=>$portlet->id);
                        
                        $tabs =  array(
                                'Portlet Meta'=>$this->portletTabContent($controller, "Portlets", $model_id,"admin"),
                                'Portlet Permissions'=>$this->AdvancedTabContent($controller, "GroupPerms", $portArray, "admin"),     

                        );
                    }
                             
                    
            }

            return $tabs;
        }
        
        public function portletTabContent($controller, $div, $model_id, $view_file){
            
            $filterArray=array();
            if($model_id !=''){
                $filterArray['model_id'] = $model_id;
            }
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,$filterArray,true,true)
                       ."</div>";    
            
            return $return;
        }
        
        public function MenuRenderer(){
            $items = array();
               $id = Yii::app()->getRequest()->getQuery('id');
            $items = array(
                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest ),
				array('label'=>'Hi '.Yii::app()->user->name.', (Logout)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Home', 'url'=>array('/')),
                                array('label'=>'Services', 'url'=>array('/configuration/service/admin','id'=>$id,'section'=>'service')),
                                array('label'=>'Views', 'url'=>array('/configuration/service/admin','id'=>$id,'section'=>'views')),
                                array('label'=>'Portlets', 'url'=>array('/configuration/service/admin','id'=>$id,'section'=>'portlets')),
                                array('label'=>'Audit Trail', 'url'=>array('/auditTrail/admin')),
                                array('label'=>'Other Settings', 'url'=>array('/configuration/service/admin','id'=>$id, 'section'=>'other')),
				
			);
            return $items;
        }
        
        public function getOtherTabs($controller,$array){
            
            $tabs =  array(
                        'Modules'=>$this->otherTabsContent($controller, "module", "Module","admin"),
                        'View Element Options'=>$this->otherTabsContent($controller, "viewElementOptions", "ViewElementOptions", "admin"), 
                        'AD Groups'=>$this->otherTabsContent($controller, "groups", "Groups","admin"),
                        'Permissions'=>$this->otherTabsContent($controller, "permissions", "Permissions","admin"),
                        
                );
            
            return $tabs;
        }
        
        public function otherTabsContent($controller, $div, $modelName,$view_file){
          
            $return = "<div id='$div'>". 
                              $controller->renderPartial('configuration.views.'.lcfirst($div).'.'.$view_file,array(),true,true)
                       ."</div>";    
            
            return $return;
        }
        
}

