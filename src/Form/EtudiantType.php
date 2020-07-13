<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Departement;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule' ,TextType::class, [
                'attr' => ['readonly' => true],
            ])
            ->add('prenom')
            ->add('nom')
            ->add('dateNaiss',DateType::class, [
                'widget' => 'choice',
            ])
            ->add('email')
            ->add('tel')
            ->add('type', ChoiceType::class,[
                'placeholder'=>'Choisir le type de d\'etudiant',
                'choices'=>[
                    'Boursier Loge'=>'Boursier Loge',
                    'Boursier Non Loge'=>'Boursier Non Loge',
                    'Non Boursier'=>'Non Boursier',
                ],
            ])
            ->add('adresse')
            ->add('departement', EntityType::class,[
                'placeholder'=>'Choisir le type de département',
                'class'=> Departement::class,
                'choice_label' => 'nom_Departement',
            ])
            ->add('chambre', EntityType::class,[
                'placeholder'=>'Choisir le numero de la chambre',
                'class'=> Chambre::class,
                'choice_label' => 'num_chambre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
