<?php
/**
 * Created by PhpStorm.
 * User: НУРДАС
 * Date: 22.03.14
 * Time: 15:22
 */

namespace User\UserBundle\Services;

class Munc{

    private $container;
    public function  __construct($container)
    {
        $this->container = $container ;
    }

    public function GetRequestData ()
    {
        return $this->container->get('request')->getRequestUri();
    }
}