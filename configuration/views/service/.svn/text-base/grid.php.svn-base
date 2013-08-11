<?php

$filter=array();
if(isset($model_id)){
    $filter=array('id'=>$model_id);
}


$this->service=new ServiceComponent($this,"Service", METADB_DB);
$this->service->showHybridGridView("","Service_hybridgrid",$filter);


?>
