<?php
 
class Kolibrii_Banner_Block_Adminhtml_Banner_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('banner_form', array('legend'=>Mage::helper('banner')->__('Item information')));
       
        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('banner')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
        ));
		
		$fieldset->addField('link', 'text', array(
            'label'     => Mage::helper('banner')->__('Link'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'link',
        ));
		
		$fieldset->addField('images', 'text', array(
            'label'     => Mage::helper('banner')->__('Images'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'images',
        ));
       
        if ( Mage::getSingleton('adminhtml/session')->getBannerData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getBannerData());
            Mage::getSingleton('adminhtml/session')->setBannerData(null);
        } elseif ( Mage::registry('banner_data') ) {
            $form->setValues(Mage::registry('banner_data')->getData());
        }
        return parent::_prepareForm();
    }
}