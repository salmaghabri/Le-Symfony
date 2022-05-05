<?php

namespace App\Controller;
use App\Entity\PFE;
use App\Form\PFEType;
use App\Repository\PFERepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PfeController extends AbstractController
{
    #[Route('/pfe', name: 'app_pfe')]
    public function index(PFERepository $repos): Response
    {
        $pfes = $repos->findAll();
       


        return $this->render('pfe/index.html.twig', [
            'pfes' => $pfes]);
      
    }

    #[Route('/pfe/add', name: 'app_pfe')]
    public function add(ManagerRegistry $doctrine, Request $request): Response
    {   $entityManager = $doctrine->getManager();

        $pfe = new PFE();
        $form = $this->createForm(PFEType::class, $pfe);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager->persist($pfe);
            $entityManager->flush();
            return $this->render('pfe.info.html.twig',['pfe' => $pfe]);
        } else {
            return $this->render('pfe/form.html.twig', [
                'form' => $form->createView()
            ]);
        }

    
    }




}
