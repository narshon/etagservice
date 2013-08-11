<?php
$this->breadcrumbs=array(
	'View Details',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ViewDetails', 'url'=>array("automated/create",'view'=>'ViewDetails_form')),
	array('label'=>'Manage ViewDetails', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ViewDetails Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ViewDetails");
$this->service->showListView($criteria,"ViewDetails_list",$title);


?>
