<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$title='Please provide your login credential';
$elements=array(
       'school_name'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'school_address'=>array(
            'type'=>'textarea',
            'maxlength'=>32,
        ),
        'school_desc'=>array(
            'type'=>'text',
        ));
$buttons=array('login'=>array(
            'type'=>'submit',
            'label'=>'Loginx',
        ));

$formArray= array('title'=>$title,'elements'=>$elements,'buttons'=>$buttons);

return $formArray;
?>
