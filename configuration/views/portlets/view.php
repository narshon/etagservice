<?php
$this->breadcrumbs=array(
	'Portlets'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Portlets', 'url'=>array('index')),
	//array('label'=>'Add Portlets', 'url'=>array("automated/create", 'view'=>'Portlets_form')),
	array('label'=>'Update Portlets', 'url'=>array('automated/update', 'view'=>'Portlets_form', 'id'=>$model->id)),
	array('label'=>'Delete Portlets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Portlets', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"Portlets");
// details view
$this->service->showDetailView("Portlets Details","Portlets_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>