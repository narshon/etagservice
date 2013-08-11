<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CDbMetaTestCase
 *
 * @author nngao
 */
class CDbMetaTestCase extends CDbTestCase {
         /**
	 * @return CDbFixtureManager the database fixture manager
	 */
	public function getFixtureManager()
	{
		return Yii::app()->getComponent('metafixture');
	}
}

?>
