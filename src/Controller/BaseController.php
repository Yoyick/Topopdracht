<?php
// src/Controller/BaseController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
 {
     /**
      * @Route("/hello/{name}")
      */
     public function index()
     {
        return $this->render('base.html.twig', [
        ]);
     }
}