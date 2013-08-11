<?php
$this->breadcrumbs=array(
	'Groups',
);

//show portlets for this service
$this->portlet[]=array(
	array('label'=>'Add Groups', 'url'=>array("automated/create",'view'=>'Groups_form')),
	array('label'=>'Manage Groups', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Groups Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Groups");
$this->service->showListView($criteria,"Groups_list",$title);


?>
