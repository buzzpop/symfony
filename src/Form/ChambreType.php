<?php

namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Chambre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numChambre',TextType::class, [
        'attr' => ['readonly' => true],
    ])
            ->add('type', ChoiceType::class,[
                'placeholder'=>'Choisir le type de chambre',
                'choices'=>[
                    'Individuel'=>'Individuel',
                    'A deux'=>'A deux'
                ],
            ])
            ->add('batiment', EntityType::class,[
                'class'=> 'App\Entity\Batiment',
                'choice_label' => 'id',

            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
