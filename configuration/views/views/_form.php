<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'views-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->textField($model,'service_id'); ?>
		<?php echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_name'); ?>
		<?php echo $form->textField($model,'view_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'view_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_desc'); ?>
		<?php echo $form->textArea($model,'view_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'view_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_status'); ?>
		<?php echo $form->textField($model,'_status'); ?>
		<?php echo $form->error($model,'_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->