<?php
$this->breadcrumbs=array(
	'Model Details'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ModelDetails', 'url'=>array('index')),
	//array('label'=>'Add ModelDetails', 'url'=>array("automated/create", 'view'=>'ModelDetails_form')),
	array('label'=>'Update ModelDetails', 'url'=>array('automated/update', 'view'=>'ModelDetails_form', 'id'=>$model->id)),
	array('label'=>'Delete ModelDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ModelDetails', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"ModelDetails");
// details view
$this->service->showDetailView("ModelDetails Details","ModelDetails_detail",$model->id);

?>

<br/> <br/>
<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>