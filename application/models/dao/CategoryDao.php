<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author assistanz
 */
class CategoryDao extends \Doctrine\ORM\EntityRepository {
    
    /**
     * Class name of the entity to create EntityRepository
     * 
     * @var string 
     */
    private $_className = "Category";
    
    /**
     * Default constructor for the CategoryDao 
     */
    public function __construct() {
        $registry = Zend_Registry::getInstance();
        $em = $registry->entitymanager;
        $classMetaData = $em->getClassMetadata($this->_className);

        parent::__construct($em, $classMetaData);
    }
    
     /**
     * Add new category
     * 
     * @param Category $category 
     */    
    public function add(Category $category) {
        $this->_em->persist($category);
        $this->_em->flush();
    }
}
