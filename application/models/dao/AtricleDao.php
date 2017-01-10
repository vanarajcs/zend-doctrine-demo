<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtricleDao
 *
 * @author assistanz
 */
class AtricleDao extends Zend_Db_Table_Abstract {
    
    protected $_name = 'article';
    
    public function save(Array $values) {
        
        
        $id = $this->insert($values);
        echo $id;
        exit;
    }
    
}
