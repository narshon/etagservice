<?php
$this->breadcrumbs=array(
	'Permissions'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Permissions', 'url'=>array('index')),
	//array('label'=>'Add Permissions', 'url'=>array("automated/create", 'view'=>'Permissions_form')),
	array('label'=>'Update Permissions', 'url'=>array('automated/update', 'view'=>'Permissions_form', 'id'=>$model->id)),
	array('label'=>'Delete Permissions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Permissions', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Permissions");
// details view
$this->service->showDetailView("Permissions Details","Permissions_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>