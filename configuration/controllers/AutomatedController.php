<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutomatedController
 *
 * @author nngao
 */
class AutomatedController extends CController 
{
    public $layout='//layouts/column3';
    public $portlet=array();
    public $portlet_title=array();
    public $portlet_render=array();

    public $portletRight=array();
    public $portletRight_title=array();
    public $portletRight_render=array();
    
    public $breadcrumbs;
    public $service;
    public $menu=array();
    public $dataPortlets = array();
    public $dataPortlets_right=array();
        
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
            );
    }
    
    	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{       
                
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','hybridcreate','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
   
    public function actionCreate($view, $parent_grid='', $token='')
    {   
        
        $additional_params=array(
                                   'form_action_route'=>'automated/create',
                                   'form_action_params'=>array('view'=>$view),
                                );
        if(isset($parent_grid)){  
            $additional_params['form_action_params']['parent_id']= $parent_grid;
        }
        
        $serviceName=Views::model()->getServiceName($view);
        
         
        
        if($serviceName){
        $this->service=new ServiceComponent($this, $serviceName,METADB_DB); 
       // $this->service->show();
        
        $formArray=$this->service->getCreateForm($view, $additional_params);
        //$form = $formArray['form'];
        $model=$formArray['model'];
        $viewObject = $formArray['viewObject'];
        $modelName = $viewObject->view_model;
        $errors ='';
         // Uncomment the following line if AJAX validation is needed
           $this->performAjaxValidation($model,$viewObject->gridid);

                if(isset($_POST["$modelName"]))
                {
                   $model->attributes=$_POST["$modelName"];
                        
                   
                   
                   if (Yii::app()->request->isAjaxRequest)
                   {
                       //check for user defined before save implementation. we might not be required to save this record afterall.
                       if ( method_exists ($model ,  "AjaxServiceBeforeSave") ){
                           $errors = $model->AjaxServiceBeforeSave();
                           if(!$errors){
                               $newpage = $model->getAjaxRedirectPage($this);
                               echo CJSON::encode(array(
                                        'redirect'=>1, 
                                        'newpage'=>$newpage,
                                        'div'=>'redirecting...',
                                        ));
                                    exit;     
                           }
                       }
                   }
                   
                    if($model->save()){
                        
                          if ( method_exists ($model ,  "CustomAfterSave") ){
                              $model->AjaxServiceBeforeSave();
                          }
                         $div = $this->renderPartial("../".lcfirst($modelName)."/view",array('model'=>$model),true,false);
                         if (Yii::app()->request->isAjaxRequest)
                            {
                               // render details view for this save.
                                 
                                echo CJSON::encode(array(
                                    'status'=>'success',
                                    'updateGrid'=>1,
                                    'parent_grid'=>$modelName."_hybridgrid",
                                    'div'=>$div,
                                    ));
                                exit;               
                            }
                          else if(isset($_POST['type']) && $_POST['type']=="ajax"){
                               echo "parent_grid=>".$modelName."_hybridgrid"."_'!^*'_".$div; 
                               exit;
                          }
                            else {  
                                //$div = $this->renderPartial("../$modelName/view",array('model'=>$model),true,false); echo $div; //exit;
                                 $this->redirect(array("$modelName/view",'id'=>$model->id));
                            }
                                
                    }
                    
                }
                
                $form_params=array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$additional_params);
                
                if (Yii::app()->request->isAjaxRequest)
                     {
                        echo CJSON::encode(array(
                            'status'=>'failure', 
                            'div'=>$errors.$this->renderPartial('form', $form_params, true,true)));
                        exit;               
                     }
                     else{   
                         
                             if($token=='ajax'){
                                 
                                 $this->renderPartial('form', $form_params);
                             }
                             else if(isset($_POST['type']) && $_POST['type']=="ajax"){
                                // print $_POST['type']; exit;
                                 
                                 echo "parent_id=>{$modelName}_hybridgrid_'!^*'_";
                                  
                                 $this->renderPartial('form', $form_params,false, true);
                             }
                             else{
                               $this->render('form', $form_params);  
                             }
                           
                     }
        }
        else {
           throw new CHttpException(400,"$modelName form has been disabled" ); 
        }
        
         
        
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $view the view of the service whose model is to be updated
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($view='',$id='',$token='')
    {   
       
        
       $additional_params=array(
                                   'form_action_route'=>'automated/update',
                                   'form_action_params'=>array('view'=>$view,'id'=>$id),
                                );
        
        $serviceName=Views::model()->getServiceName($view);
        
        if($serviceName){
        $this->service=new ServiceComponent($this, $serviceName,METADB_DB); 
        //$this->service->show();
        
        $formArray=$this->service->getCreateForm($view, $additional_params);
        //$form = $formArray['form'];
        $model=$formArray['model'];
        $viewObject = $formArray['viewObject'];
        $modelName = $viewObject->view_model;
        
        
         // Uncomment the following line if AJAX validation is needed
                 $this->performAjaxValidation($model,$viewObject->gridid);

                if(isset($_POST["$modelName"]))
                {
                $model->attributes=$_POST["$modelName"];
                    if($model->save()){
                         if (Yii::app()->request->isAjaxRequest)
                            {
                               // render details view for this save.
                               
                               $div = $this->renderPartial("../".lcfirst($modelName)."/view",array('model'=>$model),true,false);
                                echo CJSON::encode(array(
                                    'status'=>'success',
                                    'updateGrid'=>1,
                                    'parent_grid'=>$modelName."_hybridgrid",
                                    'div'=>$div,
                                    ));
                                exit;               
                            }
                            else {
                               // $div = $this->renderPartial("../$modelName/view",array('model'=>$model),true,false); echo $div; //exit;
                                $this->redirect(array("$modelName/view",'id'=>$model->id));
                            }
                                
                    }
                    
                }
                
                $form_params=array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$additional_params);
                if (Yii::app()->request->isAjaxRequest)
                     {
                        echo CJSON::encode(array(
                            'status'=>'failure', 
                            'div'=>$this->renderPartial('form', $form_params, true,true)));
                        exit;               
                     }
                     else{
                         if($token=='ajax'){ 
                                 $this->renderPartial('form', $form_params);
                             }
                             else{
                               $this->render('form', $form_params);  
                         }
                     }
        }
        else
          throw new CHttpException(400,"$modelName form has been disabled" );
   
    }
    
    public function actionView($view,$id,$token=''){
        
        $model = new $view();
        $model=$model->findByPk($id);
                                      
        $this->renderPartial("../".lcfirst($view)."/view",array('model'=>$model),false,true);
        
      //  $this->service=new ServiceComponent($this,$view);
        // details view
      //  $this->service->showDetailView("","{$view}_detail",$model->id);
    }
    
    public function actionDelete($model='', $id=''){
        ob_start();
        $modelName=$model;
        //perform deletion
        $model =new $modelName();
        $model = $model->findByPk($id)->delete();
        
        ob_end_clean();
        echo CJSON::encode(array(
                            'status'=>'success', 
                            'updateGrid'=>1,
                            'parent_grid'=>$modelName."_hybridgrid",
                            'closeDialog'=>1,
                            'div'=>"Deleted ".$model." id=".$id));
        exit; 
        
    }
    
    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model,$formid)
    {
		if(isset($_POST['ajax']) && $_POST['ajax']===$formid)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    }
    
    public function actionHybridcreate($view='',$id=''){
        print "Hapa"; exit;
    }
}

?>
