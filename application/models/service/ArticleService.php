<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleService
 *
 * @author assistanz
 */
class ArticleService {
    
    public function insert(ArticleEntity $articleEntity) {
       $articleDao = new AtricleDao();
       $values = array(
            "headline" => $articleEntity->getHeadline() . "ddd",
           "first_name" => $articleEntity->getHeadline()
        );
       $articleDao->save($values);
    }
    
}
