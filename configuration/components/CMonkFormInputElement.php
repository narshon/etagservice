<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CMonkFormInputElement
 *
 * @author nngao
 */
class CMonkFormInputElement extends CFormInputElement {
         /**
	 * Renders the label for this input.
	 * The default implementation returns the result of {@link CHtml activeLabelEx}.
	 * @return string the rendering result
	 */
	public function renderLabel()
	{
		$options = array(
			'label'=>$this->getLabel(),
			'required'=>$this->getRequired()
		);

         if(!empty($this->attributes['id']))
        {
            $options['for'] = $this->attributes['id'];
            $options['id'] = $this->attributes['id']."_label";
        }
                
		return CHtml::activeLabel($this->getParent()->getModel(), $this->name, $options);
	}
}

?>
