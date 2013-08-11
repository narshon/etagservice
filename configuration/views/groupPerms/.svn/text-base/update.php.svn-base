<?php
$this->breadcrumbs=array(
	'Group Perms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List GroupPerms', 'url'=>array('index')),
	//array('label'=>'Add GroupPerms', 'url'=>array("automated/create",'view'=>'GroupPerms_form')),
	//array('label'=>'Update GroupPerms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GroupPerms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupPerms', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update GroupPerms <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>