<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-validations-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'validator_name'); ?>
		<?php echo $form->textField($model,'validator_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'validator_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'validation_fields'); ?>
		<?php echo $form->textArea($model,'validation_fields',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'validation_fields'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scenario'); ?>
		<?php echo $form->textField($model,'scenario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'scenario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'validation_type'); ?>
		<?php echo $form->textField($model,'validation_type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'validation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'optional_parameters'); ?>
		<?php echo $form->textArea($model,'optional_parameters',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'optional_parameters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_status'); ?>
		<?php echo $form->textField($model,'_status'); ?>
		<?php echo $form->error($model,'_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->textField($model,'model_id'); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->