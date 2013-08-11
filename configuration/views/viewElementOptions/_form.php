<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'view-element-options-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'view_details_id'); ?>
		<?php echo $form->textField($model,'view_details_id'); ?>
		<?php echo $form->error($model,'view_details_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'option_key'); ?>
		<?php echo $form->textField($model,'option_key',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'option_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'option_value'); ?>
		<?php echo $form->textField($model,'option_value',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'option_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->