<?php
$this->breadcrumbs=array(
	'Model Searches'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelSearch', 'url'=>array('index')),
	//array('label'=>'Add ModelSearch', 'url'=>array("automated/create", 'view'=>'ModelSearch_form')),
	array('label'=>'Update ModelSearch', 'url'=>array('automated/update', 'view'=>'ModelSearch_form', 'id'=>$model->id)),
	array('label'=>'Delete ModelSearch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelSearch', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"ModelSearch");
// details view
$this->service->showDetailView("ModelSearch Details","ModelSearch_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>