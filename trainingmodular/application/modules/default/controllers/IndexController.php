<?php

class Default_IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body

        $form = new Default_Form_Register();

        $this->view->register = $form;
    }

    public function registerAction() {

        print_r($this->_request->getPost()); // action body
        die;
    }

}
