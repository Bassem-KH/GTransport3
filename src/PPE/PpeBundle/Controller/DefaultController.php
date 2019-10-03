<?php

namespace PPE\PpeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PpeBundle:Default:index.html.twig');
    }
}
