<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Groups', 'url'=>array('index')),
	//array('label'=>'Add Groups', 'url'=>array("automated/create",'view'=>'Groups_form')),
	//array('label'=>'Update Groups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Groups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Groups', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Groups <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>