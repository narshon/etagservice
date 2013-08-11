<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);

?>
<h1>Configuration Management</h1>
<?php if ($section == "service") { ?>
<div id="expand1" class="portlet-decoration view" style='float:left; border-left: 5px solid #6FACCF;'> <a href="#" onClick="showDiv('servicepane','expand1','Show Services');" > - </a></div>
<div  id="servicepane" class="view" >
    
    <?php Service::model()->showServices($module_id); ?><p> &nbsp; </p><br/>
    
    <div id="serviceinfopane" class="view portlet-content" style="clear:both;">
        <?php Service::model()->showDefaultServiceInfo(); ?>
    </div>
    <div id="tabbed-layoutpane">
        <!-- Tabs here -->
        <?php
           $tabs = Service::model()->getServiceTabs($this, array('module_id'=>$module_id));
           $this->service->showTabView($tabs, 'service-tabs');
        ?>
    </div>
</div>
<?php } ?>

<?php if ($section == "views") { ?>
<div id="outerviewdiv" class="view" style="margin:0px; padding: 0px; clear:both;">
    <div id="expand2" class="view portlet-decoration" style='float:left; margin-top: 0px; border-left: 5px solid #6FACCF;'> <a href="#" onClick="showDiv('viewpanetitle','expand2','Show Views');" > - </a></div>
    <div id="serviceinfopane" class="view portlet-content" style="clear:both;">
            <?php Service::model()->showDefaultServiceInfo(); ?>
    </div>
    <div  id="viewpanetitle" style="display:inline-block; clear:both; width:100%;"><h5> Available Views </h5>
         
        <div id="viewpane" >

            <?php Service::model()->showDefaultServiceViews(); ?>
            
        </div><br/><br/>
        <div id="tabbed-layoutpane" style="width:95%; padding:5px; clear:both;">
        <!-- Tabs here -->
        <?php
           $tabs = Service::model()->getViewTabs($this, array('service_id'=>Yii::app()->session->get('service_id')));
           $this->service->showTabView($tabs, 'view-tabs');
         
        
         
        ?>
        </div>
        
    </div>  
</div><br/>
<?php } ?>  

<?php if ($section == "portlets") { ?>
<div id="outerportletdiv" class="view" style="clear:both; margin:0px; padding: 0px;">
    <div id="expand3" class="view portlet-decoration" style='float:left; clear:both; margin-top: 0px; border-left: 5px solid #6FACCF;'> <a href="#" onClick="showDiv('portletspanetitle','expand3','Show Portlets');" > - </a></div>
    <div class="" id="portletspanetitle" style="display:inline-block; clear:both; width:100%;"> <h5> Service Portlets </h5> 
        <div id="portletspane">
            <?php Service::model()->showDefaultServicePortlets(); ?>
        </div><br/><br/>
        <div id="tabbed-layoutpane" style="width:95%; padding:5px;">
        <!-- Tabs here -->
        <?php
           $tabs = Service::model()->getPortletTabs($this, array('service_id'=>Yii::app()->session->get('service_id')));
           $this->service->showTabView($tabs,'portlet-tabs');
        ?>
        </div>
    </div>
</div><br/>
<?php } ?> 

<?php if ($section == "other") { ?>
<div id="outerviewdetaildiv" class="" style="clear:both; margin:0px; padding: 0px;">
    <div id="expand4" class="view portlet-decoration" style='clear:both; float:left; margin-top: 0px; border-left: 5px solid #6FACCF;'> <a href="#" onClick="showDiv('viewdetailspane','expand4','Other Configuration Settings');" > - </a></div>
    <div id="viewdetailspane" class="view" style="height:auto;"> <br/><br/>
        <div id="tabbed-layoutpane" style="width:95%; padding:5px;">
        <!-- Tabs here -->
        <?php
           $tabs = Service::model()->getOtherTabs($this, array('module_id'=>$module_id));
           $this->service->showTabView($tabs,'other-tabs');
        ?>
        </div>
    </div>
    
</div>
<?php } ?> 

<script type="text/javascript">
 $(document).ready(function(){
     showDiv("servicepane","expand1","Show Services");
     showDiv("viewpanetitle","expand2","Show Views");
     showDiv("portletspanetitle","expand3","Show Portlets");
     showDiv("viewdetailspane","expand4","Other Configuration Settings");
 });
  
</script>

<?php  //Audit Dialog Box 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>"audit-id",
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Audit Trail',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
       // 'height'=>270,
    ),
));

    echo '<div id="audit_dialog-content">';
             
             $url=$this->createAbsoluteUrl("/configuration/module/audit");
             $div="audit_dialog-content";
             $form="audit-form";
             print "<form method='POST' id='audit-form' onSubmit='ajaxFormSubmit(\"$url\",\"$div\",\"$form\"); return false;'>
                     Change Number: <input type='text' name='change_no'><br/> <br/>
                     Change Reason: <textarea  name='comments' cols='50' rows='5'></textarea><br/> <br/>
                     
                     <input type='submit' value='Save' >
                    </form>";
    echo '</div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

