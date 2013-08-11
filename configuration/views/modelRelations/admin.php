<?php
$this->breadcrumbs=array(
	'Model Relations'=>array('index'),
	'Manage',
);

$filter=array();
if(isset($model_id)){
    $filter=array('model_id'=>$model_id);
}


$this->service=new ServiceComponent($this,"ModelRelations",METADB_DB);
$this->service->showHybridGridView("Manage Model Relations","ModelRelations_hybridgrid",$filter);


//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add ModelRelations', 
          'url'=>array("automated/create",
                        'view'=>'ModelRelations_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Model Relations', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ModelRelations-dialog-id',
    'options'=>array(
        'title'=>'Create Grades',
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
      $( '#ModelRelations-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ModelRelations_form','ModelRelations-dialog-id' );
      $( '#ModelRelations-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



