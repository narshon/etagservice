<?php

class ViewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column3', meaning
	 * using three-column layout. See 'protected/views/layouts/column3.php'.
	 */
	public $layout='//layouts/column3';
        public $portlet=array();
        public $portlet_title=array();
        public $portlet_render=array();
        
        public $portletRight=array();
        public $portletRight_title=array();
        public $portletRight_render=array();
        
        public $service;
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
                //show portlets for this school
                $this->portlet[]=array(
                    array('label'=>'Add A New Service', 'url'=>array('service/create')),
                    array('label'=>'Manage Services', 'url'=>array('service/admin')),
                    array('label'=>'Manage Service Views', 'url'=>array('views/admin')),
                    array('label'=>'Manage Service Portlets', 'url'=>array('portlets/admin')),
                );
                array_push($this->portlet_title,"Operations");
                array_push($this->portlet_render,"portlet_full");
                
                 $sc=new ServiceComponent($this,"Views", METADB_DB);
                 $sc->show();
                 
                 $sc=new ServiceComponent($this,"service", METADB_DB);
                 $sc->show();
                 
                 $ldapgroup=new LdapGroup();  
                 $adminusers=array();
                 $adminusers=$ldapgroup->get_members("grp-u-kidms_admins");
                  if(!is_array($adminusers)){
                     $adminusers=array();
                 }
                 array_push($adminusers, 'admin');
                 
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','drop'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>$adminusers,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Views;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Views']))
		{
			$model->attributes=$_POST['Views'];
			if($model->save()){
                            if (Yii::app()->request->isAjaxRequest)
                            {
                                echo CJSON::encode(array(
                                    'status'=>'success', 
                                    'div'=>"Grades successfully added"
                                    ));
                                exit;               
                            }
                            else
                                $this->redirect(array('view','id'=>$model->id));
                        }
				
		}
                
                if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_form', array('model'=>$model), true)));
                    exit;               
                 }
                 else
                    $this->render('create',array('model'=>$model,));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Views']))
		{
			$model->attributes=$_POST['Views'];
			if($model->save()){
                             if (Yii::app()->request->isAjaxRequest)
                            {
                                echo CJSON::encode(array(
                                    'status'=>'success', 
                                    'div'=>"Grades successfully added"
                                    ));
                                exit;               
                            }
                            else
                                $this->redirect(array('view','id'=>$model->id));
                        
                        }
				
		}

		if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_form', array('model'=>$model), true)));
                    exit;               
                 }
                 else
		   $this->render('update',array('model'=>$model ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Views');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Views('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Views']))
			$model->attributes=$_GET['Views'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Views::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='views-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         public function actionDrop($drag='',$drop='',$dragvalue='',$dropvalue=''){
            
            
            
            if($drag!="" and $drop !=""){
               // $orderArray=explode('_',$drop);
               

                $fieldArray=explode('_',$drag);
                $field=$fieldArray[1];
                $dragObject=ViewDetails::model()->findByPk($field);
                
                $DropfieldArray=explode('_',$drop);
                $Dropfield=$DropfieldArray[1];
                $dropObject=ViewDetails::model()->findByPk($Dropfield);
                
                
                
                //swop positions
                ViewDetails::model()->updateByPk($Dropfield, array('display_order'=>$dragObject->display_order));

                ViewDetails::model()->updateByPk($field, array('display_order'=>$dropObject->display_order));
               // $moveddrop=
                
               
                $arr = array (
                               'dropfield'=>$drop,
                               'dropvalue'=>$dragObject->display_order,
                               'dragfield'=>$drag,
                               'dragvalue'=>$dropObject->display_order,
                               'moved_drop'=>$dragObject->id
                          );
                echo json_encode($arr);
            
            }
            
           
            
            
        }
}
