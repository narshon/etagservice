<?php 
    $cs=Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/service-validate.js', CClientScript::POS_HEAD); ?>
    
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	'enableAjaxValidation'=>false,
)); ?>
        <?php
            $sess=Yii::app()->session->get('view_name');
               if(isset($sess)){
                        $model->destroyServiceSessions();
               }
        ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="view" id="view">
            <div class="row"> <h3> Service Information </h3> </div>
            <div class="row">
                    <?php echo $form->labelEx($model,'service_name'); ?>
                    <?php echo $form->textField($model,'service_name',array('size'=>60,'maxlength'=>100)); ?>
                    <?php echo $form->error($model,'service_name'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'service_desc'); ?>
                    <?php echo $form->textArea($model,'service_desc',array('rows'=>6, 'cols'=>50)); ?>
                    <?php echo $form->error($model,'service_desc'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'_status'); ?>
                    <?php echo $form->dropdownlist($model,'_status', array(''=>'','1'=>'On', '0'=>'Off')); ?>
                    <?php echo $form->error($model,'_status'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'model'); ?>
                    <?php echo $form->textArea($model,'model',array('rows'=>3,'cols'=>50)); ?>
                    <?php echo $form->error($model,'model'); ?>
            </div>

            <div class="row">
                    <?php // echo $form->labelEx($model,'model_id'); ?>
                    <?php //echo $form->textField($model,'model_id'); ?>
                    <?php // echo $form->error($model,'model_id'); ?>
            </div>
         </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->  

<?php if(!$model->isNewRecord)  {  ?>

<div class="view"> <!-- service views -->
           <div class="row"> <h3> Service Views </h3> </div>
            <div class="row" id="addviewdiv" style='clear: left;'>
                    <?php
                      //show service view
                      //automated admin view
                       $this->service=new ServiceComponent($this,"views");
                       $this->service->showGridView("","views_grid",$model->id);
                    ?>
                <div id="addpres_details"></div>
                <div class="row">
                            <?php echo $form->labelEx($model,'addview',array('label'=>'Add A New View')); ?>
                            <?php echo $form->checkBox($model,'addview'); ?>
                            <?php //echo $form->error($model,'prescriber'); ?>
               </div>
                
                </div>
            
</div>  <!-- end service views -->

<div class="view">  <!-- portlets -->
    
           <div class="row"> <h3> Service Portlets </h3> </div>
            <div class="row" id="addviewdiv" style='clear: left;'>
                    <?php
                      //show service view
                      //automated admin view
                       $this->service=new ServiceComponent($this,"portlets");
                       $this->service->showGridView("","portlets_grid",$model->id);
                    ?>
                <div id="addpres_details"></div>
                <div class="row">
                    
                            <?php echo $form->labelEx($model,'addportlet',array('label'=>'Add A New Portlet')); ?>
                            <?php echo $form->checkBox($model,'addportlet'); ?>
                            <?php //echo $form->error($model,'prescriber'); ?>
                    
                    <div class="view" id="portletformdiv">
                    <?php  $portletForm=new Portlets();
                           echo $this->renderPartial('../portlets/_form', array('model'=>$portletForm,'service_id'=>$model->id));   ?> 
                    </div>
                    <div class="view" id="portletmessagediv">
                        
                    </div>
                  
               </div>
                
              </div>
        
</div> <!-- end portlets -->

<?php }  ?>    

<script type="text/javascript">
$("#Service_addview").change(function (){
   
    bool=$("#Service_addview").val();
    
    
    // msgfield=document.getElementById("row-mess").innerHTML;
    messageTitle="Views";
    messageCateg="views";
    statusField="<br/> Select Status <br/> <select id='status_' name='status_'>";
    statusField+=" <option value='1'> On </option>"; 
    statusField+=" <option value='0'> Off </option>"; 
    statusField+="</select>";
      
    defaultField="<br/> Default? <br/> <select id='default_' name='default_'>";
    defaultField+=" <option value='0'> No </option>"; 
    defaultField+=" <option value='1'> Yes </option>"; 
    defaultField+="</select>";
    
    view_typeField="<br/> View Type <br/> <select id='view_type' name='view_type'>";
    view_typeField+=" <option value='list'> List </option>"; 
    view_typeField+=" <option value='grid'> Grid </option>"; 
    view_typeField+=" <option value='detail'> Detail </option>"; 
    view_typeField+=" <option value='_form'> Form </option>"; 
    view_typeField+="</select>";
     
     view_descField="Description <br/> <textarea name='view_desc' id='view_desc' cols='40' rows='3'></textarea>";
    
     view_nameField="<div id='wait'> </div><br/>View Name Key <br/><input type='text' name='view_name' id='view_name' size='50' />";
     name_aliasField="View Name Alias <br/><input type='text' name='name_alias' id='name_alias' size='50' />";
     grididField="View Name Key <br/><input type='text' name='gridid' id='gridid' size='50' />";
     view_modelField="Model Name <br/><input type='text' name='view_model' id='view_model' size='50' />";
     
     buttonField="<br/><input type='button' name='but_view' id='but_view' value='Add View' onClick='javascript:sendData(\"<?php  echo CController::createAbsoluteUrl('service/set') ?>\")' />";
     
     // <textarea name='msgbox' id='msgbox' onChange='ajaxPush(\"<?php // echo CController::createAbsoluteUrl('dispensing/set') ?>\",\"\",\"msgbox\",\"changeTitle\",messageCateg);' cols='20' rows='5'> </textarea>
    
     msgfield="<br/>"+view_nameField+" <br/>"+name_aliasField+"<br/> <br/>"+view_modelField+"<br/> <br/> "+view_descField+" <br/> <br/> "+view_typeField+" <br/> <br/>"+statusField+"<br/> <br/>"+defaultField+"<br/> <br/>"+buttonField+"<br/>";
    
    
   
    if(bool==true){ 

       hs.htmlExpand(this, { 
			width: 400, creditsPosition: 'bottom left', 
			headingEval: 'this.a.title', wrapperClassName: 'titlebar', headingText: 'Service Views', maincontentText: msgfield, align: 'center' } );
    }
     
   
});
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("div#portletformdiv").hide("slow");
        $("div#portletmessagediv").hide("slow");
       // msgfield=$("div#portletformdiv").html();
    });
$("#Service_addportlet").change(function (){
        $("div#portletmessagediv").html("");
        $("div#portletmessagediv").hide("");
     if ($("#Service_addportlet").is(':checked')){
         $("div#portletformdiv").show("slow");
     }
     else {
         $("div#portletformdiv").hide("slow");
     }
     
   /*  hs.htmlExpand(this, { 
			width: 400, creditsPosition: 'bottom left', 
			headingEval: 'this.a.title', wrapperClassName: 'titlebar', headingText: 'Service Views', maincontentText: msgfield, align: 'center' } );
    */
   
   //refresh portlet's grid view
   $(document).ready(function() {
     var refreshId = setInterval(function() {
     $.fn.yiiGridView.update('service-portlet-grid', {     
     data: $(this).serialize()
     });      
    },
    30000);
});
    
});
</script>




