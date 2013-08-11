<?php
$this->breadcrumbs=array(
	'Permissions',
);

//show portlets for this service
$this->portlet[]=array(
	array('label'=>'Add Permissions', 'url'=>array("automated/create",'view'=>'Permissions_form')),
	array('label'=>'Manage Permissions', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Permissions Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Permissions");
$this->service->showListView($criteria,"Permissions_list",$title);


?>
