<?php
$this->breadcrumbs=array(
	'Model Validations',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add ModelValidations', 'url'=>array("automated/create",'view'=>'ModelValidations_form')),
	array('label'=>'Manage ModelValidations', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ModelValidations Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ModelValidations");
$this->service->showListView($criteria,"ModelValidations_list",$title);


?>
