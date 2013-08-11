<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Module', 'url'=>array('index')),
	//array('label'=>'Add Module', 'url'=>array("automated/create",'view'=>'Module_form')),
	//array('label'=>'Update Module', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Module', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Module', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Module <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>