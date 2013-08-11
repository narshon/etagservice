<?php
$this->widget( 'zii.widgets.grid.CGridView', array(
  
  'id'=>'viewdetails-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns' => array(
      'id',
      'view_id',
      'fieldname',
    
    array(
      'class' => 'CButtonColumn',
      'buttons' => array(
        // Delete button
        'delete' => array(
          'click' => 'updateDialogOpen',
          'url' => 'Yii::app()->createUrl(
            "/admin/mix/delete",
            array( "id" => $data->primaryKey ) )',
          'options' => array(
            'data-update-dialog-title' => 'Delete confirmation',
          ),
        ),
        // Update button
        'update' => array(
          'click' => 'updateDialogOpen',
          'options' => array(
            'data-update-dialog-title' => Yii::t( 'app', 'Update mix' ),
          ),
        ),
        // View button
        'view' => array(
          'click' => 'updateDialogOpen',
          'options' => array(
            'data-update-dialog-title' => 'Preview mix',
          ),
        ),
      ),
    ),
  ),
));
?>