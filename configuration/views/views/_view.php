<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_name')); ?>:</b>
	<?php echo CHtml::encode($data->view_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_desc')); ?>:</b>
	<?php echo CHtml::encode($data->view_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('_status')); ?>:</b>
	<?php echo CHtml::encode($data->_status); ?>
	<br />


</div>