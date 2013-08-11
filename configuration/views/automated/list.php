<?php

/* @author nngao
 * 
 * Automates the generation of a standard zii list view widget.
 * 
 */

print '<div class="view">';
        
        $i=0;
        foreach($this->service->listview_params['fieldnames'] as $key=>$fieldnames){
            //labels
            if($this->service->listview_params['labels'][$key]!=''){
                echo "<b>".$this->service->listview_params['labels'][$key].":</b>"; 
            }
            else {
              echo "<b>".CHtml::encode($data->getAttributeLabel($fieldnames)). ":</b>";   
            }
       
            if($this->service->listview_params['linkids'][$key]!=''){
               //put a link value line
                $value=$this->service->relationalMapping($data, $this->service->listview_params['relations'][$key], $fieldnames);
                $linkid=$this->service->relationalMapping($data, $this->service->listview_params['relations'][$key], $this->service->listview_params['linkids'][$key]);
               echo CHtml::link(CHtml::encode($value), array($this->service->listview_params['linkpath'][$key], 'id'=>$linkid))."<br />"; 
            }
            else {
                $value=$this->service->relationalMapping($data, $this->service->listview_params['relations'][$key], $fieldnames);
                echo CHtml::encode($value)."<br />";
            }
            $i++;
        }
        
print  "</div>";
?>
