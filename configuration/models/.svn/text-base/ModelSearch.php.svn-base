<?php

/**
 * This is the model class for table "meta_model_search".
 *
 * The followings are the available columns in table 'meta_model_search':
 * @property integer $id
 * @property integer $model_id
 * @property string $method
 * @property string $params
 *
 * The followings are the available model relations:
 * @property Model $model
 */
class ModelSearch extends MetaActiveRecord
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
 * @var string method
 * @soap
*/
public  $method;

/**
 * @var string params
 * @soap
*/
public  $params;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=false){
               if(CONFIG_MODE == 1)
                $this->datahelper = new DataHelper('ModelSearch','meta_model_search');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return ModelSearch the static model class
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
		return 'meta_model_search';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
                return array_merge($this->datahelper->getModelRules(),$this->datahelper->getModelSkipPatterns()); 
		
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

                $strings=$this->datahelper->getModelSearch();
                foreach($strings as $str){
                   //explode params
                   $params=explode(",",$str->params);
                   if($str->method=="compare"){
                     $name=trim($params[0]);
                      if(isset($params[1])){
                          $criteria->compare($name,$this->$name,trim($params[1]));
                      }
                      else{
                          $criteria->compare($name,$this->$name);
                      }
                          
                   }
                }
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
            
           $model = "ModelSearch";
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

