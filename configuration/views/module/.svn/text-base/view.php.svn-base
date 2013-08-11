<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Module', 'url'=>array('index')),
	//array('label'=>'Add Module', 'url'=>array("automated/create", 'view'=>'Module_form')),
	array('label'=>'Update Module', 'url'=>array('automated/update', 'view'=>'Module_form', 'id'=>$model->id)),
	array('label'=>'Delete Module', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Module', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"Module");
// details view
$this->service->showDetailView("Module Details","Module_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>
