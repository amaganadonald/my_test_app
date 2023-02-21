<?php

namespace App\Controller;

use App\Entity\HoraireSettings;
use App\Form\HoraireType;
use App\Repository\HoraireSettingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoraireSettingsController extends AbstractController
{
    /**
     * function default findAll
     */
    #[Route('/horaire/settings', name: 'app_horaire_settings', methods: ['GET'])]
    public function index(HoraireSettingsRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $horaire = $paginator->paginate(
            $repository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        //$horaire = $repository->findAll();
        //dd($horaire);
        return $this->render('pages/horaire_settings/index.html.twig', [
          "horaires" => $horaire
        ]);
    }

    #[Route('/horaire/settings/new', name: 'horaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response 
    {
        $horaireSettings = new HoraireSettings();
        $form = $this->createForm(HoraireType::class, $horaireSettings);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $horaireSettgs = $form->getData();
            $manager->persist($horaireSettgs);
            $manager->flush();
            $this->addFlash('success', 'Horaire crée avec success!!');
            return $this->redirectToRoute('app_horaire_settings');
        } else {
            $this->addFlash('warning', 'Horaire envoyé contient des erreurs');
        }
        return $this->render('pages/horaire_settings/new.html.twig',
           [
            'form' => $form->createView()
           ]
        );
    }
 
    #[Route('/horaire/settings/edit/{id}', name: 'horaire_edit', methods: ['GET', 'POST'])]
    public function edit(HoraireSettings $horaireSettings, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(HoraireType::class, $horaireSettings);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $horaireSettgs = $form->getData();
            $manager->persist($horaireSettgs);
            $manager->flush();
            $this->addFlash('success', 'Horaire modifié avec success!!');
            return $this->redirectToRoute('app_horaire_settings');
        } else {
            $this->addFlash('warning', 'Horaire envoyé contient des erreurs');
        }
        return $this->render('pages/horaire_settings/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/horaire/settings/delete/{id}', name: 'horaire_delete', methods: ['GET'])]
    public function delete(HoraireSettings $horaireSettings, EntityManagerInterface $manager) : Response
    {
        if (!$horaireSettings) {
            $this->addFlash('success', 'Horaire with this id not exist!!');
            return $this->redirectToRoute('app_horaire_settings');
        }
        $manager->remove($horaireSettings);
        $manager->flush();
        $this->addFlash('success', 'Horaire supprimée avec success!!');
        return $this->redirectToRoute('app_horaire_settings');
    }
}
