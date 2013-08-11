<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SkipPatternizer
 *
 * @author nngao
 */
class SkipPatternizer extends CComponent{
    
    public function onSkipPatterns($event){
            $this->raiseEvent('onSkipPatterns', $event);
    }
    public function onFieldLoad($event, $model){
        
         $this->raiseEvent('onFieldLoad', $event);
         $fieldName=$event->params['field'];
         
         if ( method_exists ($model ,  "getFieldAttributes") ){
             return $model->getFieldAttributes($fieldName);
         }
         else{
             return '';
         }
         
    }
    public function registerFieldLoadEventHandlers($model, array $handlers){
        
        foreach($handlers as $handler){
            $this->onFieldLoad = array($model, $handler);
        }
        
    }
    public function registerEventHandlers($model, array $handlers){
        
        foreach($handlers as $handler){
            $this->onSkipPatterns = array($model, $handler);
        }
        
    }
}

?>
