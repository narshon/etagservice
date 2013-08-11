<?php
$this->breadcrumbs=array(
	'Modules',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add Module', 'url'=>array("automated/create",'view'=>'Module_form')),
	array('label'=>'Manage Module', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Module Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Module");
$this->service->showListView($criteria,"Module_list",$title);


?>
