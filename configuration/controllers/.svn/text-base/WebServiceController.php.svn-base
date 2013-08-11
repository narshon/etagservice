<?php 
class WebServiceController extends CController implements IWebServiceProvider
{
    public function actions()
    {
        return array(
            
            'sus'=>array(
                        'class'=>'CWebServiceAction',
                        'classMap'=>array(
                                'Student',
					'Service',
					'SusUsers',
					'SusSchool',
					'TblClass',
					'Exams',
					'Term',
					'Grades',
					'Event',
					'Service',
					'Views',
					'ViewDetails',
					'Portlets',
					'Student',
					'StudentResult',
					'StudentStatus',
					'CocurrStatus',
					'CoCurricularStudent',
					'FeeStatus',
					'AcademicStatus',
					'SusTeacher',
					'TeacherSubject',
					'Exams',
					'ClassResult',
					'Subject',
					'SubjectResult',
					'EventType',
					'CoCurricular',
					'CoCurricularEvent',
					'AcademicEvent',
					'SusParent',
					'SusParentStudents',
					'ParentAppointment',
					'AppointSession',
					'TblClass',
					'SusUsers',
									
                        ),
	   ),
        );
    }


     /**
     * equivalent to model->findAll($criteria). 
     * wrapper method for data access layer to pull out multiple records on the fly from any table 
     */
    public function getModel($servicename,$name_alias,$condition='')
    {       
            $criteria=new CDbCriteria();
            $criteria->order='id desc';
            if($condition !=""){
                $criteria->condition=$condition;
            }
            
            
            $sc=new ServiceComponent($this,$servicename);
            
            $return = $sc->WebServiceObject($criteria,$name_alias,$title='');
            
            return $return;
            
    }
    
    /**
     * equivalent to model->find($criteria). 
     * wrapper method for data access layer to pull out one record on the fly from any table 
     */
    public function getModelRecord($servicename,$name_alias,$condition='')
    {       
            $criteria=new CDbCriteria();
            $criteria->order='id desc';
            
            if($condition !=''){
                $criteria->condition=$condition;
            }

            $sc=new ServiceComponent($this,$servicename);
            
            $return = $sc->WebServiceRecord($criteria,$name_alias,$title='');
            
            return $return;
            
    }
    
    /**
     * equivalent to model->delete()
     * wrapper method for data access layer to delete one record on the fly from any table 
     */
    public function deleteModelRecord($servicename,$name_alias,$id)
    {       
           
            $sc=new ServiceComponent($this,$servicename);
            
            $sc->WebServiceDeleteRecord($name_alias,$id);
            
            
            
    }
    
    /**
     * Default web view for debugging
     */
    public function actionIndex()
    {
        $this->render('index');
    }
    
    
    /****************************************************************
    *                      WEB SERVICES                             *
    *                                                               *                                                    
    *****************************************************************/
    
    /**
	 * This method is required by IWebServiceProvider.
	 * It makes sure the user is logged in before making changes to data.
	 * @param CWebService the currently requested Web service.
	 * @return boolean whether the remote method should be executed.
	 */
	public function beforeWebMethod($service)
	{
		$safeMethods=array(
			'login',
		);
                
		$pattern='/^('.implode('|',$safeMethods).')$/i';
		if(!Yii::app()->user->isGuest || preg_match($pattern,$service->methodName)){
                    return true;
                      
                }	
		else {
                    throw new CException('Login required.');
                }
			
	}

	/**
	 * This method is required by IWebServiceProvider.
	 * @param CWebService the currently requested Web service.
	 */
	public function afterWebMethod($service)
	{
	}

	/*** The following methods are Web service APIs ***/

	/**
	 * @param string username
	 * @param string password
	 * @return boolean whether login is valid
	 * @soap
	 */
	public function login($username,$password)
	{
		$identity=new UserIdentity($username,$password);
		if($identity->authenticate())
			Yii::app()->user->login($identity);
		return $identity->isAuthenticated;
	}
        
        /**
         * @return array the user profile
         * @soap
         */
        public function userProfile(){
            return Yii::app()->user->profile;
        }
        
        /**
         * @return array the school profile
         * @soap
         */
        public function schoolProfile(){
            return Yii::app()->user->school;
        }

    
                    
                        /**
                         * Updates or inserts a term.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Term model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveTerm($term)
                        {
                                if($term->id > 0) // update
                                {
                                        $term->isNewRecord=false;
                                        if(($oldterm =  Term::model()->findByPk($student->id))!==null)
                                        {
                                                $oldterm->attributes=$term->attributes;
                                                return $oldterm->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $term->isNewRecord=true;
                                        $term->id=null;
                                        return $term->save();
                                }

                          }
                    /**
                * Returns records of Term.
                * @param string search condition
                * @return Term[] the model records
                * @soap
                */
                public function getTerm_grid($condition=''){
                    return $this->getModel("Term","Term_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteTerm_gridRecord($id){
                     $this->deleteModelRecord("Term","Term_grid",$id);
                }
                /**
                * Returns records of Term.
                * @param string search condition
                * @return Term[] the model records
                * @soap
                */
                public function getTerm_list($condition=''){
                    return $this->getModel("Term","Term_list",$condition);
                }
                            /**
                * Returns a record of Term.
                * @param string search condition
                * @return Term[] the model records
                * @soap
                */
                public function getTerm_detail($condition=''){
                    return $this->getModelRecord("Term","Term_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a grades.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Grades model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveGrades($grades)
                        {
                                if($grades->id > 0) // update
                                {
                                        $grades->isNewRecord=false;
                                        if(($oldgrades =  Grades::model()->findByPk($student->id))!==null)
                                        {
                                                $oldgrades->attributes=$grades->attributes;
                                                return $oldgrades->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $grades->isNewRecord=true;
                                        $grades->id=null;
                                        return $grades->save();
                                }

                          }
                    /**
                * Returns records of Grades.
                * @param string search condition
                * @return Grades[] the model records
                * @soap
                */
                public function getGrades_grid($condition=''){
                    return $this->getModel("grades","Grades_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteGrades_gridRecord($id){
                     $this->deleteModelRecord("grades","Grades_grid",$id);
                }
                /**
                * Returns records of Grades.
                * @param string search condition
                * @return Grades[] the model records
                * @soap
                */
                public function getGrades_list($condition=''){
                    return $this->getModel("grades","Grades_list",$condition);
                }
                            /**
                * Returns a record of Grades.
                * @param string search condition
                * @return Grades[] the model records
                * @soap
                */
                public function getGrades_detail($condition=''){
                    return $this->getModelRecord("grades","Grades_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a event.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Event model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveEvent($event)
                        {
                                if($event->id > 0) // update
                                {
                                        $event->isNewRecord=false;
                                        if(($oldevent =  Event::model()->findByPk($student->id))!==null)
                                        {
                                                $oldevent->attributes=$event->attributes;
                                                return $oldevent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $event->isNewRecord=true;
                                        $event->id=null;
                                        return $event->save();
                                }

                          }
                    /**
                * Returns records of Event.
                * @param string search condition
                * @return Event[] the model records
                * @soap
                */
                public function getEvent_grid($condition=''){
                    return $this->getModel("event","Event_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteEvent_gridRecord($id){
                     $this->deleteModelRecord("event","Event_grid",$id);
                }
                /**
                * Returns records of Event.
                * @param string search condition
                * @return Event[] the model records
                * @soap
                */
                public function getEvent_list($condition=''){
                    return $this->getModel("event","Event_list",$condition);
                }
                            /**
                * Returns a record of Event.
                * @param string search condition
                * @return Event[] the model records
                * @soap
                */
                public function getEvent_detail($condition=''){
                    return $this->getModelRecord("event","Event_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a service.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Service model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveService($service)
                        {
                                if($service->id > 0) // update
                                {
                                        $service->isNewRecord=false;
                                        if(($oldservice =  Service::model()->findByPk($student->id))!==null)
                                        {
                                                $oldservice->attributes=$service->attributes;
                                                return $oldservice->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $service->isNewRecord=true;
                                        $service->id=null;
                                        return $service->save();
                                }

                          }
                    /**
                * Returns records of Service.
                * @param string search condition
                * @return Service[] the model records
                * @soap
                */
                public function getService_grid($condition=''){
                    return $this->getModel("service","Service_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteService_gridRecord($id){
                     $this->deleteModelRecord("service","Service_grid",$id);
                }
                /**
                * Returns records of Service.
                * @param string search condition
                * @return Service[] the model records
                * @soap
                */
                public function getService_list($condition=''){
                    return $this->getModel("service","Service_list",$condition);
                }
                            /**
                * Returns a record of Service.
                * @param string search condition
                * @return Service[] the model records
                * @soap
                */
                public function getService_detail($condition=''){
                    return $this->getModelRecord("service","Service_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a views.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Views model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveViews($views)
                        {
                                if($views->id > 0) // update
                                {
                                        $views->isNewRecord=false;
                                        if(($oldviews =  Views::model()->findByPk($student->id))!==null)
                                        {
                                                $oldviews->attributes=$views->attributes;
                                                return $oldviews->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $views->isNewRecord=true;
                                        $views->id=null;
                                        return $views->save();
                                }

                          }
                    /**
                * Returns records of Views.
                * @param string search condition
                * @return Views[] the model records
                * @soap
                */
                public function getViews_grid($condition=''){
                    return $this->getModel("views","Views_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteViews_gridRecord($id){
                     $this->deleteModelRecord("views","Views_grid",$id);
                }
                /**
                * Returns records of Views.
                * @param string search condition
                * @return Views[] the model records
                * @soap
                */
                public function getViews_list($condition=''){
                    return $this->getModel("views","Views_list",$condition);
                }
                            /**
                * Returns a record of Views.
                * @param string search condition
                * @return Views[] the model records
                * @soap
                */
                public function getViews_detail($condition=''){
                    return $this->getModelRecord("views","Views_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a viewdetails.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param ViewDetails model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveViewDetails($viewdetails)
                        {
                                if($viewdetails->id > 0) // update
                                {
                                        $viewdetails->isNewRecord=false;
                                        if(($oldviewdetails =  ViewDetails::model()->findByPk($student->id))!==null)
                                        {
                                                $oldviewdetails->attributes=$viewdetails->attributes;
                                                return $oldviewdetails->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $viewdetails->isNewRecord=true;
                                        $viewdetails->id=null;
                                        return $viewdetails->save();
                                }

                          }
                    /**
                * Returns records of ViewDetails.
                * @param string search condition
                * @return ViewDetails[] the model records
                * @soap
                */
                public function getViewDetails_grid($condition=''){
                    return $this->getModel("viewdetails","ViewDetails_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteViewDetails_gridRecord($id){
                     $this->deleteModelRecord("viewdetails","ViewDetails_grid",$id);
                }
                /**
                * Returns records of ViewDetails.
                * @param string search condition
                * @return ViewDetails[] the model records
                * @soap
                */
                public function getViewDetails_list($condition=''){
                    return $this->getModel("viewdetails","ViewDetails_list",$condition);
                }
                            /**
                * Returns a record of ViewDetails.
                * @param string search condition
                * @return ViewDetails[] the model records
                * @soap
                */
                public function getViewDetails_detail($condition=''){
                    return $this->getModelRecord("viewdetails","ViewDetails_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a portlets.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Portlets model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function savePortlets($portlets)
                        {
                                if($portlets->id > 0) // update
                                {
                                        $portlets->isNewRecord=false;
                                        if(($oldportlets =  Portlets::model()->findByPk($student->id))!==null)
                                        {
                                                $oldportlets->attributes=$portlets->attributes;
                                                return $oldportlets->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $portlets->isNewRecord=true;
                                        $portlets->id=null;
                                        return $portlets->save();
                                }

                          }
                    /**
                * Returns records of Portlets.
                * @param string search condition
                * @return Portlets[] the model records
                * @soap
                */
                public function getPortlets_grid($condition=''){
                    return $this->getModel("portlets","Portlets_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deletePortlets_gridRecord($id){
                     $this->deleteModelRecord("portlets","Portlets_grid",$id);
                }
                /**
                * Returns records of Portlets.
                * @param string search condition
                * @return Portlets[] the model records
                * @soap
                */
                public function getPortlets_list($condition=''){
                    return $this->getModel("portlets","Portlets_list",$condition);
                }
                            /**
                * Returns a record of Portlets.
                * @param string search condition
                * @return Portlets[] the model records
                * @soap
                */
                public function getPortlets_detail($condition=''){
                    return $this->getModelRecord("portlets","Portlets_detail",$condition);
                }
                /**
                * Returns records of Student.
                * @param string search condition
                * @return Student[] the model records
                * @soap
                */
                public function getStudent_grid($condition=''){
                    return $this->getModel("student","Student_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteStudent_gridRecord($id){
                     $this->deleteModelRecord("student","Student_grid",$id);
                }
                /**
                * Returns records of Student.
                * @param string search condition
                * @return Student[] the model records
                * @soap
                */
                public function getStudent_list($condition=''){
                    return $this->getModel("student","Student_list",$condition);
                }
                            /**
                * Returns a record of Student.
                * @param string search condition
                * @return Student[] the model records
                * @soap
                */
                public function getStudent_detail($condition=''){
                    return $this->getModelRecord("student","Student_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a studentresult.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param StudentResult model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveStudentResult($studentresult)
                        {
                                if($studentresult->id > 0) // update
                                {
                                        $studentresult->isNewRecord=false;
                                        if(($oldstudentresult =  StudentResult::model()->findByPk($student->id))!==null)
                                        {
                                                $oldstudentresult->attributes=$studentresult->attributes;
                                                return $oldstudentresult->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $studentresult->isNewRecord=true;
                                        $studentresult->id=null;
                                        return $studentresult->save();
                                }

                          }
                    /**
                * Returns records of StudentResult.
                * @param string search condition
                * @return StudentResult[] the model records
                * @soap
                */
                public function getStudentResult_grid($condition=''){
                    return $this->getModel("studentresult","StudentResult_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteStudentResult_gridRecord($id){
                     $this->deleteModelRecord("studentresult","StudentResult_grid",$id);
                }
                /**
                * Returns records of StudentResult.
                * @param string search condition
                * @return StudentResult[] the model records
                * @soap
                */
                public function getStudentResult_list($condition=''){
                    return $this->getModel("studentresult","StudentResult_list",$condition);
                }
                            /**
                * Returns a record of StudentResult.
                * @param string search condition
                * @return StudentResult[] the model records
                * @soap
                */
                public function getStudentResult_detail($condition=''){
                    return $this->getModelRecord("studentresult","StudentResult_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a studentstatus.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param StudentStatus model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveStudentStatus($studentstatus)
                        {
                                if($studentstatus->id > 0) // update
                                {
                                        $studentstatus->isNewRecord=false;
                                        if(($oldstudentstatus =  StudentStatus::model()->findByPk($student->id))!==null)
                                        {
                                                $oldstudentstatus->attributes=$studentstatus->attributes;
                                                return $oldstudentstatus->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $studentstatus->isNewRecord=true;
                                        $studentstatus->id=null;
                                        return $studentstatus->save();
                                }

                          }
                    /**
                * Returns records of StudentStatus.
                * @param string search condition
                * @return StudentStatus[] the model records
                * @soap
                */
                public function getStudentStatus_grid($condition=''){
                    return $this->getModel("studentstatus","StudentStatus_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteStudentStatus_gridRecord($id){
                     $this->deleteModelRecord("studentstatus","StudentStatus_grid",$id);
                }
                /**
                * Returns records of StudentStatus.
                * @param string search condition
                * @return StudentStatus[] the model records
                * @soap
                */
                public function getStudentStatus_list($condition=''){
                    return $this->getModel("studentstatus","StudentStatus_list",$condition);
                }
                            /**
                * Returns a record of StudentStatus.
                * @param string search condition
                * @return StudentStatus[] the model records
                * @soap
                */
                public function getStudentStatus_detail($condition=''){
                    return $this->getModelRecord("studentstatus","StudentStatus_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a cocurrstatus.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param CocurrStatus model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveCocurrStatus($cocurrstatus)
                        {
                                if($cocurrstatus->id > 0) // update
                                {
                                        $cocurrstatus->isNewRecord=false;
                                        if(($oldcocurrstatus =  CocurrStatus::model()->findByPk($student->id))!==null)
                                        {
                                                $oldcocurrstatus->attributes=$cocurrstatus->attributes;
                                                return $oldcocurrstatus->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $cocurrstatus->isNewRecord=true;
                                        $cocurrstatus->id=null;
                                        return $cocurrstatus->save();
                                }

                          }
                    /**
                * Returns records of CocurrStatus.
                * @param string search condition
                * @return CocurrStatus[] the model records
                * @soap
                */
                public function getCocurrStatus_grid($condition=''){
                    return $this->getModel("cocurrstatus","CocurrStatus_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteCocurrStatus_gridRecord($id){
                     $this->deleteModelRecord("cocurrstatus","CocurrStatus_grid",$id);
                }
                /**
                * Returns records of CocurrStatus.
                * @param string search condition
                * @return CocurrStatus[] the model records
                * @soap
                */
                public function getCocurrStatus_list($condition=''){
                    return $this->getModel("cocurrstatus","CocurrStatus_list",$condition);
                }
                            /**
                * Returns a record of CocurrStatus.
                * @param string search condition
                * @return CocurrStatus[] the model records
                * @soap
                */
                public function getCocurrStatus_detail($condition=''){
                    return $this->getModelRecord("cocurrstatus","CocurrStatus_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a cocurricularstudent.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param CoCurricularStudent model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveCoCurricularStudent($cocurricularstudent)
                        {
                                if($cocurricularstudent->id > 0) // update
                                {
                                        $cocurricularstudent->isNewRecord=false;
                                        if(($oldcocurricularstudent =  CoCurricularStudent::model()->findByPk($student->id))!==null)
                                        {
                                                $oldcocurricularstudent->attributes=$cocurricularstudent->attributes;
                                                return $oldcocurricularstudent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $cocurricularstudent->isNewRecord=true;
                                        $cocurricularstudent->id=null;
                                        return $cocurricularstudent->save();
                                }

                          }
                    /**
                * Returns records of CoCurricularStudent.
                * @param string search condition
                * @return CoCurricularStudent[] the model records
                * @soap
                */
                public function getCoCurricularStudent_grid($condition=''){
                    return $this->getModel("cocurricularstudent","CoCurricularStudent_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteCoCurricularStudent_gridRecord($id){
                     $this->deleteModelRecord("cocurricularstudent","CoCurricularStudent_grid",$id);
                }
                /**
                * Returns records of CoCurricularStudent.
                * @param string search condition
                * @return CoCurricularStudent[] the model records
                * @soap
                */
                public function getCoCurricularStudent_list($condition=''){
                    return $this->getModel("cocurricularstudent","CoCurricularStudent_list",$condition);
                }
                            /**
                * Returns a record of CoCurricularStudent.
                * @param string search condition
                * @return CoCurricularStudent[] the model records
                * @soap
                */
                public function getCoCurricularStudent_detail($condition=''){
                    return $this->getModelRecord("cocurricularstudent","CoCurricularStudent_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a feestatus.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param FeeStatus model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveFeeStatus($feestatus)
                        {
                                if($feestatus->id > 0) // update
                                {
                                        $feestatus->isNewRecord=false;
                                        if(($oldfeestatus =  FeeStatus::model()->findByPk($student->id))!==null)
                                        {
                                                $oldfeestatus->attributes=$feestatus->attributes;
                                                return $oldfeestatus->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $feestatus->isNewRecord=true;
                                        $feestatus->id=null;
                                        return $feestatus->save();
                                }

                          }
                    /**
                * Returns records of FeeStatus.
                * @param string search condition
                * @return FeeStatus[] the model records
                * @soap
                */
                public function getFeeStatus_grid($condition=''){
                    return $this->getModel("feestatus","FeeStatus_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteFeeStatus_gridRecord($id){
                     $this->deleteModelRecord("feestatus","FeeStatus_grid",$id);
                }
                /**
                * Returns records of FeeStatus.
                * @param string search condition
                * @return FeeStatus[] the model records
                * @soap
                */
                public function getFeeStatus_list($condition=''){
                    return $this->getModel("feestatus","FeeStatus_list",$condition);
                }
                            /**
                * Returns a record of FeeStatus.
                * @param string search condition
                * @return FeeStatus[] the model records
                * @soap
                */
                public function getFeeStatus_detail($condition=''){
                    return $this->getModelRecord("feestatus","FeeStatus_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a academicstatus.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param AcademicStatus model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveAcademicStatus($academicstatus)
                        {
                                if($academicstatus->id > 0) // update
                                {
                                        $academicstatus->isNewRecord=false;
                                        if(($oldacademicstatus =  AcademicStatus::model()->findByPk($student->id))!==null)
                                        {
                                                $oldacademicstatus->attributes=$academicstatus->attributes;
                                                return $oldacademicstatus->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $academicstatus->isNewRecord=true;
                                        $academicstatus->id=null;
                                        return $academicstatus->save();
                                }

                          }
                    /**
                * Returns records of AcademicStatus.
                * @param string search condition
                * @return AcademicStatus[] the model records
                * @soap
                */
                public function getAcademicStatus_grid($condition=''){
                    return $this->getModel("academicstatus","AcademicStatus_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteAcademicStatus_gridRecord($id){
                     $this->deleteModelRecord("academicstatus","AcademicStatus_grid",$id);
                }
                /**
                * Returns records of AcademicStatus.
                * @param string search condition
                * @return AcademicStatus[] the model records
                * @soap
                */
                public function getAcademicStatus_list($condition=''){
                    return $this->getModel("academicstatus","AcademicStatus_list",$condition);
                }
                            /**
                * Returns a record of AcademicStatus.
                * @param string search condition
                * @return AcademicStatus[] the model records
                * @soap
                */
                public function getAcademicStatus_detail($condition=''){
                    return $this->getModelRecord("academicstatus","AcademicStatus_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a susteacher.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param SusTeacher model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSusTeacher($susteacher)
                        {
                                if($susteacher->id > 0) // update
                                {
                                        $susteacher->isNewRecord=false;
                                        if(($oldsusteacher =  SusTeacher::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsusteacher->attributes=$susteacher->attributes;
                                                return $oldsusteacher->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $susteacher->isNewRecord=true;
                                        $susteacher->id=null;
                                        return $susteacher->save();
                                }

                          }
                    /**
                * Returns records of SusTeacher.
                * @param string search condition
                * @return SusTeacher[] the model records
                * @soap
                */
                public function getSusTeacher_grid($condition=''){
                    return $this->getModel("susteacher","SusTeacher_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteSusTeacher_gridRecord($id){
                     $this->deleteModelRecord("susteacher","SusTeacher_grid",$id);
                }
                /**
                * Returns records of SusTeacher.
                * @param string search condition
                * @return SusTeacher[] the model records
                * @soap
                */
                public function getSusTeacher_list($condition=''){
                    return $this->getModel("susteacher","SusTeacher_list",$condition);
                }
                            /**
                * Returns a record of SusTeacher.
                * @param string search condition
                * @return SusTeacher[] the model records
                * @soap
                */
                public function getSusTeacher_detail($condition=''){
                    return $this->getModelRecord("susteacher","SusTeacher_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a teachersubject.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param TeacherSubject model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveTeacherSubject($teachersubject)
                        {
                                if($teachersubject->id > 0) // update
                                {
                                        $teachersubject->isNewRecord=false;
                                        if(($oldteachersubject =  TeacherSubject::model()->findByPk($student->id))!==null)
                                        {
                                                $oldteachersubject->attributes=$teachersubject->attributes;
                                                return $oldteachersubject->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $teachersubject->isNewRecord=true;
                                        $teachersubject->id=null;
                                        return $teachersubject->save();
                                }

                          }
                    /**
                * Returns records of TeacherSubject.
                * @param string search condition
                * @return TeacherSubject[] the model records
                * @soap
                */
                public function getTeacherSubject_grid($condition=''){
                    return $this->getModel("teachersubject","TeacherSubject_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteTeacherSubject_gridRecord($id){
                     $this->deleteModelRecord("teachersubject","TeacherSubject_grid",$id);
                }
                /**
                * Returns records of TeacherSubject.
                * @param string search condition
                * @return TeacherSubject[] the model records
                * @soap
                */
                public function getTeacherSubject_list($condition=''){
                    return $this->getModel("teachersubject","TeacherSubject_list",$condition);
                }
                            /**
                * Returns a record of TeacherSubject.
                * @param string search condition
                * @return TeacherSubject[] the model records
                * @soap
                */
                public function getTeacherSubject_detail($condition=''){
                    return $this->getModelRecord("teachersubject","TeacherSubject_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a exams.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Exams model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveExams($exams)
                        {
                                if($exams->id > 0) // update
                                {
                                        $exams->isNewRecord=false;
                                        if(($oldexams =  Exams::model()->findByPk($student->id))!==null)
                                        {
                                                $oldexams->attributes=$exams->attributes;
                                                return $oldexams->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $exams->isNewRecord=true;
                                        $exams->id=null;
                                        return $exams->save();
                                }

                          }
                    /**
                * Returns records of Exams.
                * @param string search condition
                * @return Exams[] the model records
                * @soap
                */
                public function getExams_grid($condition=''){
                    return $this->getModel("exams","Exams_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteExams_gridRecord($id){
                     $this->deleteModelRecord("exams","Exams_grid",$id);
                }
                /**
                * Returns records of Exams.
                * @param string search condition
                * @return Exams[] the model records
                * @soap
                */
                public function getExams_list($condition=''){
                    return $this->getModel("exams","Exams_list",$condition);
                }
                            /**
                * Returns a record of Exams.
                * @param string search condition
                * @return Exams[] the model records
                * @soap
                */
                public function getExams_detail($condition=''){
                    return $this->getModelRecord("exams","Exams_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a classresult.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param ClassResult model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveClassResult($classresult)
                        {
                                if($classresult->id > 0) // update
                                {
                                        $classresult->isNewRecord=false;
                                        if(($oldclassresult =  ClassResult::model()->findByPk($student->id))!==null)
                                        {
                                                $oldclassresult->attributes=$classresult->attributes;
                                                return $oldclassresult->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $classresult->isNewRecord=true;
                                        $classresult->id=null;
                                        return $classresult->save();
                                }

                          }
                    /**
                * Returns records of ClassResult.
                * @param string search condition
                * @return ClassResult[] the model records
                * @soap
                */
                public function getClassResult_grid($condition=''){
                    return $this->getModel("classresult","ClassResult_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteClassResult_gridRecord($id){
                     $this->deleteModelRecord("classresult","ClassResult_grid",$id);
                }
                /**
                * Returns records of ClassResult.
                * @param string search condition
                * @return ClassResult[] the model records
                * @soap
                */
                public function getClassResult_list($condition=''){
                    return $this->getModel("classresult","ClassResult_list",$condition);
                }
                            /**
                * Returns a record of ClassResult.
                * @param string search condition
                * @return ClassResult[] the model records
                * @soap
                */
                public function getClassResult_detail($condition=''){
                    return $this->getModelRecord("classresult","ClassResult_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a subject.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Subject model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSubject($subject)
                        {
                                if($subject->id > 0) // update
                                {
                                        $subject->isNewRecord=false;
                                        if(($oldsubject =  Subject::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsubject->attributes=$subject->attributes;
                                                return $oldsubject->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $subject->isNewRecord=true;
                                        $subject->id=null;
                                        return $subject->save();
                                }

                          }
                    /**
                * Returns records of Subject.
                * @param string search condition
                * @return Subject[] the model records
                * @soap
                */
                public function getSubject_grid($condition=''){
                    return $this->getModel("subject","Subject_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteSubject_gridRecord($id){
                     $this->deleteModelRecord("subject","Subject_grid",$id);
                }
                /**
                * Returns records of Subject.
                * @param string search condition
                * @return Subject[] the model records
                * @soap
                */
                public function getSubject_list($condition=''){
                    return $this->getModel("subject","Subject_list",$condition);
                }
                            /**
                * Returns a record of Subject.
                * @param string search condition
                * @return Subject[] the model records
                * @soap
                */
                public function getSubject_detail($condition=''){
                    return $this->getModelRecord("subject","Subject_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a subjectresult.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param SubjectResult model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSubjectResult($subjectresult)
                        {
                                if($subjectresult->id > 0) // update
                                {
                                        $subjectresult->isNewRecord=false;
                                        if(($oldsubjectresult =  SubjectResult::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsubjectresult->attributes=$subjectresult->attributes;
                                                return $oldsubjectresult->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $subjectresult->isNewRecord=true;
                                        $subjectresult->id=null;
                                        return $subjectresult->save();
                                }

                          }
                    /**
                * Returns records of SubjectResult.
                * @param string search condition
                * @return SubjectResult[] the model records
                * @soap
                */
                public function getSubjectResult_grid($condition=''){
                    return $this->getModel("subjectresult","SubjectResult_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteSubjectResult_gridRecord($id){
                     $this->deleteModelRecord("subjectresult","SubjectResult_grid",$id);
                }
                /**
                * Returns records of SubjectResult.
                * @param string search condition
                * @return SubjectResult[] the model records
                * @soap
                */
                public function getSubjectResult_list($condition=''){
                    return $this->getModel("subjectresult","SubjectResult_list",$condition);
                }
                            /**
                * Returns a record of SubjectResult.
                * @param string search condition
                * @return SubjectResult[] the model records
                * @soap
                */
                public function getSubjectResult_detail($condition=''){
                    return $this->getModelRecord("subjectresult","SubjectResult_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a eventtype.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param EventType model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveEventType($eventtype)
                        {
                                if($eventtype->id > 0) // update
                                {
                                        $eventtype->isNewRecord=false;
                                        if(($oldeventtype =  EventType::model()->findByPk($student->id))!==null)
                                        {
                                                $oldeventtype->attributes=$eventtype->attributes;
                                                return $oldeventtype->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $eventtype->isNewRecord=true;
                                        $eventtype->id=null;
                                        return $eventtype->save();
                                }

                          }
                    /**
                * Returns records of EventType.
                * @param string search condition
                * @return EventType[] the model records
                * @soap
                */
                public function getEventType_grid($condition=''){
                    return $this->getModel("eventtype","EventType_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteEventType_gridRecord($id){
                     $this->deleteModelRecord("eventtype","EventType_grid",$id);
                }
                /**
                * Returns records of EventType.
                * @param string search condition
                * @return EventType[] the model records
                * @soap
                */
                public function getEventType_list($condition=''){
                    return $this->getModel("eventtype","EventType_list",$condition);
                }
                            /**
                * Returns a record of EventType.
                * @param string search condition
                * @return EventType[] the model records
                * @soap
                */
                public function getEventType_detail($condition=''){
                    return $this->getModelRecord("eventtype","EventType_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a cocurricular.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param CoCurricular model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveCoCurricular($cocurricular)
                        {
                                if($cocurricular->id > 0) // update
                                {
                                        $cocurricular->isNewRecord=false;
                                        if(($oldcocurricular =  CoCurricular::model()->findByPk($student->id))!==null)
                                        {
                                                $oldcocurricular->attributes=$cocurricular->attributes;
                                                return $oldcocurricular->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $cocurricular->isNewRecord=true;
                                        $cocurricular->id=null;
                                        return $cocurricular->save();
                                }

                          }
                    /**
                * Returns records of CoCurricular.
                * @param string search condition
                * @return CoCurricular[] the model records
                * @soap
                */
                public function getCoCurricular_grid($condition=''){
                    return $this->getModel("cocurricular","CoCurricular_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteCoCurricular_gridRecord($id){
                     $this->deleteModelRecord("cocurricular","CoCurricular_grid",$id);
                }
                /**
                * Returns records of CoCurricular.
                * @param string search condition
                * @return CoCurricular[] the model records
                * @soap
                */
                public function getCoCurricular_list($condition=''){
                    return $this->getModel("cocurricular","CoCurricular_list",$condition);
                }
                            /**
                * Returns a record of CoCurricular.
                * @param string search condition
                * @return CoCurricular[] the model records
                * @soap
                */
                public function getCoCurricular_detail($condition=''){
                    return $this->getModelRecord("cocurricular","CoCurricular_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a cocurricularevent.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param CoCurricularEvent model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveCoCurricularEvent($cocurricularevent)
                        {
                                if($cocurricularevent->id > 0) // update
                                {
                                        $cocurricularevent->isNewRecord=false;
                                        if(($oldcocurricularevent =  CoCurricularEvent::model()->findByPk($student->id))!==null)
                                        {
                                                $oldcocurricularevent->attributes=$cocurricularevent->attributes;
                                                return $oldcocurricularevent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $cocurricularevent->isNewRecord=true;
                                        $cocurricularevent->id=null;
                                        return $cocurricularevent->save();
                                }

                          }
                    /**
                * Returns records of CoCurricularEvent.
                * @param string search condition
                * @return CoCurricularEvent[] the model records
                * @soap
                */
                public function getCoCurricularEvent_grid($condition=''){
                    return $this->getModel("cocurricularevent","CoCurricularEvent_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteCoCurricularEvent_gridRecord($id){
                     $this->deleteModelRecord("cocurricularevent","CoCurricularEvent_grid",$id);
                }
                /**
                * Returns records of CoCurricularEvent.
                * @param string search condition
                * @return CoCurricularEvent[] the model records
                * @soap
                */
                public function getCoCurricularEvent_list($condition=''){
                    return $this->getModel("cocurricularevent","CoCurricularEvent_list",$condition);
                }
                            /**
                * Returns a record of CoCurricularEvent.
                * @param string search condition
                * @return CoCurricularEvent[] the model records
                * @soap
                */
                public function getCoCurricularEvent_detail($condition=''){
                    return $this->getModelRecord("cocurricularevent","CoCurricularEvent_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a academicevent.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param AcademicEvent model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveAcademicEvent($academicevent)
                        {
                                if($academicevent->id > 0) // update
                                {
                                        $academicevent->isNewRecord=false;
                                        if(($oldacademicevent =  AcademicEvent::model()->findByPk($student->id))!==null)
                                        {
                                                $oldacademicevent->attributes=$academicevent->attributes;
                                                return $oldacademicevent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $academicevent->isNewRecord=true;
                                        $academicevent->id=null;
                                        return $academicevent->save();
                                }

                          }
                    /**
                * Returns records of AcademicEvent.
                * @param string search condition
                * @return AcademicEvent[] the model records
                * @soap
                */
                public function getAcademicEvent_grid($condition=''){
                    return $this->getModel("academicevent","AcademicEvent_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteAcademicEvent_gridRecord($id){
                     $this->deleteModelRecord("academicevent","AcademicEvent_grid",$id);
                }
                /**
                * Returns records of AcademicEvent.
                * @param string search condition
                * @return AcademicEvent[] the model records
                * @soap
                */
                public function getAcademicEvent_list($condition=''){
                    return $this->getModel("academicevent","AcademicEvent_list",$condition);
                }
                            /**
                * Returns a record of AcademicEvent.
                * @param string search condition
                * @return AcademicEvent[] the model records
                * @soap
                */
                public function getAcademicEvent_detail($condition=''){
                    return $this->getModelRecord("academicevent","AcademicEvent_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a susparent.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param SusParent model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSusParent($susparent)
                        {
                                if($susparent->id > 0) // update
                                {
                                        $susparent->isNewRecord=false;
                                        if(($oldsusparent =  SusParent::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsusparent->attributes=$susparent->attributes;
                                                return $oldsusparent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $susparent->isNewRecord=true;
                                        $susparent->id=null;
                                        return $susparent->save();
                                }

                          }
                    /**
                * Returns records of SusParent.
                * @param string search condition
                * @return SusParent[] the model records
                * @soap
                */
                public function getSusParent_grid($condition=''){
                    return $this->getModel("susparent","SusParent_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteSusParent_gridRecord($id){
                     $this->deleteModelRecord("susparent","SusParent_grid",$id);
                }
                /**
                * Returns records of SusParent.
                * @param string search condition
                * @return SusParent[] the model records
                * @soap
                */
                public function getSusParent_list($condition=''){
                    return $this->getModel("susparent","SusParent_list",$condition);
                }
                            /**
                * Returns a record of SusParent.
                * @param string search condition
                * @return SusParent[] the model records
                * @soap
                */
                public function getSusParent_detail($condition=''){
                    return $this->getModelRecord("susparent","SusParent_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a parentappointment.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param ParentAppointment model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveParentAppointment($parentappointment)
                        {
                                if($parentappointment->id > 0) // update
                                {
                                        $parentappointment->isNewRecord=false;
                                        if(($oldparentappointment =  ParentAppointment::model()->findByPk($student->id))!==null)
                                        {
                                                $oldparentappointment->attributes=$parentappointment->attributes;
                                                return $oldparentappointment->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $parentappointment->isNewRecord=true;
                                        $parentappointment->id=null;
                                        return $parentappointment->save();
                                }

                          }
                    /**
                * Returns records of ParentAppointment.
                * @param string search condition
                * @return ParentAppointment[] the model records
                * @soap
                */
                public function getParentAppointment_grid($condition=''){
                    return $this->getModel("parentappointment","ParentAppointment_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteParentAppointment_gridRecord($id){
                     $this->deleteModelRecord("parentappointment","ParentAppointment_grid",$id);
                }
                /**
                * Returns records of ParentAppointment.
                * @param string search condition
                * @return ParentAppointment[] the model records
                * @soap
                */
                public function getParentAppointment_list($condition=''){
                    return $this->getModel("parentappointment","ParentAppointment_list",$condition);
                }
                            /**
                * Returns a record of ParentAppointment.
                * @param string search condition
                * @return ParentAppointment[] the model records
                * @soap
                */
                public function getParentAppointment_detail($condition=''){
                    return $this->getModelRecord("parentappointment","ParentAppointment_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a appointsession.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param AppointSession model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveAppointSession($appointsession)
                        {
                                if($appointsession->id > 0) // update
                                {
                                        $appointsession->isNewRecord=false;
                                        if(($oldappointsession =  AppointSession::model()->findByPk($student->id))!==null)
                                        {
                                                $oldappointsession->attributes=$appointsession->attributes;
                                                return $oldappointsession->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $appointsession->isNewRecord=true;
                                        $appointsession->id=null;
                                        return $appointsession->save();
                                }

                          }
                    /**
                * Returns records of AppointSession.
                * @param string search condition
                * @return AppointSession[] the model records
                * @soap
                */
                public function getAppointSession_grid($condition=''){
                    return $this->getModel("appointsession","AppointSession_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteAppointSession_gridRecord($id){
                     $this->deleteModelRecord("appointsession","AppointSession_grid",$id);
                }
                /**
                * Returns records of AppointSession.
                * @param string search condition
                * @return AppointSession[] the model records
                * @soap
                */
                public function getAppointSession_list($condition=''){
                    return $this->getModel("appointsession","AppointSession_list",$condition);
                }
                            /**
                * Returns a record of AppointSession.
                * @param string search condition
                * @return AppointSession[] the model records
                * @soap
                */
                public function getAppointSession_detail($condition=''){
                    return $this->getModelRecord("appointsession","AppointSession_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a tblclass.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param TblClass model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveTblClass($tblclass)
                        {
                                if($tblclass->id > 0) // update
                                {
                                        $tblclass->isNewRecord=false;
                                        if(($oldtblclass =  TblClass::model()->findByPk($student->id))!==null)
                                        {
                                                $oldtblclass->attributes=$tblclass->attributes;
                                                return $oldtblclass->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $tblclass->isNewRecord=true;
                                        $tblclass->id=null;
                                        return $tblclass->save();
                                }

                          }
                    /**
                * Returns records of TblClass.
                * @param string search condition
                * @return TblClass[] the model records
                * @soap
                */
                public function getTblClass_grid($condition=''){
                    return $this->getModel("TblClass","TblClass_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteTblClass_gridRecord($id){
                     $this->deleteModelRecord("TblClass","TblClass_grid",$id);
                }
                /**
                * Returns records of TblClass.
                * @param string search condition
                * @return TblClass[] the model records
                * @soap
                */
                public function getTblClass_list($condition=''){
                    return $this->getModel("TblClass","TblClass_list",$condition);
                }
                            /**
                * Returns a record of TblClass.
                * @param string search condition
                * @return TblClass[] the model records
                * @soap
                */
                public function getTblClass_detail($condition=''){
                    return $this->getModelRecord("TblClass","TblClass_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a student.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Student model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveStudent($student)
                        {
                                if($student->id > 0) // update
                                {
                                        $student->isNewRecord=false;
                                        if(($oldstudent =  Student::model()->findByPk($student->id))!==null)
                                        {
                                                $oldstudent->attributes=$student->attributes;
                                                return $oldstudent->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $student->isNewRecord=true;
                                        $student->id=null;
                                        return $student->save();
                                }

                          }
                                    
                        /**
                         * Updates or inserts a susparentstudents.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param SusParentStudents model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSusParentStudents($susparentstudents)
                        {
                                if($susparentstudents->id > 0) // update
                                {
                                        $susparentstudents->isNewRecord=false;
                                        if(($oldsusparentstudents =  SusParentStudents::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsusparentstudents->attributes=$susparentstudents->attributes;
                                                return $oldsusparentstudents->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $susparentstudents->isNewRecord=true;
                                        $susparentstudents->id=null;
                                        return $susparentstudents->save();
                                }

                          }
                    /**
                * Returns records of SusParentStudents.
                * @param string search condition
                * @return SusParentStudents[] the model records
                * @soap
                */
                public function getsusparentstudents_list($condition=''){
                    return $this->getModel("susparentstudents","susparentstudents_list",$condition);
                }
                /**
                * Returns records of SusParentStudents.
                * @param string search condition
                * @return SusParentStudents[] the model records
                * @soap
                */
                public function getsusparentstudents_grid($condition=''){
                    return $this->getModel("susparentstudents","susparentstudents_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deletesusparentstudents_gridRecord($id){
                     $this->deleteModelRecord("susparentstudents","susparentstudents_grid",$id);
                }
                            /**
                * Returns a record of SusParentStudents.
                * @param string search condition
                * @return SusParentStudents[] the model records
                * @soap
                */
                public function getsusparentstudents_detail($condition=''){
                    return $this->getModelRecord("susparentstudents","susparentstudents_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a sususers.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param SusUsers model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveSusUsers($sususers)
                        {
                                if($sususers->id > 0) // update
                                {
                                        $sususers->isNewRecord=false;
                                        if(($oldsususers =  SusUsers::model()->findByPk($student->id))!==null)
                                        {
                                                $oldsususers->attributes=$sususers->attributes;
                                                return $oldsususers->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $sususers->isNewRecord=true;
                                        $sususers->id=null;
                                        return $sususers->save();
                                }

                          }
                    /**
                * Returns records of SusUsers.
                * @param string search condition
                * @return SusUsers[] the model records
                * @soap
                */
                public function getSusUsers_grid($condition=''){
                    return $this->getModel("sususers","SusUsers_grid",$condition);
                }
                /**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function deleteSusUsers_gridRecord($id){
                     $this->deleteModelRecord("sususers","SusUsers_grid",$id);
                }
                /**
                * Returns records of SusUsers.
                * @param string search condition
                * @return SusUsers[] the model records
                * @soap
                */
                public function getSusUsers_list($condition=''){
                    return $this->getModel("sususers","SusUsers_list",$condition);
                }
                            /**
                * Returns a record of SusUsers.
                * @param string search condition
                * @return SusUsers[] the model records
                * @soap
                */
                public function getSusUsers_detail($condition=''){
                    return $this->getModelRecord("sususers","SusUsers_detail",$condition);
                }
                    
    
}