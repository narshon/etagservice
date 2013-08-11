<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->id,
);

//show portlets for this service
/*
$this->portletRight[]=array(
	//array('label'=>'List Service', 'url'=>array('index')),
	//array('label'=>'Add Service', 'url'=>array("automated/create", 'view'=>'Service_form')),
	array('label'=>'Update Service', 'url'=>array('automated/update', 'view'=>'Service_form', 'id'=>$model->id)),
	array('label'=>'Delete Service', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */

$this->service=new ServiceComponent($this,"Service");
// details view
$this->service->showDetailView("Service Details","Service_detail",$model->id);

/*
$this->service=new ServiceComponent($this,"Portlets");
$this->service->showGridView("$model->service_name portlets","Portlets_grid", $model->id);

$this->service=new ServiceComponent($this,"Views");
$this->service->showGridView("$model->service_name views","Views_grid", $model->id);
 * 
 */


?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>