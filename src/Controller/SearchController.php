<?php

namespace App\Controller;

use App\Form\SearchEtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request)
    {
        $etudiantSearch= new Etudiant();
        $formSerah= $this->createForm(SearchEtudiantType::class, $etudiantSearch);
        $form=$formSerah->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()){
            $searchData= $form->getData();
            dd($searchData);
            $searResult= $em->search($searchData);
        }
        return $this->render('etudiant/list.html.twig', [

            'etudiantSearch'=>$formSerah->createView()
        ]);
    }
}
