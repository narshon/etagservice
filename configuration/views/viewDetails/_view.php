

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('view_id')); ?>:</b>
	<?php echo CHtml::encode($data->view_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fieldname')); ?>:</b>
	<?php echo CHtml::encode($data->fieldname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fieldtypes')); ?>:</b>
	<?php echo CHtml::encode($data->fieldtypes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::encode($data->label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkid')); ?>:</b>
	<?php echo CHtml::encode($data->linkid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relations')); ?>:</b>
	<?php echo CHtml::encode($data->relations); ?>
	<br />


</div>