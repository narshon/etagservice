<?php
$this->breadcrumbs=array(
	'Portlets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Portlets', 'url'=>array('index')),
	array('label'=>'Create Portlets', 'url'=>array('create')),
	array('label'=>'View Portlets', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Portlets', 'url'=>array('admin')),
);
?>

<h1>Update Portlets <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>