<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'view-details-form',
	'enableAjaxValidation'=>false,
       // 'action'=>CHtml::normalizeUrl('sus/index.php?r=viewDetails/create'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php if(isset($view_id)) { ?>
	<div class="row">  <?php $model->view_id=$view_id; ?>
		<?php //echo $form->labelEx($model,'view_id'); ?>
		<?php echo $form->hiddenField($model,'view_id'); ?>
		<?php //echo $form->error($model,'view_id'); ?>
	</div>
        <?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fieldname'); ?>
		<?php echo $form->textField($model,'fieldname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fieldname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fieldtypes'); ?>
                <?php
                   $fieldoptions=array(
                              'value'=>'value',
                              'textfield'=>'textfield',
                              'textarea'=>'textarea',
                              'dropdownlist'=>'dropdownlist',
                              'datepicker'=>'datepicker',
                              'hiddenfield'=>'hiddenfield',
                              'filefield'=>'filefield',
                              'submitbutton'=>'submitbutton',
                              'controls-full'=>'Full Controls',
                              'controls-update'=>'Update-view Controls',
                              'controls-delete'=>'Delete-view Controls'
                              
                   );
                ?>
		<?php echo $form->dropDownList($model,'fieldtypes',$fieldoptions,array('prompt'=>'')); ?>
		<?php echo $form->error($model,'fieldtypes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkid'); ?>
		<?php echo $form->textField($model,'linkid',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'linkid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relations'); ?>
		<?php echo $form->textField($model,'relations',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'relations'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'relation_endattribute'); ?>
		<?php echo $form->textField($model,'relation_endattribute',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'relation_endattribute'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'linkpath'); ?>
		<?php echo $form->textField($model,'linkpath',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'linkpath'); ?>
	</div>

	<div class="row buttons">
		<?php  
                 if(!$model->isNewRecord){
                    echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                 }
                 else {
                    echo CHtml::button('Add',array('id'=>'add')); 
                 }
              ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$("#add").click(function() {  
		
		$.ajax({
			type: "post",
			url: "<?php echo CController::createAbsoluteUrl('viewDetails/create') ?>",
			data:$("#view-details-form").serialize(),
			beforeSend: function(x) {  
			  if(x && x.overrideMimeType) {
				x.overrideMimeType("application/j-son;charset=UTF-8");
			  }
			 },
			dataType: "json",
			success: function(data){  
			      $("div#viewdetailsdiv").hide("slow");
                              $("div#viewdetailsmessagediv").text("Successfully Added");
                              $("div#viewdetailsmessagediv").show("slow");
		          },
                        error: function (response, status) {
                            alert("Error! "+response+" "+status);
                        }
			})	
		
});
</script>