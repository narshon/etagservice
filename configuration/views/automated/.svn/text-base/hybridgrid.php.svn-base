
<?php 
 $authorizer = new AuthorizationComponent;
 if($authorizer->authorize($viewID->id, "access")){
     
     $gridid = $this->service->gridview_params['gridid'];                
     $create_url = $this->createAbsoluteUrl("/configuration/automated/create");
     $hybridgridid = "hybridgrid-".$gridid; 
     $create_view = $this->service->gridview_params['form'];  

    if($authorizer->authorize($viewID->id, "insert")){
        $disable_create = $this->service->gridview_params['disable_create']; 
        if( (int)$disable_create !== 1 ){
        print "<div id='addnew' style='float:right; text-align: right; width: 40%'>";
        print CHtml::link("Add New","#hybrid", array('onClick'=>"$(\"#audit-id\").dialog(\"open\"); hyBridGrid('$create_url','$hybridgridid','$create_view', '$gridid');"));
        print "</div>";
        }
    }

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>$this->service->gridview_params['gridid'],
            'dataProvider'=>$model->search($filter),
            'filter'=>$model,
            'summaryText'=>'', 
            'cssFile' => Yii::app()->theme->baseUrl . '/css/widgets/gridview/styles.css',
            'columns'=>$this->service->gridData($viewID->id,$viewID->view_model),
    )); 
    
    
    ?>

<a name="hybrid">
    <div id="<?php echo $hybridgridid ?>" class="hybridgrid">
        
    </div>
</a>

<?php  }  ?>
 







