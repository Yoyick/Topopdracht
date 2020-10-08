<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\RotatorType;
use App\Entity\Task;

class RotatorController extends AbstractController {
    
    public function request(Request $request): Response {
        // $grid_array = [];
        $position = $request->query->get('position');
    
        if (empty($position)){
            $position = 1;
            $rotation = 0;
        }

        $form = $this->createForm(RotatorType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $size = $task["size"];

            if ($form->get('degrees0')->isClicked()) {
                $position = 1;
                $rotation = 0;
            }
            if ($form->get('degrees90')->isClicked()) {
                $position = 2;
                $rotation = 90;
            }
            if ($form->get('degrees180')->isClicked()) {
                $position = 3;
                $rotation = 180;
            }
            if ($form->get('degrees270')->isClicked()) {
                $position = 4;
                $rotation = 270;
            }            
        }

        if (empty($size)){
            $size = 4;
        }

        $k=1; //0
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {     
                if ($position == 1){
                    $grid_array[$i][$j] = '<div>' . $k . '</div>';
                } else {
                    $grid_array[$i][$j] = $k;
                };
                $k++;
            };
        }; 

        $k=1;
        if ($position == 2){ //90
            $pos2_array = [];
            for ($i = 1; $i <= $size; $i++) {
                for ($j = $size; $j >= 1; $j--) {
                    $pos2_array[$i][$j] = '<div>' . $grid_array[$j][$i] . '</div>';
                };
                $k++;
            };            
            $grid_array = $pos2_array;
        };

        if ($position == 3){ //180
            $pos3_array = [];
            for ($i = $size; $i >= 1; $i--) {
                for ($j = $size; $j >= 1; $j--) {
                    $pos3_array[$i][$j] = '<div>' . $grid_array[$i][$j] . '</div>';
                };
            };
            $grid_array = $pos3_array;
        };

        $k=1; 
        if ($position == 4){ //270
            $pos4_array = [];
            for ($i = $size; $i >= 1; $i--) {
                for ($j = 1; $j <= $size; $j++) {
                    $pos4_array[$i][$j] = '<div>' . $grid_array[$j][$i] . '</div>';
                };
                $k++;
            };
            $grid_array = $pos4_array;
        };

        if (empty($grid_array)){
            $grid_array = [[1,2],[3,4]];
        }

        $k=1;
        foreach($grid_array as $row){
            // array_unshift($row, "<div>");
            array_push($row, "<br />");
            $grid_string[$k] = implode("", $row);
            $k++;
        };

        $grid_string = implode("", $grid_string);

        return $this->render('rotator.html.twig', [
            'form' => $form->createView(),
            'grid' => $grid_string,
            'rotation' => $rotation,
        ]);
    }
    
}