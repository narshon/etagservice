<?php
$this->breadcrumbs=array(
	'View Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ViewDetails', 'url'=>array('index')),
	array('label'=>'Manage ViewDetails', 'url'=>array('admin')),
);
?>

<h1>Create ViewDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>