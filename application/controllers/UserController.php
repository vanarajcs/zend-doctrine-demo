<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author assistanz
 */
class UserController extends Zend_Controller_Action {
    
    function indexAction() {
        $this->view->name = $this->getParam("name");
        $name = array();
        
        $name["name"] = "VAnaraj";
        $name["email"] = "VAnarajasdsa";
        
        $this->view->nameArray = $name;
        
    }
    
    function addAction() {}
    
}
