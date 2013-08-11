<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-relations-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->textField($model,'model_id'); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_name'); ?>
		<?php echo $form->textField($model,'relation_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'relation_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation_type'); ?>
		<?php echo $form->textField($model,'relation_type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'relation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'related_model'); ?>
		<?php echo $form->textField($model,'related_model',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'related_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foreign_field'); ?>
		<?php echo $form->textField($model,'foreign_field',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'foreign_field'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->