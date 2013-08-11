<?php
$this->breadcrumbs=array(
	'Model Relations',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ModelRelations', 'url'=>array("automated/create",'view'=>'ModelRelations_form')),
	array('label'=>'Manage ModelRelations', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ModelRelations Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ModelRelations");
$this->service->showListView($criteria,"ModelRelations_list",$title);


?>
