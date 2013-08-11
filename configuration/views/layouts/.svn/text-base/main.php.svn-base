<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
         
        <?php
         $cs=Yii::app()->clientScript;
         //$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/main.css');
         $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jsLib.js');
         $cs->registerCSSFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.css');
         $cs->registerCoreScript('jquery');
         $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide-full.js', CClientScript::POS_HEAD);
         $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD);
         $script = 'hs.graphicsDir = \''.Yii::app()->request->baseUrl.'/js/highslide/graphics/\';'."\n";
         $script .= 'hs.outlineType = \'rounded-white\';'."\n";
         $script .= 'hs.showCredits = false;';
         $cs->registerScript('hislide-par', $script, CClientScript::POS_BEGIN);
         $script = 'addHighSlideAttribute();';
         $cs->registerScript('hislide-att', $script, CClientScript::POS_END);
         
         
         $jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
	//Register jQuery, JS and CSS files
	// Yii::app()->clientScript->registerCoreScript('jquery');
	 Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');	
	 Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
         ?>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

        <div id="myslidemenu" class="jqueryslidemenu">
           <!-- <div id="mainmenu">  -->
                    <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                    array('label'=>'Home', 'url'=>array('/site/index')),
                                    array('label'=>'Students', 'url'=>array('/student/admin')),
                                    array('label'=>'Teachers', 'url'=>array('/SusTeacher/admin', 'view'=>'about')),
                                    array('label'=>'Classes', 'url'=>array('/TblClass/admin')),
                                    array('label'=>'Exams', 'url'=>array('/exams/admin')),
                                    array('label'=>'Events', 'url'=>array('/event/admin')),
                                    array('label'=>'Parents', 'url'=>array('/SusParent/admin')),
                                    array('label'=>'Configuration', 'url'=>array('/EtagService/service/admin')),
                                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                    )); ?>
           <br style="clear: left" />
           <!-- </div> <!-- mainmenu -->  
        </div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
   
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Etag Ltd.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->



</body>
</html>