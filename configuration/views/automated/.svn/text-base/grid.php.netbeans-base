
<?php 
       
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>$this->service->gridview_params['gridid'],
	'dataProvider'=>$model->search($filter),
	'filter'=>$model,
        'summaryText'=>'',
        'selectableRows'=>1,
        'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
        'cssFile' => Yii::app()->theme->baseUrl . '/css/widgets/gridview/styles.css',
	'columns'=>$this->service->gridData($viewID->id,$viewID->view_model),
)); 

?>

