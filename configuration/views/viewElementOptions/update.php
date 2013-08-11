<?php
$this->breadcrumbs=array(
	'View Element Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ViewElementOptions', 'url'=>array('index')),
	//array('label'=>'Add ViewElementOptions', 'url'=>array("automated/create",'view'=>'ViewElementOptions_form')),
	//array('label'=>'Update ViewElementOptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ViewElementOptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ViewElementOptions', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ViewElementOptions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>