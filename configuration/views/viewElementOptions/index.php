<?php
$this->breadcrumbs=array(
	'View Element Options',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ViewElementOptions', 'url'=>array("automated/create",'view'=>'ViewElementOptions_form')),
	array('label'=>'Manage ViewElementOptions', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ViewElementOptions Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ViewElementOptions");
$this->service->showListView($criteria,"ViewElementOptions_list",$title);


?>
