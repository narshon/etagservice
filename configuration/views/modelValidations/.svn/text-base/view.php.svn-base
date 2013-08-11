<?php
$this->breadcrumbs=array(
	'Model Validations'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelValidations', 'url'=>array('index')),
	//array('label'=>'Add ModelValidations', 'url'=>array("automated/create", 'view'=>'ModelValidations_form')),
	array('label'=>'Update ModelValidations', 'url'=>array('automated/update', 'view'=>'ModelValidations_form', 'id'=>$model->id)),
	array('label'=>'Delete ModelValidations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelValidations', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"ModelValidations");
// details view
$this->service->showDetailView("ModelValidations Details","ModelValidations_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>
