<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permissions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'perm_name'); ?>
		<?php echo $form->textField($model,'perm_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'perm_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
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