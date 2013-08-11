<?php
$this->breadcrumbs=array(
	'Skip Patterns'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List SkipPatterns', 'url'=>array('index')),
	//array('label'=>'Add SkipPatterns', 'url'=>array("automated/create", 'view'=>'SkipPatterns_form')),
	array('label'=>'Update SkipPatterns', 'url'=>array('automated/update', 'view'=>'SkipPatterns_form', 'id'=>$model->id)),
	array('label'=>'Delete SkipPatterns', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SkipPatterns', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"SkipPatterns");
// details view
$this->service->showDetailView("SkipPatterns Details","SkipPatterns_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>