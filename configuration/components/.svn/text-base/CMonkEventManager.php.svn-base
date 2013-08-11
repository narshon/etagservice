<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CMonkEventManager
 *
 * @author nngao
 */
class CMonkEventManager extends CComponent{
    
    
    public function init(array $eventNames=array()){
        //register handlers from around the world
        foreach($eventNames as $event_name){
            $handlers=ProcessHandler::model()->findAllByAttributes(array('event_name'=>$event_name));
            if($handlers){
                foreach($handlers as $handler){
                    if($handler->_status==1){
                        $eventName=$handler->event_name;
                        $model=$handler->model;
                        $method=$handler->method;
                        $this->registerEventHandlers($eventName, new $model, $method);
                    }
                    
                }
                    
            }
        }
        
    }
    
    public function registerEventHandlers($eventName, $model, $handler){
           
            $this->$eventName = array($model, $handler);
        
    }
    
    public function onDataPortlet($event){
            $this->raiseEvent('onDataPortlet', $event);
    }
    public function onSMSReceived($event){
            $this->raiseEvent('onSMSReceived', $event);
    }
   
    public function onEmailReceiving($event){
            $this->raiseEvent('onEmailReceiving', $event);
    }
    public function onEmailSending($event){
            $this->raiseEvent('onEmailSending', $event);
    }
    public function onBibleQuote($event){
            $this->raiseEvent('onBibleQuote', $event);
    }
    public function onEmailBibleQuote($event){
            $this->raiseEvent('onEmailBibleQuote', $event);
    }
    
    public function OnSportsUpdate($event){
            $this->raiseEvent('OnSportsUpdate', $event);
    }
    public function onMMFNews($event){
            $this->raiseEvent('onMMFNews', $event);
    }
    //
    public function onQouteSubs($event){
            $this->raiseEvent('onQouteSubs', $event);
    }
    public function onAmaniElections($event){
            $this->raiseEvent('onAmaniElections', $event);
    }
    public function onArsenalNews($event){
            $this->raiseEvent('onArsenalNews', $event);
    }
    
    public function onJJDMachakos($event){
            $this->raiseEvent('onJJDMachakos', $event);
    }
    
 
 public function onSMSSending($event){$this->raiseEvent('onSMSSending', $event);}
 public function onssssd51($event){$this->raiseEvent('onssssd51', $event);}
                               
 
//onssssd52 event definition.
public function onssssd52($event){$this->raiseEvent('onssssd52', $event);}
                               
 
//onssssd53 event definition.
public function onssssd53($event){$this->raiseEvent('onssssd53', $event);}
                               
 
//onuyu54 event definition.
public function onuyu54($event){$this->raiseEvent('onuyu54', $event);}
                               
 
//onJJE55 event definition.
public function onJJE55($event){$this->raiseEvent('onJJE55', $event);}
                               
 
//onJJE56 event definition.
public function onJJE56($event){$this->raiseEvent('onJJE56', $event);}
                               
 
//onJJD57 event definition.
public function onJJD57($event){$this->raiseEvent('onJJD57', $event);}

//onJJD57 event definition.
public function onMaureen58($event){$this->raiseEvent('onMaureen58', $event);}
                               
 
//onmaureen59 event definition.
public function onmaureen59($event){$this->raiseEvent('onmaureen59', $event);}
                               
 
//onmaureen60 event definition.
public function onmaureen60($event){$this->raiseEvent('onmaureen60', $event);}
                               
} ?>