<?php

/**
 * This is the model class for table "meta_model_validations".
 *
 * The followings are the available columns in table 'meta_model_validations':
 * @property integer $id
 * @property string $validator_name
 * @property string $validation_fields
 * @property string $scenario
 * @property string $validation_type
 * @property string $message
 * @property string $optional_parameters
 * @property integer $_status
 * @property integer $model_id
 *
 * The followings are the available model relations:
 * @property Model $model
 */
class ModelValidations extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string validator_name
 * @soap
*/
public  $validator_name;

/**
 * @var string validation_fields
 * @soap
*/
public  $validation_fields;

/**
 * @var string scenario
 * @soap
*/
public  $scenario;

/**
 * @var string validation_type
 * @soap
*/
public  $validation_type;

/**
 * @var string message
 * @soap
*/
public  $message;

/**
 * @var string optional_parameters
 * @soap
*/
public  $optional_parameters;

/**
 * @var integer _status
 * @soap
*/
public  $_status;

/**
 * @var integer model_id
 * @soap
*/
public  $model_id;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         
         public function __construct($scenario = 'insert',$dh=false){
                if(CONFIG_MODE == 1)
                  $this->datahelper = new DataHelper('ModelValidations','meta_model_validations');
                
              parent::__construct($scenario);
         }
         
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return ModelValidations the static model class
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
		return 'meta_model_validations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(           array('validator_name, validation_type, validation_fields, _status, model_id', 'required'),
                  			array('_status, model_id', 'numerical', 'integerOnly'=>true),
                  			array('validator_name', 'length', 'max'=>250),
                  			array('scenario, validation_type', 'length', 'max'=>100),
                  			array('validation_fields, message, optional_parameters', 'safe'),
                  			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, validator_name, validation_fields, scenario, validation_type, message, optional_parameters, _status, model_id', 'safe', 'on'=>'search'),
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
			'model' => array(self::BELONGS_TO, 'Model', 'model_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{		         			         			         			         			         			         			         			         			                  
         return $this->datahelper->getModelAttributes();
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
		$criteria->compare('validator_name',$this->validator_name,true);
		$criteria->compare('validation_fields',$this->validation_fields,true);
		$criteria->compare('scenario',$this->scenario,true);
		$criteria->compare('validation_type',$this->validation_type,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('optional_parameters',$this->optional_parameters,true);
		$criteria->compare('_status',$this->_status);
		$criteria->compare('model_id',$this->model_id);
                
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
        
        function beforeSave(){
            
            return true;
        }
        
       public function getAjaxButtons(){
            
           $model = "ModelValidations";
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

