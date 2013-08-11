<div class='form'>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'portlets-form',
	'enableAjaxValidation'=>false,
       // 'action'=>CHtml::normalizeUrl('/index.php?r=portlets/create'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">   <?php if(isset($service_id))
                                    $model->service_id=$service_id;
                             ?>
		<?php // echo $form->labelEx($model,'service_id', array('label'=>'Service Name')); ?>
		<?php  echo $form->hiddenField($model,'service_id'); ?>
		<?php // echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portlet_name'); ?>
		<?php echo $form->textField($model,'portlet_name',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_alias'); ?>
		<?php echo $form->textField($model,'name_alias',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portlet_desc'); ?>
		<?php echo $form->textArea($model,'portlet_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'portlet_desc'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'_status'); ?>
		<?php echo $form->dropDownList($model,'_status',array('0'=>'Off','1'=>'On'),array('prompt'=>'')); ?>
		<?php echo $form->error($model,'_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sidebar'); ?>
		<?php echo $form->dropDownList($model,'sidebar',array('left'=>'Left','right'=>'Right'),array('prompt'=>'')); ?>
		<?php echo $form->error($model,'sidebar'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'portlet_title'); ?>
		<?php echo $form->textField($model,'portlet_title',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portlet_render'); ?>
		<?php echo $form->dropDownList($model,'portlet_render',array('portlet_full'=>'Full','portlet_partial'=>'Partial'),array('prompt'=>'')); ?>
		<?php echo $form->error($model,'portlet_render'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scope'); ?>
		<?php echo $form->dropDownList($model,'scope',array('generic'=>'General','specific'=>'Special'),array('prompt'=>'')); ?>
		<?php echo $form->error($model,'scope'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relations'); ?>
		<?php echo $form->textField($model,'relations',array('size'=>30,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'relations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viewpath'); ?>
		<?php echo $form->textField($model,'viewpath',array('size'=>30,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'viewpath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viewid'); ?>
		<?php echo $form->textField($model,'viewid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'viewid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portlet_model'); ?>
		<?php echo $form->textField($model,'portlet_model',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_model'); ?>
		<?php echo $form->textField($model,'additional_model',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'additional_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_fk'); ?>
		<?php echo $form->textField($model,'relation_fk',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'relation_fk'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'portlet_title_suffix'); ?>
		<?php echo $form->textField($model,'portlet_title_suffix',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_title_suffix'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'portlet_head_model'); ?>
		<?php echo $form->textField($model,'portlet_head_model',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_head_model'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'portlet_data_filter'); ?>
		<?php echo $form->textField($model,'portlet_data_filter',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'portlet_data_filter'); ?>
	</div>

	<div class="row buttons">
		                       <?php //  echo CHtml::submitButton($model->isNewRecord ? 'Add Portlet' : 'Save Portlet Details'); ?>
            <?php echo CHtml::button('Add',array('id'=>'add')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$("#add").click(function() {  
		
		$.ajax({
			type: "POST",
			url: "<?php echo CController::createAbsoluteUrl('portlets/create') ?>",
			data:$("#portlets-form").serialize(),
			beforeSend: function(x) {  
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
			 },
			dataType: "json",
			success: function(data){ 
			      $("div#portletformdiv").hide("slow");
                              $("div#portletmessagediv").text("Successfully Added");
                              $("div#portletmessagediv").show("slow");
		          },
                        error: function (response, status) {
                            alert("Error! "+response+" "+status);
                        }
			})	
		
});
</script>