<?php

$filter=array();
if(isset($model_id)){
    $filter=array('id'=>$model_id);
}


$this->service=new ServiceComponent($this,"Views", METADB_DB);
$this->service->showHybridGridView("","Views_hybridgrid",$filter);


?>
