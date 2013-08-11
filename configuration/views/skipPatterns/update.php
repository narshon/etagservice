<?php
$this->breadcrumbs=array(
	'Skip Patterns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List SkipPatterns', 'url'=>array('index')),
	//array('label'=>'Add SkipPatterns', 'url'=>array("automated/create",'view'=>'SkipPatterns_form')),
	//array('label'=>'Update SkipPatterns', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SkipPatterns', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SkipPatterns', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update SkipPatterns <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>