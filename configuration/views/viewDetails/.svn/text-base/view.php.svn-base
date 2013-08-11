<?php
$this->breadcrumbs=array(
	'View Details'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ViewDetails', 'url'=>array('index')),
	//array('label'=>'Add ViewDetails', 'url'=>array("automated/create", 'view'=>'ViewDetails_form')),
	array('label'=>'Update ViewDetails', 'url'=>array('automated/update', 'view'=>'ViewDetails_form', 'id'=>$model->id)),
	array('label'=>'Delete ViewDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ViewDetails', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"ViewDetails");
// details view
$this->service->showDetailView("ViewDetails Details","ViewDetails_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>