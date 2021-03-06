<?php

//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add ModelValidations', 
          'url'=>array("automated/create",
                        'view'=>'ModelValidations_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')
         ), 
   // array('label'=>'Expense Categories', 'url'=>array("expcateg/admin")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */


//print $model_id;
$filter=array();
if(isset($model_id)){
    $filter=array('model_id'=>$model_id);
}
    
$this->service=new ServiceComponent($this,"ModelValidations",METADB_DB);
$this->service->showHybridGridView("Manage Model Validations","ModelValidations_hybridgrid",$filter);


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ModelValidations-dialog-id',
    'options'=>array(
        'title'=>'Create ModelValidations',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));


?>
<div class="divForForm"></div>

<?php
  $this->endWidget();  ?>


<script type="text/javascript">
jQuery( function($){
    $( 'a.update-dialog-create' ).bind( 'click', function( e ){
      e.preventDefault();
      $( '#ModelValidations-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ModelValidations_form','ModelValidations-dialog-id' );
      $( '#ModelValidations-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



