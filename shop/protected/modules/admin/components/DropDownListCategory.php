<?php

Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * JLTreeDropDownList class file.
 *
 * @author huytbt
 * @date 2011-08-01
 * @version 1.0
 */
class DropDownListCategory extends CJuiInputWidget
{
	public $data;
	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run()
	{
		list($name,$id)=$this->resolveNameID();

		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		else
			$this->htmlOptions['name']=$name;
		
		$items = Category::model()->findAll('parent_id = 0');
		$html =  CHtml::openTag('select', $this->htmlOptions);
		if (count($items)) {
			foreach($items as $item) {
				$htmlOptions = array();
				$htmlOptions['value'] = $item->category_id;
                if(isset($this->model->parent_id))
                {
                	if ($this->model->parent_id == $item->category_id)
				       $htmlOptions['selected'] = 'selected';
                }
                else
                {
                    if ($this->model->category_id == $item->category_id)
				       $htmlOptions['selected'] = 'selected';
                }
			
				$html .= CHtml::openTag('option', $htmlOptions);
				$html .= CHtml::encode($item->title);
				$html .= CHtml::closeTag('option');
				$html .= $this->renderDropDownList($item->category_id,1);
			}
			
		} else {
			$html .= CHtml::tag('option', array('value'=>'root'), 'Root', false);
		}
		$html .= CHtml::closeTag('select');
		echo $html;
	}
	
	public function renderDropDownList($category_id,$level)
	{
		$items = Category::model()->findAll('parent_id = ' . $category_id);
		$html = '';
		foreach($items as $item) {
			$htmlOptions = array();
			$htmlOptions['value'] = $item->category_id;
		    if(isset($this->model->parent_id))
            {
            	if ($this->model->parent_id == $item->category_id)
			       $htmlOptions['selected'] = 'selected';
            }
            else
            {
                if ($this->model->category_id == $item->category_id)
			       $htmlOptions['selected'] = 'selected';
            }
			$html .= CHtml::openTag('option', $htmlOptions);
			$spaces = '';
			for ($i=1; $i< $level; $i++) $spaces .= '&nbsp;&nbsp;';
			$html .= $spaces . CHtml::encode('|--' . $item->title);
			$html .= CHtml::closeTag('option');
			$html .= $this->renderDropDownList($item->category_id,$level + 1);
		}
		return $html;
	}
}