<?php
$this->breadcrumbs=array(
	'Model Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelDetails', 'url'=>array('index')),
	//array('label'=>'Add ModelDetails', 'url'=>array("automated/create",'view'=>'ModelDetails_form')),
	//array('label'=>'Update ModelDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ModelDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelDetails', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ModelDetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>