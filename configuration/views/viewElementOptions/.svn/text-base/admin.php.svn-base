<?php
$this->breadcrumbs=array(
	'View Element Options'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"ViewElementOptions", METADB_DB);
$this->service->showHybridGridView("Manage View Element Options","ViewElementOptions_hybridgrid");



//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add ViewElementOptions', 
          'url'=>array("automated/create",
                        'view'=>'ViewElementOptions_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List View Element Options', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
*/

$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'ViewElementOptions-dialog-id',
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
      $( '#ViewElementOptions-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'ViewElementOptions_form','ViewElementOptions-dialog-id' );
      $( '#ViewElementOptions-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



