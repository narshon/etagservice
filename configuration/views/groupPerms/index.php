<?php
$this->breadcrumbs=array(
	'Group Perms',
);

//show portlets for this service
$this->portlet[]=array(
	array('label'=>'Add GroupPerms', 'url'=>array("automated/create",'view'=>'GroupPerms_form')),
	array('label'=>'Manage GroupPerms', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> GroupPerms Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"GroupPerms");
$this->service->showListView($criteria,"GroupPerms_list",$title);


?>
