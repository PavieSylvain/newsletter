<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $oUser = new User();
        $form = $this->createForm(RegistrationType::class, $oUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $oUser->setPassword($userPasswordHasherInterface->hashPassword($oUser, $form->get('password')->getData()));
            $oUser->setRoles(["ROLE_USER"]);
            $oUser->setEmail($form->get('email')->getData());
            $oUser->setAuthor($form->get('author')->getData());
            $oUser->setGroup($form->get('group')->getData());
            $oUser->setCivility($form->get('civility')->getData());
            $oUser->setFirstname($form->get('firstname')->getData());
            $oUser->setLastname($form->get('lastname')->getData());
            $oUser->setCellphone($form->get('cellphone')->getData());
            $oUser->setEmailSponsorship($form->get('emailSponsorship')->getData());
            $oUser->setBornAt($form->get('bornAt')->getData());
            $oUser->setRealEstateProjects($form->get('realEstateProjects')->getData());
            $oUser->setBankDetails($form->get('bankDetails')->getData());
            $oUser->setDescription($form->get('description')->getData());
            $oUser->setIsPickable(true);
            $oUser->setIsPickableValidated(true);
            $oUser->setHasNewsletter($form->get('hasNewsletter')->getData());
            $oUser->setSiret($form->get('siret')->getData());
            $oUser->setHasWaiver(true);
            $oUser->setStatus($form->get('status')->getData());
            $oUser->setIsActive(true);
            $oUser->setCreatedAt(new \DateTimeImmutable());
            $oUser->setUpdatedAt(new \DateTimeImmutable());
            $oUser->setHistories($form->get('histories')->getData());
            $oUser->addProfile($form->get('profiles')->getData()[0]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($oUser);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
