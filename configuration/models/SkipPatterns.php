<?php

/**
 * This is the model class for table "meta_skip_patterns".
 *
 * The followings are the available columns in table 'meta_skip_patterns':
 * @property integer $id
 * @property integer $model_id
 * @property string $pattern_fields
 * @property string $pattern_name
 * @property string $optional_params
 * @property string $scenario
 * @property string $message
 * @property integer $_status
 *
 * The followings are the available model relations:
 * @property Model $model
 */
class SkipPatterns extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer model_id
 * @soap
*/
public  $model_id;

/**
 * @var string pattern_fields
 * @soap
*/
public  $pattern_fields;

/**
 * @var string pattern_name
 * @soap
*/
public  $pattern_name;

/**
 * @var string optional_params
 * @soap
*/
public  $optional_params;

/**
 * @var string scenario
 * @soap
*/
public  $scenario;

/**
 * @var string message
 * @soap
*/
public  $message;

/**
 * @var integer _status
 * @soap
*/
public  $_status;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=false){
               if(CONFIG_MODE == 1)
                $this->datahelper = new DataHelper('SkipPatterns','meta_skip_patterns');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return SkipPatterns the static model class
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
		return 'meta_skip_patterns';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
                return $this->datahelper->getModelRules(); 
		
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
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('pattern_fields',$this->pattern_fields,true);
		$criteria->compare('pattern_name',$this->pattern_name,true);
		$criteria->compare('optional_params',$this->optional_params,true);
		$criteria->compare('scenario',$this->scenario,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('_status',$this->_status);
                
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
        
        public function getAjaxButtons(){
            
           $model = "SkipPatterns";
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

