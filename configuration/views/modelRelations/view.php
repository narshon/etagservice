<?php
$this->breadcrumbs=array(
	'Model Relations'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelRelations', 'url'=>array('index')),
	//array('label'=>'Add ModelRelations', 'url'=>array("automated/create", 'view'=>'ModelRelations_form')),
	array('label'=>'Update ModelRelations', 'url'=>array('automated/update', 'view'=>'ModelRelations_form', 'id'=>$model->id)),
	array('label'=>'Delete ModelRelations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelRelations', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"ModelRelations");
// details view
$this->service->showDetailView("ModelRelations Details","ModelRelations_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>