<?php

/**
 * This is the model class for table "meta_group_perms".
 *
 * The followings are the available columns in table 'meta_group_perms':
 * @property integer $id
 * @property integer $perm_id
 * @property integer $group_id
 * @property integer $view_id
 * @property integer $portlet_id
 *
 * The followings are the available model relations:
 * @property Views $view
 * @property Groups $group
 * @property Permissions $perm
 * @property Portlets $portlet
 */
class GroupPerms extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer perm_id
 * @soap
*/
public  $perm_id;

/**
 * @var integer group_id
 * @soap
*/
public  $group_id;

/**
 * @var integer view_id
 * @soap
*/
public  $view_id;

/**
 * @var integer portlet_id
 * @soap
*/
public  $portlet_id;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('GroupPerms','meta_group_perms');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return GroupPerms the static model class
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
		return 'meta_group_perms';
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
		
		 return $this->datahelper->getModelRelations();
														
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
	public function search($filter=array())
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
                      if(isset($params[1]))
                      $criteria->compare($name,$this->$name,trim($params[1]));
                      else
                        $criteria->compare($name,$this->$name); 
                   }
                }
                
                if($filter){
                    if(isset($filter['portlet_id'])){
                        $criteria->condition='portlet_id='.$filter['portlet_id'];
                    }
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
        
       public function getAjaxButtons(){
            
           $model = "GroupPerms";
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

