<?php

namespace PPE\GeParcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GeParcBundle:Default:index.html.twig');
    }
}
