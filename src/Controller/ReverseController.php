<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\ReverseType;
use App\Entity\Task;

class ReverseController extends AbstractController {
    
    public function reverseForm() {
        $task = new Task();

        $form = $this->createForm(ReverseType::class, $task);

        return $this->render('stringreverse.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}