<?php

class User_IndexController extends Zend_Controller_Action {

    public function init() {
      $response = $this->getResponse();
      $response->insert('rightsidebar',$this->view->render('rightside.phtml'));
    }

    public function indexAction() {

        $userModel = new User_Model_Register();
        //$userData = $userModel->getAll();
        $userData = $userModel->userAndRole();//Fetch data using join
        $this->view->users = $userData;
    }

    public function registerAction() {
        #find if db connection is working well
        /*
          $dB= Zend_Db_Table::getDefaultAdapter();
          var_dump($dB); exit;
         */

        $form = new User_Form_Register();
        $form->setAction('register');
        $this->view->register = $form;
        $this->view->setAction = 'register';
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $userModel = new User_Model_Register();
                $userModel->add($formData);
                $this->_helper->FlashMessenger->addMessage(array('msg' => "User succesffully registered."));
                $this->_helper->redirector('index');
            }
        }
    }

    public function updateAction() {
        $id = $this->getParam('id');
        $registerModel = new User_Model_Register();
        $fetchedData = $registerModel->getOne($id);
        $form = new User_Form_Register();
        $form->setAction('');
        $form->populate($fetchedData);
        $this->view->register = $form;
        $this->view->setAction = 'register';
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $registerModel->add($formData, $id);
                $this->_helper->FlashMessenger->addMessage(array('msg' => "User succesffully edited."));
                $this->_helper->redirector('index');
            }
        }
    }

    public function deleteAction() {
        $id = $this->getParam('id');
        $registerModel = new User_Model_Register();
        $registerModel->deleteUser($id);
        $this->_helper->FlashMessenger->addMessage(array('msg' => "User succesffully deleted."));
        $this->_helper->redirector('index');
    }

}

?>