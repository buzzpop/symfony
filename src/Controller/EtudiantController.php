<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    private $flash;
    public  function __construct(FlashyNotifier $flashy)
    {
        $this->flash= $flashy;
    }

    /**
     * @Route("/etudiant.index", name="create-etudiant")
     */
    public function index(EntityManagerInterface $em, Request $request)
    {
        $rp= $em->getRepository(Etudiant::class);
        $nbrField=count($rp->findAll()) ;

        $et= new Etudiant();
        $form = $this->createForm(EtudiantType::class, $et);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($et);
            $em->flush();
            $this->flash->success('Enregistrement réussi!');
            return $this->redirectToRoute('list-etudiants');
        }
        return $this->render('etudiant/index.html.twig', [
            'current_name' => 'etudiant',
            'forms'=>$form->createView(),
            'nbrField'=>$nbrField
        ]);
    }


    /**
     * @Route("/etudiant.lister", name="list-etudiants")
     */
    public function lister(EtudiantRepository $em, Request $request, PaginatorInterface $paginator)
    {
       $etudiants= $em->findAll();
        $paination= $paginator->paginate(
           $etudiants,// les donnees à paginer
           $request->query->getInt('page',1), // Numero de page en cours, 1 pardefaut
            5
       );

        return $this->render('etudiant/list.html.twig', [
            'current_name' => 'etudiantlister',
            'etudiants'=>$paination,
        ]);
    }

    /**
     * @Route("/etudiant.update/{id}", name="update-etudiant")
     */
    public function update(Etudiant $et, EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(EtudiantType::class, $et);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($et);
            $em->flush();
            $this->flash->success('Modification réussie!');
            return $this->redirectToRoute('list-etudiants');
        }
        return $this->render('etudiant/update.html.twig', [
            'current_name' => 'etudiant',
            'formmodif'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/delete-etudiant/{id}", name="delete_etudiant")
     */
    public function deleteEtudiant(int $id,EntityManagerInterface $em)
    {

        $etudiant = $em->getRepository(Etudiant::class)->find($id);
        $em->remove($etudiant);
        $em->flush();
        $this->flash->success('Suppresion réussie!');
        return $this->redirectToRoute('list-etudiants');

    }
}
