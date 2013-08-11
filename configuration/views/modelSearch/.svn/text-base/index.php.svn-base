<?php
$this->breadcrumbs=array(
	'Model Searches',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ModelSearch', 'url'=>array("automated/create",'view'=>'ModelSearch_form')),
	array('label'=>'Manage ModelSearch', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ModelSearch Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ModelSearch");
$this->service->showListView($criteria,"ModelSearch_list",$title);


?>
