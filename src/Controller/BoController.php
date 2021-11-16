<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\GestionAuthType;
use App\Repository\UserRepository;
use App\Service\MailjetService;

class BoController extends AbstractController
{
    /**
     * @Route("/bo/admin/gestionAuth", name="gestion_auth")
     */
    public function gestionAuth(Request $request, UserRepository $userRepository): Response
    {
        // gestion des roles des utilisaturs
        $lUser = $userRepository->findAll();
        $form_roles = $this->createForm(GestionAuthType::class, $lUser);
        $form_roles->handleRequest($request);

        if ($form_roles->isSubmitted() && $form_roles->isValid()) {
            $lUser = $form_roles->get('user')->getData();
            $role = [$form_roles->get('role')->getData()];
            $lUser->setRoles($role);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lUser);
            $entityManager->flush();
        }

        return $this->render('bo/gestion_auth.html.twig', [
            'form_roles' => $form_roles->createView(),
        ]);
    }
    /**
     * @Route("/bo", name="bo_accueil")
     */
    public function accueil(MailjetService $mailjetSerice, UserRepository $userRepository, Request $request): Response
    {
        return $this->render('bo/accueil.html.twig', []);
    }
}
