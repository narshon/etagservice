<?php

class PermissionsController extends Controller
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
                $sc=new ServiceComponent($this,"Permissions", METADB_DB);
                $sc->showAll();
                
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
				'actions'=>array('create','update'),
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
		$model=new Permissions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permissions']))
		{
			$model->attributes=$_POST['Permissions'];
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

		if(isset($_POST['Permissions']))
		{
			$model->attributes=$_POST['Permissions'];
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
		$dataProvider=new CActiveDataProvider('Permissions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Permissions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Permissions']))
			$model->attributes=$_GET['Permissions'];

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
		$model=Permissions::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='permissions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

