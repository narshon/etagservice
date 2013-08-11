<?php
$this->breadcrumbs=array(
	'Group Perms'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List GroupPerms', 'url'=>array('index')),
	//array('label'=>'Add GroupPerms', 'url'=>array("automated/create", 'view'=>'GroupPerms_form')),
	array('label'=>'Update GroupPerms', 'url'=>array('automated/update', 'view'=>'GroupPerms_form', 'id'=>$model->id)),
	array('label'=>'Delete GroupPerms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupPerms', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"GroupPerms");
// details view
$this->service->showDetailView("GroupPerms Details","GroupPerms_detail",$model->id);

?>

<?php
$this->widget(
    'application.modules.auditTrail.widgets.portlets.ShowAuditTrail',
    array(
        'model' => $model,
    )
);
?>
