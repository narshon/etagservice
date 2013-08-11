<?php
$this->breadcrumbs=array(
	'Model Validations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelValidations', 'url'=>array('index')),
	//array('label'=>'Add ModelValidations', 'url'=>array("automated/create",'view'=>'ModelValidations_form')),
	//array('label'=>'Update ModelValidations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ModelValidations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelValidations', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ModelValidations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>