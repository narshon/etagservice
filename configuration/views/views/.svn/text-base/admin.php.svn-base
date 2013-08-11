<?php
$this->breadcrumbs=array(
	'Views'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Views", METADB_DB);
$this->service->showGridView("Manage Views","Views_grid");


//show portlets for this service
/*
$this->portletRight[]=array(
    array('label'=>'Add Views', 
          'url'=>array("automated/create",
                        'view'=>'Views_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Views', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Views-dialog-id',
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
      $( '#Views-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Views_form','Views-dialog-id' );
      $( '#Views-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



