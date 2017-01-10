<?php
/** @Entity */
class Article
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $headline;

    public function __construct()
    {
    }

}
