<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portlet_name')); ?>:</b>
	<?php echo CHtml::encode($data->portlet_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_alias')); ?>:</b>
	<?php echo CHtml::encode($data->name_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portlet_desc')); ?>:</b>
	<?php echo CHtml::encode($data->portlet_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('_status')); ?>:</b>
	<?php echo CHtml::encode($data->_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sidebar')); ?>:</b>
	<?php echo CHtml::encode($data->sidebar); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('portlet_title')); ?>:</b>
	<?php echo CHtml::encode($data->portlet_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portlet_render')); ?>:</b>
	<?php echo CHtml::encode($data->portlet_render); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scope')); ?>:</b>
	<?php echo CHtml::encode($data->scope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::encode($data->label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relations')); ?>:</b>
	<?php echo CHtml::encode($data->relations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewpath')); ?>:</b>
	<?php echo CHtml::encode($data->viewpath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewid')); ?>:</b>
	<?php echo CHtml::encode($data->viewid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portlet_model')); ?>:</b>
	<?php echo CHtml::encode($data->portlet_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_model')); ?>:</b>
	<?php echo CHtml::encode($data->additional_model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relation_fk')); ?>:</b>
	<?php echo CHtml::encode($data->relation_fk); ?>
	<br />

	*/ ?>

</div>