<?php
$this->breadcrumbs=array(
	'Model Details',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ModelDetails', 'url'=>array("automated/create",'view'=>'ModelDetails_form')),
	array('label'=>'Manage ModelDetails', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ModelDetails Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ModelDetails");
$this->service->showListView($criteria,"ModelDetails_list",$title);


?>
