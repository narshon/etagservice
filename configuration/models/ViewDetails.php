<?php

/**
 * This is the model class for table "sus_view_details".
 *
 * The followings are the available columns in table 'sus_view_details':
 * @property integer $id
 * @property integer $view_id
 * @property string $fieldname
 * @property string $fieldtypes
 * @property string $label
 * @property string $linkid
 * @property string $relations
 * @property string $relation_endattribute
 * @property string $linkpath
 * @property integer $display_order
 * @property string $options_type
 * @property string $functions
 * @property string $_status
 *
 * The followings are the available model relations:
 * @property Views $view
 */
class ViewDetails extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer view_id
 * @soap
*/
public  $view_id;

/**
 * @var string fieldname
 * @soap
*/
public  $fieldname;

/**
 * @var string fieldtypes
 * @soap
*/
public  $fieldtypes;

/**
 * @var string label
 * @soap
*/
public  $label;

/**
 * @var string linkid
 * @soap
*/
public  $linkid;

/**
 * @var string relations
 * @soap
*/
public  $relations;

/**
 * @var string relation_endattribute
 * @soap
*/
public  $relation_endattribute;

/**
 * @var string linkpath
 * @soap
*/
public  $linkpath;

/**
 * @var integer display_order
 * @soap
*/
public  $display_order;

/**
 * @var integer _status
 * @soap
*/
public  $_status;

/**
 * @var integer functions
 * @soap
*/
public  $functions;


	/**
	 * Returns the static model of the specified AR class.
	 * @return ViewDetails the static model class
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
		return 'meta_view_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('view_id, display_order, _status', 'numerical', 'integerOnly'=>true),
			array('fieldname, fieldtypes, label, linkid, relation_endattribute, options_type, functions', 'length', 'max'=>100),
			array('relations, linkpath', 'length', 'max'=>500),
                        array('view_id, fieldname, fieldtypes', 'required'),
                        array('other_params','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, view_id, fieldname, fieldtypes, label, linkid, relations, relation_endattribute, linkpath, display_order, options_type, other_params, _status', 'safe', 'on'=>'search'),
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
			'view' => array(self::BELONGS_TO, 'Views', 'view_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'view_id' => 'View',
			'fieldname' => 'Fieldname',
			'fieldtypes' => 'Fieldtypes',
			'label' => 'Label',
			'linkid' => 'Linkid',
			'relations' => 'Relations',
			'relation_endattribute' => 'Relation Endattribute',
			'linkpath' => 'Linkpath',
			'display_order' => 'Display Order',
                        'options_type' => 'options_type',
                        '_status'=>'_status',
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
		$criteria->compare('view_id',$this->view_id);
		$criteria->compare('fieldname',$this->fieldname,true);
		$criteria->compare('fieldtypes',$this->fieldtypes,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('linkid',$this->linkid,true);
		$criteria->compare('relations',$this->relations,true);
		$criteria->compare('relation_endattribute',$this->relation_endattribute,true);
		$criteria->compare('linkpath',$this->linkpath,true);
		$criteria->compare('display_order',$this->display_order);
                $criteria->compare('options_type',$this->options_type);
                
                if($filter){
                    if(isset($filter['view_id'])){
                        $criteria->condition='view_id='.$filter['view_id'];
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
        
          
        public function beforeSave(){
            //find if there is any other viewdetail of this view
            if($this->isNewRecord){
                $criteria=new CDbCriteria();
                $criteria->condition='view_id=:view_id';
                $criteria->params=array('view_id'=>$this->view_id);
                $criteria->select='max(display_order) as  display_order';
                $vds=ViewDetails::model()->find($criteria);
                if($vds){
                    $this->display_order=$vds->display_order+1;
                }
                else {
                    $this->display_order=1;
                }
            }
            
            if($this->functions==""){
                $this->functions=null;
            }
           
            return true;
        }
        
           public function getAjaxButtons(){
            
           $model = "ViewDetails";
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

