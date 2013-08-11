<?php
$this->breadcrumbs=array(
	'Portlets'=>array('index'),
	'Manage',
);


$filter=array();
if(isset($model_id)){
    $filter=array('model_id'=>$model_id);
}

$this->service=new ServiceComponent($this,"Portlets",METADB_DB);
$this->service->showHybridGridView("Manage Portlets","Portlets_hybridgrid", $filter);


//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add Portlets', 
          'url'=>array("automated/create",
                        'view'=>'Portlets_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Portlets', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Portlets-dialog-id',
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
      $( '#Portlets-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Portlets_form','Portlets-dialog-id' );
      $( '#Portlets-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



