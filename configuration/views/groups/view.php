<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Groups', 'url'=>array('index')),
	//array('label'=>'Add Groups', 'url'=>array("automated/create", 'view'=>'Groups_form')),
	array('label'=>'Update Groups', 'url'=>array('automated/update', 'view'=>'Groups_form', 'id'=>$model->id)),
	array('label'=>'Delete Groups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Groups', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Groups");
// details view
$this->service->showDetailView("Groups Details","Groups_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>