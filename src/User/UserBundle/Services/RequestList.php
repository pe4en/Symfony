<?php
/**
 * Created by PhpStorm.
 * User: НУРДАС
 * Date: 22.03.14
 * Time: 14:19
 */

namespace User\UserBundle\Services;




use Symfony\Component\HttpFoundation\Request;

class RequestList{
    /**
     * @var Request
     */
    private $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    public function getRequestData ()
    {
        return $this->request->getRequestUri();

    }

} 