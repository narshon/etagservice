<?php
$this->breadcrumbs=array(
	'Model Searches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ModelSearch', 'url'=>array('index')),
	array('label'=>'Manage ModelSearch', 'url'=>array('admin')),
);
?>

<h1>Create ModelSearch</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>