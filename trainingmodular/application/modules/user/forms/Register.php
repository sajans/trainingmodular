<?php

class User_Form_Register extends Zend_Form {

    public function init() {

       
        $this->setMethod('post');
        $fName = new Zend_Form_Element_Text('first_name');
        $fName->setLabel("firstname")
                ->removeDecorator('HtmlTag')
                ->removeDecorator('DtDWrapper')
                ->removeDecorator('label')
                ->setAttrib('id', 'sajan')
                ->setRequired(true);
        $lName = new Zend_Form_Element_Text('last_name');
        $lName->setLabel("lastname")
                ->setRequired(true);
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel("email")
                ->setRequired(true);
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel("Submit");
        #add Groups
        /*
        $this->addElements(array($fName, $lName));
        $this->addDisplayGroups(array('first_name', 'last_name'), 'firstElement', array('legend' => 'test1'));
        $this->addElements(array($email, $submit));
        $this->addDisplayGroups(array('email', 'submit'), 'secondElement', array('legend' => 'testtwo'));
        */
        #add Groups 
        $this->addElements(array($fName, $lName, $email, $submit));
    }

}
