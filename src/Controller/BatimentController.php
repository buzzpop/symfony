<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Batiment;
use App\Form\BatimentType;

class BatimentController extends AbstractController
{
    /**
     * @Route("/batiment.index", name="create-batiment")
     */
    public function index(EntityManagerInterface $em , Request $request)
    {
        $batiment= new Batiment();
        $form = $this->createForm(BatimentType::class, $batiment);
        $form->handleRequest($request);
        if($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()){

            $em->persist($batiment);
            $em->flush();
            return $this->render('home/index.html.twig');
        }
        return $this->render('batiment/index.html.twig', [
            'current_name' => 'batiment',
            'form'=>$form->createView(),
        ]);
    }



}
