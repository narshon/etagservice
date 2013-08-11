<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-perms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'perm_id'); ?>
		<?php echo $form->textField($model,'perm_id'); ?>
		<?php echo $form->error($model,'perm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_id'); ?>
		<?php echo $form->textField($model,'view_id'); ?>
		<?php echo $form->error($model,'view_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portlet_id'); ?>
		<?php echo $form->textField($model,'portlet_id'); ?>
		<?php echo $form->error($model,'portlet_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->