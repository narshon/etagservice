
<?php 
    
  $attribs=array();

  foreach($this->service->listview_params['fieldnames'] as $key=>$value){
      
      if($this->service->listview_params['linkids'][$key]!=''){
          
            $value=$this->service->relationalMapping($model, $this->service->listview_params['relations'][$key], $value);
            $linkid=$this->service->relationalMapping($model, $this->service->listview_params['relations'][$key], $this->service->listview_params['linkids'][$key]);
            
            $attribs[]=array(
                            'label'=>$this->service->listview_params['labels'][$key],
                            'type'=>'raw',
                            'value'=>CHtml::link(CHtml::encode($value), array($this->service->listview_params['linkpath'][$key], 'id'=>$linkid)),
                        );   
      }
      
      else{
          $value=$this->service->relationalMapping($model, $this->service->listview_params['relations'][$key], $value);
          
           $attribs[]=array(
                            'label'=>$this->service->listview_params['labels'][$key],
                            //'type'=>'raw',
                            'value'=>CHtml::encode($value)
           );   
         
      } 
          
      
      
  }
   // print_r($attribs); exit;
    
   $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>$attribs,
    )); 
   
   
   
?>
