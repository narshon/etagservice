<?php

/**
 * This is the model class for table "tbl_user_groups".
 *
 * The followings are the available columns in table 'tbl_user_groups':
 * @property integer $id
 * @property string $username
 * @property integer $group_id
 *
 * The followings are the available model relations:
 * @property MetaGroups $group
 */
class UserGroups extends MetaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string username
 * @soap
*/
public  $username;

/**
 * @var integer group_id
 * @soap
*/
public  $group_id;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('UserGroups','tbl_user_groups');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserGroups the static model class
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
		return 'tbl_user_groups';
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
	public function search()
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
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "UserGroups_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "UserGroups_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "UserGroups";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function getUserGroups($username){
            $return = array();
            $groups= UserGroups::model()->findAllByAttributes(array('username'=>$username));
            if($groups){
                foreach($groups as $group){
                    $return[]=$group->group->group_name;
                }
            }
            
            return $return;
        }
        
        public function getGroupUsers($groupname){
            
            $return = array();
            //get group_id of this group
            $group = Groups::model()->findByAttributes(array('group_name'=>$groupname));
            if($group){
                $users= UserGroups::model()->findAllByAttributes(array('group_id'=>$group->id));
                if($users){
                    foreach($users as $user){
                        $return[]=$user->username;
                    }
                }
            }
            
            
            return $return;
        }
}

