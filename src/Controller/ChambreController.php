<?php

namespace App\Controller;
use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;

use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    private $flash;
    public  function __construct(FlashyNotifier $flashy)
    {
        $this->flash= $flashy;
    }

    /**
     * @Route("/chambre.index", name="create-chambre")
     */
    public function index(EntityManagerInterface $em, Request $request)
    {


        $rp= $em->getRepository(Chambre::class);
      $nbrField=count($rp->findAll()) ;

        $chambre= new Chambre();
        $form = $this->createForm(ChambreType::class, $chambre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $em->persist($chambre);
            $em->flush();
            $this->flash->success('Enregistrement réussi!');
            return $this->redirectToRoute('list-chambres');
        }
        return $this->render('chambre/index.html.twig', [
            'current_name' => 'chambre',
         'forms'=>$form->createView(),
            'nbrField'=>$nbrField,
        ]);

    }


    /**
     * @Route("/chambre.lister", name="list-chambres")
     */
    public function lister(ChambreRepository $em, Request $request, PaginatorInterface $paginator)
    {
        $rooms= $em->findAll();
        $paination= $paginator->paginate(
            $rooms,// les donnees à paginer
            $request->query->getInt('page',1), // Numero de page en cours, 1 pardefaut
            5
        );

        return $this->render('chambre/list.html.twig', [
            'current_name' => 'chambrelister',
            'rooms'=>$paination,
        ]);
    }

    /**
     * @Route("/chambre.update/{id}", name="update-room")
     */
    public function update(Chambre $room, EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(ChambreType::class, $room);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($room);
            $em->flush();
            $this->flash->info('Modification réussi!');
            return $this->redirectToRoute('list-chambres');
        }
        return $this->render('chambre/index.html.twig', [
            'current_name' => 'chambrelister',
            'forms'=>$form->createView(),
        ]);
    }
    /**
     * @Route("/delete-chambre/{id}", name="delete_room")
     */
    public function deleteChambre(int $id,EntityManagerInterface $em)
    {

        $chambre = $em->getRepository(Chambre::class)->find($id);
        $em->remove($chambre);
        $em->flush();
        $this->flash->success('Suppression effectuée!');
        return $this->redirectToRoute('list-chambres');


    }
}
