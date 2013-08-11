<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Groups",METADB_DB);
$this->service->showHybridGridView("Manage Groups","Groups_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Groups', 
          'url'=>array("automated/create",
                        'view'=>'Groups_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Groups', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Groups-dialog-id',
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
      $( '#Groups-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Groups_form','Groups-dialog-id' );
      $( '#Groups-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



