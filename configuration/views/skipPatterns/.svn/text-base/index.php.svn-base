<?php
$this->breadcrumbs=array(
	'Skip Patterns',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add SkipPatterns', 'url'=>array("automated/create",'view'=>'SkipPatterns_form')),
	array('label'=>'Manage SkipPatterns', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> SkipPatterns Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"SkipPatterns");
$this->service->showListView($criteria,"SkipPatterns_list",$title);


?>
