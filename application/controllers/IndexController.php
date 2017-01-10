<?php

class IndexController extends Zend_Controller_Action
{

    public $name;
    
    public function init()
    {
    }

    public function indexAction()
    {
       
       echo "dsds";
       
    }
    
    public function aboutAction()
    {
        echo phpinfo();
    }
    
    public function preDispatch() {
        $this->view->name = "Vanaraj";
    }


}

