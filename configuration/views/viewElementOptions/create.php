<?php
$this->breadcrumbs=array(
	'View Element Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ViewElementOptions', 'url'=>array('index')),
	array('label'=>'Manage ViewElementOptions', 'url'=>array('admin')),
);
?>

<h1>Create ViewElementOptions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>