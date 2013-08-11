
<?php
        // $formArray = $sc->getAutomatedFormElements($model,$viewobject);
          
        // $form = new CForm($formArray,$model);
       //  $form->attributes=array('id'=>$viewobject->gridid);
       Yii::app()->clientscript->scriptMap['jquery.js'] = false;

         
$formArray = $sc->getAutomatedFormElements($model,$viewobject,$additional_params);
$form = new CMonkForm($formArray,$model);
?>
<div id="<?  echo $viewobject->other_params; ?>" class="form" style="margin-top: 20px;">
    <?php echo $form->render(); 
      //register css and js scripts for this view
       $sc->registerAssets($viewobject);          
    ?>   
</div>
