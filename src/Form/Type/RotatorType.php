<?php
// src/Form/Type/RotatorType.php
namespace App\Form\Type;

use App\Entity\Task;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class RotatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('degrees0', SubmitType::class, [
                'attr' => ['class' => '0degrees']
            ])
            ->add('degrees90', SubmitType::class, [
                'attr' => ['class' => 'degrees90']
            ])
            ->add('degrees180', SubmitType::class, [
                'attr' => ['class' => 'degrees180']
            ])
            ->add('degrees270', SubmitType::class, [
                'attr' => ['class' => 'degrees270']
            ])                        
            ->add('size', NumberType::class, [
                'required' => false,
                'attr' => [
                    'min' => 1,
                    'max' => 10
                ]
            ])
        ;
    }
}   