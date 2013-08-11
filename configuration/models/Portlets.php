<?php

/**
 * This is the model class for table "sus_portlets".
 *
 * The followings are the available columns in table 'sus_portlets':
 * @property integer $id
 * @property integer $service_id
 * @property string $portlet_name
 * @property string $name_alias
 * @property string $portlet_desc
 * @property integer $_status
 * @property string $sidebar
 * @property string $portlet_title
 * @property string $portlet_render
 * @property string $scope
 * @property string $label
 * @property string $relations
 * @property string $viewpath
 * @property string $viewid
 * @property string $portlet_model
 * @property string $additional_model
 * @property string $relation_fk
 * @property string $portlet_head_model
 * @property string $portlet_title_suffix
 * @property string $portlet_data_filter
 *
 * The followings are the available model relations:
 * @property Service $service
 */
class Portlets extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer service_id
 * @soap
*/
public  $service_id;

/**
 * @var string portlet_name
 * @soap
*/
public  $portlet_name;

/**
 * @var string name_alias
 * @soap
*/
public  $name_alias;

/**
 * @var string portlet_desc
 * @soap
*/
public  $portlet_desc;

/**
 * @var integer _status
 * @soap
*/
public  $_status;

/**
 * @var string sidebar
 * @soap
*/
public  $sidebar;

/**
 * @var string portlet_title
 * @soap
*/
public  $portlet_title;

/**
 * @var string portlet_render
 * @soap
*/
public  $portlet_render;

/**
 * @var string scope
 * @soap
*/
public  $scope;

/**
 * @var string label
 * @soap
*/
public  $label;

/**
 * @var string relations
 * @soap
*/
public  $relations;

/**
 * @var string viewpath
 * @soap
*/
public  $viewpath;

/**
 * @var string viewid
 * @soap
*/
public  $viewid;

/**
 * @var string portlet_model
 * @soap
*/
public  $portlet_model;

/**
 * @var string additional_model
 * @soap
*/
public  $additional_model;

/**
 * @var string relation_fk
 * @soap
*/
public  $relation_fk;

/**
 * @var string portlet_head_model
 * @soap
*/
public  $portlet_head_model;

/**
 * @var string portlet_title_suffix
 * @soap
*/
public  $portlet_title_suffix;

/**
 * @var string portlet_data_filter
 * @soap
*/
public  $portlet_data_filter;


	/**
	 * Returns the static model of the specified AR class.
	 * @return Portlets the static model class
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
		return 'meta_portlets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_id, _status', 'numerical', 'integerOnly'=>true),
			array('portlet_name, name_alias, sidebar, portlet_title, portlet_render, scope, label, viewid, portlet_model, additional_model, relation_fk, portlet_head_model, portlet_title_suffix, portlet_data_filter', 'length', 'max'=>100),
			array('relations', 'length', 'max'=>500),
			array('viewpath', 'length', 'max'=>200),
			array('portlet_desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_id, portlet_name, name_alias, portlet_desc, _status, sidebar, portlet_title, portlet_render, scope, label, relations, viewpath, viewid, portlet_model, additional_model, relation_fk, portlet_head_model, portlet_title_suffix, portlet_data_filter', 'safe', 'on'=>'search'),
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
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_id' => 'Service',
			'portlet_name' => 'Portlet Name',
			'name_alias' => 'Name Alias',
			'portlet_desc' => 'Portlet Desc',
			'_status' => 'Status',
			'sidebar' => 'Sidebar',
			'portlet_title' => 'Portlet Title',
			'portlet_render' => 'Portlet Render',
			'scope' => 'Scope',
			'label' => 'Label',
			'relations' => 'Relations',
			'viewpath' => 'Viewpath',
			'viewid' => 'Viewid',
			'portlet_model' => 'Portlet Model',
			'additional_model' => 'Additional Model',
			'relation_fk' => 'Relation Fk',
			'portlet_head_model' => 'Portlet Head Model',
			'portlet_title_suffix' => 'Portlet Title Suffix',
			'portlet_data_filter' => 'Portlet Data Filter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filter=array())
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('portlet_name',$this->portlet_name,true);
		$criteria->compare('name_alias',$this->name_alias,true);
		$criteria->compare('portlet_desc',$this->portlet_desc,true);
		$criteria->compare('_status',$this->_status);
		$criteria->compare('sidebar',$this->sidebar,true);
		$criteria->compare('portlet_title',$this->portlet_title,true);
		$criteria->compare('portlet_render',$this->portlet_render,true);
		$criteria->compare('scope',$this->scope,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('relations',$this->relations,true);
		$criteria->compare('viewpath',$this->viewpath,true);
		$criteria->compare('viewid',$this->viewid,true);
		$criteria->compare('portlet_model',$this->portlet_model,true);
		$criteria->compare('additional_model',$this->additional_model,true);
		$criteria->compare('relation_fk',$this->relation_fk,true);
		$criteria->compare('portlet_head_model',$this->portlet_head_model,true);
		$criteria->compare('portlet_title_suffix',$this->portlet_title_suffix,true);
		$criteria->compare('portlet_data_filter',$this->portlet_data_filter,true);
                
                 if($filter){
                    if(isset($filter['model_id'])){
                        $criteria->condition='id='.$filter['model_id'];
                    }       
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
        
         public function students_by_class(){
            
            $returnArray=array("$this->portlet_title");
            $i=1;
            //get class list
            $classes=TblClass::model()->findAll();
            foreach($classes as $class){
               
               array_push($returnArray,array('label'=>$class->class_name, 'url'=>array('view'), 
                   'items'=>array()
                   ));
               
               
                  
               
               //get students list for each class
               $students=Student::model()->findAllByAttributes(array('class_id'=>$class->id));
               $j=0;
               foreach($students as $student){
                  
                   if(is_array($returnArray[$i]['items'])){
                    array_push($returnArray[$i]['items'],array('label'=>"   - ".$student->student_fname." ".$student->student_lname, 'url'=>array('view')
                        ));
                    
                    
                   }
                  
                $j++;
               }
               
               $i++;
            }
            
            return $returnArray;
                      
        }

        public function teachers(){
            $returnArray=array("$this->portlet_title");
            $i=1;
            //get class list
            $teachers=SusTeacher::model()->findAll();
            foreach($teachers as $teacher){
               
               array_push($returnArray,array('label'=>$teacher->teacher_fname." ".$teacher->teacher_lname, 'url'=>array('susteacher/view','id'=>$teacher->id), 
                   'items'=>array()
                   ));
               
            }
            
            return $returnArray;
        }
        
        public function MultiPortlets($params){
            
           
            //get class list
            $model=$this->portlet_head_model;
            $model=new $model();
            $headerModel=$model->findAll();
            foreach($headerModel as $hm){  
              $title=$this->portlet_title;  
              $title=$hm->$title; 
              
              $dataArray=array("$title  $this->portlet_title_suffix");
              
              //get portlet data
              $additionalModel=$this->additional_model;
              $additionalModel=new $additionalModel();
              $ports=$additionalModel->findAllByAttributes(array("$this->portlet_data_filter"=>$hm->id));
              
             $sc = new ServiceComponent();
               
              foreach($ports as $object){    
               $r=explode(',',$this->relations); if(!is_array($r)){ $r=array('');   }  
                  
                    $value=$sc->relationalMapping($object, $r, $this->label);  
                    $label=$value;
              
               
                 $viewpath=$this->viewpath;
                 $viewid=$this->viewid;
                 array_push($dataArray, array( 'label'=>$label, 'url'=>array($viewpath,'id'=>$object->$viewid) ));
               
               }
  
               $pg=new PortletGenerator();
               $pg->portlet($params['controller'],array_shift($dataArray),$dataArray,$this->sidebar,$this->portlet_render);
               
              
               
            }
            
            return 1;
        }
        
        public function automatedPortlet (array $params=array()){
          
                if($params['title']!=""){
                    $returnArray=array($params['title']);
                }
                else {
                   $returnArray=array("$this->portlet_title"); 
                }

            //evaluate relations
            $label="";

            foreach($params['object'] as $object){    
                $sc=new ServiceComponent();

                $value=$sc->relationalMapping($object, $params['relations'], $params['label']);
                $id=$sc->relationalMapping($object, $params['relations'], $params['viewid']);
                
               array_push($returnArray,array( 'label'=>$value, 'url'=>array($params['view'],'id'=>$id) ));
               
            }
            
            return $returnArray;
        }
        
        public function manualPortlet(array $params=array()){

                $portletdata=array();
                $modelname1=$this->portlet_model;
                $methodname=$this->name_alias;
                $modelname=new $modelname1();
                if(method_exists($modelname, $methodname)){
                  $portletdata=$modelname->$methodname($this,$params);
                }
                
                
                return $portletdata;
        }
        
       public function getAjaxButtons(){
            
           $model = "Portlets";
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
              
               

               echo $view.$update.$delete;
           }
            
        }
}

