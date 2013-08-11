<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Module",METADB_DB);
$this->service->showHybridGridView("Manage Modules","Module_hybridgrid");


//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add Module', 
          'url'=>array("automated/create",
                        'view'=>'Module_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Modules', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Module-dialog-id',
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
      $( '#Module-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Module_form','Module-dialog-id' );
      $( '#Module-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



