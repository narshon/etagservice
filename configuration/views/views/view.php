<?php
$this->breadcrumbs=array(
	'Views'=>array('index'),
	$model->id,
);

//show portlets for this service

$this->portlet[]=array(
	//array('label'=>'List Views', 'url'=>array('index')),
	//array('label'=>'Add Views', 'url'=>array("automated/create", 'view'=>'Views_form')),
	array('label'=>'Update Views', 'url'=>array('automated/update', 'view'=>'Views_form', 'id'=>$model->id)),
	array('label'=>'Delete Views', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Views', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Actions");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"Views");
// details view
$this->service->showDetailView("View Details","Views_detail",$model->id);

?>


<?php   
       
        if($model->view_name=="automated"){
            
            print '<div id="draggableControls" style="float:left;width:100%;height:auto;background:#BCEBEB;margin:10px;">';
               $myservice=new ServiceComponent($this,$model->service->service_name);
               $myservice->showDraggableControls($model->name_alias);
            print '</div>';

           $myservice->showDroppableControls($model->name_alias);
        }
    
        
 ?>
<?php /* 
<div class="view" style="clear:both;">  <!-- view details -->
    
           <div class="row"> <h4> additional Details </h4> </div>
            <div class="row" id="addviewdiv" style='clear: left;'>
                    
                    <?php
                      //show  view details
                      //automated admin view 
                      // $this->service->showGridView("","view-details",$model->id);
                       $this->service=new ServiceComponent($this,"ViewDetails");
                      // $this->service->showGridView("","ViewDetails_grid",$model->id);
                    ?>
                <div id="addpres_details"></div>
                <div class="row">
                            <?php 
                                  $form=$this->beginWidget('CActiveForm', array(
                                   'id'=>'view-s-form',
                                   'enableAjaxValidation'=>false,
                            )); ?>
                    
                            <?php echo $form->labelEx($model,'addDetails',array('label'=>'Add View Details')); ?>
                            <?php echo $form->checkBox($model,'addDetails'); ?>
                            <?php //echo $form->error($model,'addDetails'); ?>
                  
                          <?php $this->endWidget(); ?>
                    
                    <div class="view" id="viewdetailsdiv">
                    <?php  $viewDetailsForm=new ViewDetails();
                          // echo $this->renderPartial('../viewDetails/_form', array('model'=>$viewDetailsForm,'view_id'=>$model->id));   ?> 
                    </div>
                    <div class="view" id="viewdetailsmessagediv">
                        
                    </div>
                  
               </div>
                
              </div>
        
</div> <!-- end view details -->

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>

*/?>
<script type="text/javascript">
    $(document).ready(function(){
        $("div#viewdetailsdiv").hide("slow");
        $("div#viewdetailsmessagediv").hide("slow");
       // msgfield=$("div#portletformdiv").html();
    });
$("#Views_addDetails").change(function (){
        $("div#viewdetailsmessagediv").html("");
        $("div#viewdetailsmessagediv").hide("");
     if ($("#Views_addDetails").is(':checked')){
         $("div#viewdetailsdiv").show("slow");
     }
     else {
         $("div#viewdetailsdiv").hide("slow");
     }
     
   /*  hs.htmlExpand(this, { 
			width: 400, creditsPosition: 'bottom left', 
			headingEval: 'this.a.title', wrapperClassName: 'titlebar', headingText: 'Service Views', maincontentText: msgfield, align: 'center' } );
    */
   
   //refresh portlet's grid view
   $(document).ready(function() {
     var refreshId = setInterval(function() {
     $.fn.yiiGridView.update('view-details-grid', {     
     data: $(this).serialize()
     });      
    },
    10000);
});
    
});
</script>
