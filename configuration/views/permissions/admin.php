<?php
$this->breadcrumbs=array(
	'Permissions'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Permissions",METADB_DB);
$this->service->showHybridGridView("Manage Permissions","Permissions_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Permissions', 
          'url'=>array("automated/create",
                        'view'=>'Permissions_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Permissions', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
 * 
 */


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Permissions-dialog-id',
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
      $( '#Permissions-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Permissions_form','Permissions-dialog-id' );
      $( '#Permissions-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>


