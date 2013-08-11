<?php

/**
 * Description of AuthorizationComponent
 *
 * @author nngao
 */
class AuthorizationComponent {
    
       public function authorize($widget_id, $perm_type, $widget_column="view_id"){
            
           
            $widgetPerms=$this->widgetPerms($widget_id, $widget_column);
            
            $userPerms=Yii::app()->user->signature;
            
            
            $authperm=array_search($perm_type, $widgetPerms);
            
            if($authperm){
                if(array_key_exists($authperm, $userPerms)){
                     
                   return true;
                }
            }
         
            return false;
         
            
        }
        
        public function widgetPerms($widget_id, $widget_column="view_id"){
            $permsArray=array();
            
                $perms=GroupPerms::model()->findAllByAttributes(array("$widget_column"=>$widget_id));
                if($perms){
                    foreach($perms as $perm){
                        $permObject=Permissions::model()->findByPk($perm->perm_id);
                        if($permObject){
                            $permsArray[$permObject->id]=$permObject->type;
                        }
                    }
                }
            
            
            return $permsArray;
        }
        
        
        public function getUserGroups($username){
            
            $user_groups = array('grp-u-admins', 'grp-u-kidms_admins','grp-u-kidms_data_entry');   
            if(AUTH_TYPE==1){ 
                $groups=new LdapUserGroups;
                $user_groups=$groups->getUserGroups($username);
                
            }
            if(AUTH_TYPE==2){ 
                $groups=new UserGroups;
                $user_groups = array_merge( $user_groups, $groups->getUserGroups($username));
                
            }
            return $user_groups;
        }
        
        public function getGroupPerms($group){
            
            $permsArray=array();
            
            //get group ID
            $groupObject=  Groups::model()->findByAttributes(array('group_name'=>$group));
            if($groupObject){   
                 //get groupperms
                    $perms=GroupPerms::model()->findAllByAttributes(array("group_id"=>$groupObject->id));
                    if($perms){
                        foreach($perms as $perm){
                            $permObject=Permissions::model()->findByPk($perm->perm_id);
                            if($permObject){
                                $permsArray[$permObject->id]=$permObject->type;
                            }
                            
                        }
                        
                        return $permsArray;
                    }
            }
           
            return $permsArray;
      }
}

?>
