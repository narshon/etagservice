<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomCJuiDraggable
 *
 * @author nngao
 */
class CustomCJuiDraggable extends CJuiDraggable  {
    /**
	 * Renders the open tag of the draggable element.
	 * This method also registers the necessary javascript code.
	 */
	public function init(){
		parent::init();
		
		$id=$this->getId();
		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		
		$options=empty($this->options) ? '' : CJavaScript::encode($this->options);
		Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}').draggable($options);");

		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
                return CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
	}

	/**
	 * Renders the close tag of the draggable element.
	 */
	public function run(){
		echo CHtml::closeTag($this->tagName);
                return CHtml::closeTag($this->tagName);
	}
}

?>
