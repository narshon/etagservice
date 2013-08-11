<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_details_id')); ?>:</b>
	<?php echo CHtml::encode($data->view_details_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_key')); ?>:</b>
	<?php echo CHtml::encode($data->option_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_value')); ?>:</b>
	<?php echo CHtml::encode($data->option_value); ?>
	<br />


</div>