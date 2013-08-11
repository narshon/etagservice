<?php

/**
 * This is the model class for table "sus_view_element_options".
 *
 * The followings are the available columns in table 'sus_view_element_options':
 * @property integer $id
 * @property integer $view_details_id
 * @property string $option_key
 * @property string $option_value
 * @property string $condition
 * @property string $model
 */
class ViewElementOptions extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer view_details_id
 * @soap
*/
public  $view_details_id;

/**
 * @var string option_key
 * @soap
*/
public  $option_key;

/**
 * @var string option_value
 * @soap
*/
public  $option_value;


	/**
	 * Returns the static model of the specified AR class.
	 * @return ViewElementOptions the static model class
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
		return 'meta_view_element_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('view_details_id', 'numerical', 'integerOnly'=>true),
			array('option_key, option_value', 'length', 'max'=>100),
                        array('condition,model','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, view_details_id, option_key, option_value', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'view_details_id' => 'View Details',
			'option_key' => 'Option Key',
			'option_value' => 'Option Value',
                        'condition' => 'condition',
                        'model' => 'model'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('view_details_id',$this->view_details_id);
		$criteria->compare('option_key',$this->option_key,true);
		$criteria->compare('option_value',$this->option_value,true);

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
        
        public function getOptions($vd, $model){
            
            $returnArray=array();     
            if($vd->options_type=="static"){  
                    $options=ViewElementOptions::model()->findAllByAttributes(array('view_details_id'=>$vd->id));

                    if($options){
                        foreach($options as $opt){   
                            $returnArray[$opt->option_key]=$opt->option_value;
                        }
                    }
            }
            else if($vd->options_type=="dynamic"){
                
                $optionparams=ViewElementOptions::model()->findByAttributes(array('view_details_id'=>$vd->id));
                if($optionparams){
                        $modelName=$optionparams->model;
                        $model =new $modelName();
                        $criteria = new CDbCriteria();
                        $criteria->condition = $optionparams->condition;

                        $options=$model->findAll($criteria);
                        if($options){
                                $key=$optionparams->option_key;
                                $value=$optionparams->option_value;
                                foreach($options as $opt){
                                    $returnArray[$opt->$key]=$opt->$value;
                                }
                        }
                }
               
                
            }
            else if ($vd->options_type=="function"){    
                //get function
                $optionparams=ViewElementOptions::model()->findByAttributes(array('view_details_id'=>$vd->id));
                if($optionparams){   
                        $modelName=$optionparams->model;
                        $modelx =new $modelName();
                        $function = trim($optionparams->option_key);
                        
                        $returnArray = $modelx->{$function}();
                        
                }
            }
            else if($vd->options_type=="method"){
                $optionparams=ViewElementOptions::model()->findByAttributes(array('view_details_id'=>$vd->id));
                if($optionparams){   
                    $returnArray=$model->{$optionparams->option_key}();
                }
            }
            
            
            return $returnArray;
            
        }
        
      public function getAjaxButtons(){
            
           $model = "ViewElementOptions";
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
        
        public function yesNoOptions(){
            return array(
                0=>'No',
                1=>'Yes'
            );
        }
          
}

