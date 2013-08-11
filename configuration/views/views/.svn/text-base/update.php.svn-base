<?php
$this->breadcrumbs=array(
	'Views'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Views', 'url'=>array('index')),
	//array('label'=>'Add Views', 'url'=>array("automated/create",'view'=>'Views_form')),
	//array('label'=>'Update Views', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Views', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Views', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Views <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>