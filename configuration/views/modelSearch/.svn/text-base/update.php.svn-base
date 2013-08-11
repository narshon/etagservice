<?php
$this->breadcrumbs=array(
	'Model Searches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelSearch', 'url'=>array('index')),
	//array('label'=>'Add ModelSearch', 'url'=>array("automated/create",'view'=>'ModelSearch_form')),
	//array('label'=>'Update ModelSearch', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ModelSearch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelSearch', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ModelSearch <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>