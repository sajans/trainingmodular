<?php

  /*
   * Plugin to set the appropriate layout as per the module
   * http://stackoverflow.com/questions/4732778/how-to-setup-multiple-layouts-in-zend-framework-eg-public-logged-in-various-co
   */

  class App_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout
  {

	  public function preDispatch(Zend_Controller_Request_Abstract $request)
	  {
		  $this->_setCssAndScriptPath($request);

		  $layout = $this->getLayout();
		  $filename = $layout->getLayoutPath() . '' . $request->getModuleName() . '.' . $layout->getViewSuffix();

		  if (file_exists($filename)) {
			  $this->getLayout()->setLayout($request->getModuleName());
		  } else {
			  $this->getLayout()->setLayout('layout');
		  }
	  }

	  private function _setCssAndScriptPath($request)
	  {
		  $view = Zend_Layout::getMvcInstance()->getView();
		  $moduleName = $request->getModuleName();

		  switch ($moduleName) {
			  case 'collection':

				  $view->headScript()->appendFile('/js/jquery.hashchange.min.js', 'text/javascript');
				  $view->headScript()->appendFile('/js/jquery.easytabs.min.js', 'text/javascript');
				  $view->headLink()->appendStylesheet('/css/tabs.css', 'all');
	


				  break;
			  default:
				  break;
		  }
	  }

  }
