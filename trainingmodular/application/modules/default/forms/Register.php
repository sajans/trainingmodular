<?php

Class Default_Form_Register extends Zend_Form {

    public function init() {
        $this->setAction('default/index/register');
        $this->setMethod('post');
        $fName = new Zend_Form_Element_Text('first_name');
        $fName->setLabel("firstname")
                ->setRequired(true);
        $lName = new Zend_Form_Element_Text('last_name');
        $lName->setLabel("lastname")
                ->setRequired(true);
        $sub = new Zend_Form_Element_Submit('submit');
        $sub->setLabel("Submit");
                

        $this->addElements(array($fName, $lName,$sub));
    }

}

?>