<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TopGeschenkController extends AbstractController {
    public function printNumberList() {
        $topgeschenk_array = [];
        for ($i = 1; $i <= 100; $i++) {
            array_push($topgeschenk_array, '<p>');
            $divide_by_thee = is_int($i / 3);
            $divide_by_five = is_int($i / 5);
            
            $divide_by_thee ? array_push($topgeschenk_array, "Top") : null ;
            $divide_by_five ? array_push($topgeschenk_array, "geschenken") : null ;
            
            array_push($topgeschenk_array, ' ' . $i);
            array_push($topgeschenk_array, '</p>');
        }
        $topgeschenker = implode("", $topgeschenk_array);

        return $this->render('topgeschenker.html.twig', [
            'list' => $topgeschenker,
        ]);
    }
}