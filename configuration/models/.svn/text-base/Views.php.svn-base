<?php

/**
 * This is the model class for table "sus_views".
 *
 * The followings are the available columns in table 'sus_views':
 * @property integer $id
 * @property integer $service_id
 * @property string $view_name
 * @property string $view_desc
 * @property integer $_status
 * @property integer $default
 * @property string $view_model
 * @property string $view_type
 * @property string $gridid
 * @property string $name_alias
 * @property string $title
 * @property string $other_params
 *
 * The followings are the available model relations:
 * @property ViewDetails[] $viewDetails
 * @property Service $service
 */
class Views extends MetaActiveRecord
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
 * @var string view_name
 * @soap
*/
public  $view_name;

/**
 * @var string view_desc
 * @soap
*/
public  $view_desc;

/**
 * @var integer _status
 * @soap
*/
public  $_status;

/**
 * @var integer default
 * @soap
*/
public  $default;

/**
 * @var string view_model
 * @soap
*/
public  $view_model;

/**
 * @var string view_type
 * @soap
*/
public  $view_type;

/**
 * @var string gridid
 * @soap
*/
public  $gridid;

/**
 * @var string name_alias
 * @soap
*/
public  $name_alias;

/**
 * @var string title
 * @soap
*/
public  $title;

/**
 * @var string title
 * @soap
*/
public  $other_params;


public $addDetails;


	/**
	 * Returns the static model of the specified AR class.
	 * @return Views the static model class
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
		return 'meta_views';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_id, _status, default', 'numerical', 'integerOnly'=>true),
			array('view_name, view_model, gridid, name_alias', 'length', 'max'=>100),
			array('view_type', 'length', 'max'=>30),
			array('view_desc, title, other_params, presentation, assets_files', 'safe'),
                        array('service_id, _status, view_name, view_desc, default, view_model, view_type, gridid', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_id, view_name, view_desc, _status, default, view_model, view_type, gridid, name_alias, title', 'safe', 'on'=>'search'),
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
			'viewDetails' => array(self::HAS_MANY, 'ViewDetails', 'view_id'),
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
			'view_name' => 'View Name',
			'view_desc' => 'View Description',
			'_status' => 'Status',
			'default' => 'Default',
			'view_model' => 'View Model',
			'view_type' => 'View Type',
			'gridid' => 'Gridid',
			'name_alias' => 'Name Alias',
                        'title' => 'Title',
                        'other_params'=>'other params',
                        'assets_files'=>'assets_files'
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
		$criteria->compare('view_name',$this->view_name,true);
		$criteria->compare('view_desc',$this->view_desc,true);
		$criteria->compare('_status',$this->_status);
		$criteria->compare('default',$this->default);
		$criteria->compare('view_model',$this->view_model,true);
		$criteria->compare('view_type',$this->view_type,true);
		$criteria->compare('gridid',$this->gridid,true);
		$criteria->compare('name_alias',$this->name_alias,true);
                $criteria->compare('title',$this->title,true);
                $criteria->compare('other_params',$this->other_params,true);
                $criteria->compare('assets_files',$this->assets_files,true);
                
                if($filter){
                    if(isset($filter['id'])){
                        $criteria->condition='id='.$filter['id'];
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
        
          public function getServiceName($viewName){
            $view=Views::model()->findByAttributes(array('name_alias'=>$viewName));
            if($view){
                return $view->service->service_name;
            }
            else {
                return '';
            }
        }
        
        public function draggableControl($controller,$divid,$valueText){
             //some draggable object
            $controller->beginWidget('zii.widgets.jui.CJuiDraggable',
                    
                    array(  
                            'id'=>$divid,
                            'htmlOptions'=>array(
                                    'style'=>'float:left;width:auto;height:auto;background:#FFEAEE;margin:10px;',
                            ),
                    ));
            echo $valueText;
            $controller->endWidget();
        }
        
        public function droppableControl($controller,$divid,$valueText){
             //some droppable object (dropzone)
            $controller->beginWidget('zii.widgets.jui.CJuiDroppable', array(
                    'id'=>$divid,
                    'options'=>array(
                            'drop'=>"js:function( event, ui ) {
                                var url='http://localhost/sus/index.php?r=etagService/views/drop';
                                var dropdiv=this.id;
                                var dropvalue=$('#'+dropdiv).text(); 
                                dropvalue=$.trim(dropvalue);
                                
                                var dragdiv=ui.draggable[0].id;  
                                var dragvalue=$('#'+dragdiv).text(); 
                                dragvalue=$.trim(dragvalue);
                                setDraggablePosition(url,dragdiv,dragvalue,dropdiv,dropvalue);
                                 
                               }", //remember put js:
                    ),
                    'htmlOptions'=>array(
                            'style'=>'float:left;width:100%;height:30px;background:#EEFFEE;margin:10px;color:green;',
                    )
            ));
            echo $valueText;

            $controller->endWidget();
        }
        
        public function beforeSave(){
            
           $this->name_alias=$this->gridid;
           
           return true;
        }
        //CustomAfterSave
        public function AfterSave(){
            
            
            //insert default view details
            if($this->isNewRecord){
                
               $this->insertViewDetails();
               $this->insertPermissions();
            }
        }
        
        public function insertViewDetails(){
            
               
               //$modelName=strtolower($this->view_model);
               $modelName=$this->view_model; 
               $model=new $modelName();
               $modelfieldsArray=$model->attributeLabels(); 
               
                 
               while($key = key($modelfieldsArray)) {  

                $vd=new ViewDetails();
                $vd->view_id=$this->id;
                $vd->fieldname=$key;
                $vd->fieldtypes='textfield';
                $vd->label=$modelfieldsArray[$key];
                $vd->_status=1;
                if($key=="id"){
                  $vd->linkid='id';
                  $vd->relation_endattribute='id';
                  $vd->linkpath="$modelName/view";
                }
                if($this->view_type=="editablegrid"){
                    $vd->options_type="CEditableColumn";
                }
                
                $vd->save(false);   
                
                next($modelfieldsArray);
               }

               //checking for other control fields
               if($this->view_type=='grid'){
                   //insert grid button controls
                    $vd=new ViewDetails();
                    $vd->view_id=$this->id;
                    $vd->fieldname="CButtonColumn";
                    $vd->fieldtypes='controls-full';
                    $vd->label='';
                    $vd->_status=1;
                    $vd->save(false);
               }
               elseif($this->view_type=='hybridgrid'){
                   //insert grid button controls
                    $vd=new ViewDetails();
                    $vd->view_id=$this->id;
                    $vd->fieldname="id";
                    $vd->functions="getAjaxButtons()";
                    $vd->fieldtypes='value';
                    $vd->label='';
                    $vd->_status=1;
                    $vd->save(false);
               }
               elseif($this->view_type=='_form'){
                   //insert submit button
                    $vd=new ViewDetails();
                    $vd->view_id=$this->id;
                    $vd->fieldname="button";
                    $vd->fieldtypes='ajaxsubmitbutton';
                    $vd->label='Submit';
                    $vd->_status=1;
                    $vd->save(false);
               }
               
              
               
               
        }
        
         public function getAjaxButtons(){
            
           $model = "Views";
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
        
        public function insertPermissions(){
            if($this->view_type=="hybridgrid" || $this->view_type=="detail" || $this->view_type=="list" ){
                $perm_name=$this->name_alias." access";
                $type="access";
                 //check if already inserted
                $perm=Permissions::model()->findByAttributes(array('perm_name'=>$perm_name));
                if(!$perm){
                $perm = new Permissions();
                $perm->perm_name = $perm_name;
                $perm->_status=1;
                $perm->type=$type;
                if($perm->save(false)){
                    //insert default group perm  for admin access
                    $groupPerm= new GroupPerms();
                    $groupPerm->perm_id=$perm->id;
                    $groupPerm->view_id=$this->id;
                    $groupPerm->group_id=1;
                    $groupPerm->portlet_id=4;
                    $groupPerm->save(false);
                }
             }
            }
          if($this->view_type == "_form"){
              $perm_name=$this->name_alias." edit";
              $type="edit";
               //check if already inserted
                $perm=Permissions::model()->findByAttributes(array('perm_name'=>$perm_name));
                if(!$perm){
                $perm = new Permissions();
                $perm->perm_name = $perm_name;
                $perm->_status=1;
                $perm->type=$type;
                if($perm->save(false)){
                    //insert default group perm  for admin access
                    $groupPerm= new GroupPerms();
                    $groupPerm->perm_id=$perm->id;
                    $groupPerm->view_id=$this->id;
                    $groupPerm->group_id=1;
                    $groupPerm->portlet_id=4;
                    $groupPerm->save(false);
                }
             }
          }
          //insert access permission
               
        }
}

