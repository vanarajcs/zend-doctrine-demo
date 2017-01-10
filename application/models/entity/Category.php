<?php

/**
 * Entity for Category
 *
 * @author fazrul
 */

/**
 * @Entity
 * @Table(name="category") 
 * @HasLifecycleCallbacks  
 */
class Category {
   
    /**
     * This is the primary 
     * 
     * @Id 
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     * 
     * @var integer 
     */
    protected $id;
    
   
    /**
     * @Column(type="string")
     * 
     * @var string 
     */
    protected $name;
    
    /**
     * @Column(type="string", name="search_text", nullable=true)
     * 
     * @var string 
     */
    protected $searchText;
    
    /**
     * @Column(type="boolean" , name="category_hidden", nullable=true)     
     *
     * @var boolean
     */
    protected $hiddenCategory;
    
    
    /**
     * Gets Id
     * 
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets Id
     * 
     * @param integer $id 
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Gets Name
     * 
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Sets Name
     * 
     * @param string $name 
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Gets Search Text
     * 
     * @return string 
     */
    public function getSearchText() {
        return $this->searchText;
    }

    /**
     * Sets Search Text
     * 
     * @param type $searchText 
     */
    public function setSearchText($searchText) {
        $this->searchText = $searchText;
    }
    
    /**
     * Gets Hidden Category 
     * 
     * @return integer 
     */
    public function getHiddenCategory() {
        return $this->hiddenCategory;
    }

    /**
     * Sets Id
     * 
     * @param integer $id 
     */
    public function setHiddenCategory($hiddenCategory) {
        $this->hiddenCategory = $hiddenCategory;
    } 
    
}