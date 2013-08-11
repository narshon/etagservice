<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PortletGenerator
 *
 * @author nngao
 */
class PortletGenerator {
    //member variables
    private $dataArray;  
    
    public function generate($controller,$portlet,$methodparams=array()){  //var_dump($methodparams); exit;
     if($portlet->_status==1){  // check if portlet is enabled
        $portlet_method=$portlet->portlet_name;
        if(method_exists($portlet, $portlet_method)){
            if(!empty($methodparams)){
                $this->dataArray=$portlet->$portlet_method($methodparams);
            }
            else {
               $this->dataArray=$portlet->$portlet_method(); 
            }
            
            if($this->dataArray!=1){
              $this->portlet($controller,array_shift($this->dataArray),$this->dataArray, $portlet->sidebar,$portlet->portlet_render);
            }
        }
        else {
            throw new CHttpException(400,'Service Portlet implementation for '.$portlet_method.' doesn\'t exist' );
        }
        
     }
}
    
    public function portlet($controller,$title,$dataArray,$side='left',$render='portlet_partial'){
        $portletvar='';
        $portletvarTitle='';
        $portletRender='';    
        
        if($side=='right'){
            $count=1;
            $portletvar="portletRight";
            $portletvarTitle="portletRight_title";
            $portletRender="portletRight_render";
            $checksess=Yii::app()->session->get('portletCount_right');
            if(isset($checksess)){
               $count=Yii::app()->session->get('portletCount_right')+1; 
            }
            
            Yii::app()->session->add('portletCount_right', $count);
            
        }
        else if($side=='left'){
            $count=1;
            $portletvar="portlet";
            $portletvarTitle="portlet_title";
            $portletRender="portlet_render";
            
            $checksess=Yii::app()->session->get('portletCount_left');
            if(isset($checksess)){
               $count=Yii::app()->session->get('portletCount_left')+1; 
            }
            
            Yii::app()->session->add('portletCount_left', $count);
        }
        else {
            return false;
        }
        
        if(!$dataArray){
            return false;
        }
        else {
           $controller->$portletRender=$render;
           array_push($controller->$portletvar,$dataArray);
           array_push($controller->$portletvarTitle,$title);
        }
    }
    
}

?>
