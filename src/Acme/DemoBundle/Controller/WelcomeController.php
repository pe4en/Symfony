<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
    }
    public function nameAction($name)
    {
        return $this->render('AcmeDemoBundle:Welcome:name.html.twig',array('name'=>$name));
    }
}
