<?php

namespace SlotMachine\SlotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SlotMachineSlotBundle:Default:index.html.twig');
    }
}
