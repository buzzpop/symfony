<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Form\DepartementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DepartementController extends AbstractController
{
    /**
     * @Route("/departement.index", name="create-departement")
     */
    public function index(EntityManagerInterface $em, Request $request)
    {
        $dept= new Departement();
        $form= $this->createForm(DepartementType::class, $dept);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($dept);
            $em->flush();
            return $this->render('home/index.html.twig');
        }
        return $this->render('departement/index.html.twig', [
            'current_name' => 'departement',
            'form'=>$form->createView(),
        ]);
    }


}
