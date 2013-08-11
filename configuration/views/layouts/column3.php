<?php $this->beginContent(''); ?>
<div class="container">
      <div class="span-5 first">
        <div class="sidebar" >&nbsp;
            <?php
                    for($i=0; $i<count($this->portlet); $i++){
                        
                        if(isset($this->portlet_title[$i])){
                        
                        $contentdivid=$this->portlet_render."_left_".$i;
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"<div class='plinkleft' id='plinkleft_$i'><a href='#' onClick='showPortletText(\"$contentdivid\",\"plinkleft_$i\");'> + </a> </div><div id='ptextleft'>".$this->portlet_title[$i]."</div>",
			));
                        
                        print "<div id=".$this->portlet_render."_left_".$i." > ";
                        
                         $this->widget('ext.CDropDownMenu.CDropDownMenu',array(
                                'style' => 'vertical', // or default or navbar
				'items'=>$this->portlet[$i],
				'htmlOptions'=>array('class'=>'p_operations'),
			));
                        ?>
                        </div>  &nbsp; 
                        <?php
                        
			$this->endWidget();
                           
                        }
                        
                    }
                   
                        
		?>
             
            <?php // if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
        </div>
    </div>
    
	<div class="span-14">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar"> &nbsp; 
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			
			
			
			$this->endWidget();
		?>
                 &nbsp; &nbsp; 
                <?php
                    for($i=0; $i<count($this->portletRight); $i++){
                        
                        if(isset($this->portletRight_title[$i])){
                         
                        $contentdivid=$this->portletRight_render."_right_".$i;
                          
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"<div class='plinkright' id='plinkright_$i'><a href='#' onClick='showPortletText(\"$contentdivid\",\"plinkright_$i\");'> + </a> </div><div id='ptextright'>".$this->portletRight_title[$i]."</div>",
			));
                        
                        print "<div id=".$this->portletRight_render."_right_".$i." > ";
                        
			 $this->widget('ext.CDropDownMenu.CDropDownMenu',array(
                                'style' => 'vertical', // or default or navbar
				'items'=>$this->portletRight[$i],
				'htmlOptions'=>array('class'=>'p_operations'),
			));
                        ?> 
                        </div> &nbsp;  <?php
                        
			$this->endWidget();
                        
                        }          
                    }      
		?>
                 
		
		</div><!-- sidebar -->
	

<script type="text/javascript">
//Document.Ready - Start of jquery execution
$(document).ready(function(){
    
   //hide all hidden portlets
    //get left portlets count
    var leftPortletsCount='<?php echo Yii::app()->session->get("portletCount_left"); Yii::app()->session->remove("portletCount_left"); ?>';
    if(leftPortletsCount >= 1){
       for(i=0; i<leftPortletsCount; i++){  //alert("<?php // echo $this->portlet_render; ?>");
          if("<?php echo $this->portlet_render; ?>" == "portlet_partial_left_" ) 
                $("div#portlet_partial_left_"+i).hide("slow");  
       }
       
    }
    
     //get right portlets count
    var rightPortletsCount='<?php echo Yii::app()->session->get("portletCount_right"); Yii::app()->session->remove("portletCount_right"); ?>';
    
    if(rightPortletsCount >= 1){
       for(i=0; i<rightPortletsCount; i++){
          $("div#portlet_partial_right_"+i).hide("slow");  
       } 
    }
    
    
});

</script>
    
      </div>

</div>

<?php $this->endContent(); ?>

