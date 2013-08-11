<?php
$this->breadcrumbs=array(
	'Services',
);

//show portlets for this service
/*
$this->portletRight[]=array(
	array('label'=>'Add Service', 'url'=>array("automated/create",'view'=>'Service_form')),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Service Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Service");
$this->service->showListView($criteria,"Service_list",$title);


?>
