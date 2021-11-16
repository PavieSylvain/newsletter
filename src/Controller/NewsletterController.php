<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\GestionAuthType;
use App\Form\NewsLetterType;
use App\Form\NewsletterListType;
use App\Repository\UserRepository;
use App\Repository\NewsLetterRepository;
use App\Repository\MailerPlanningRepository;
use App\Entity\NewsLetter;
use App\Entity\MailerPlanning;
use App\Service\MailerService;
use App\Service\BaseHelper;
use App\Command\SendedMailingCommand;
use DateInterval;


class NewsletterController extends AbstractController
{
    /**
     * @Route("/bo/societaire/newsLetter", name="bo_newsLetter")
     */
    public function newsLetter(Request $request, MailerService $mailerService): Response
    {
        // Création des newsLetters
        $form_news = $this->createForm(NewsLetterType::class, null);
        $form_news->handleRequest($request);

        if ($form_news->isSubmitted() && $form_news->isValid()) {
            $bCheckForm = true;
            $lUser = $form_news->get("send_list")->getData();

            if($request->request->get('save_and_send') ){
                $bCheckForm = $this->checkForm($form_news->get('publishedAt')->getData() ,$lUser);
            }

            if($bCheckForm){

                /* liste des contacts sélectionnés */
                $aSendedContacts = ["published" => [], "noPublished" => [] ];
                foreach($lUser as $oUser){
                    array_push($aSendedContacts["noPublished"], $oUser->getId());
                }

                $oUser = $this->get('security.token_storage')->getToken()->getUser();

                $oNewsletter = new NewsLetter();
                $oNewsletter->setTitle($form_news->get('title')->getData());
                $oNewsletter->setDescription($form_news->get('description')->getData());
                $oNewsletter->setCreatedAt(new \DateTimeImmutable());
                $oNewsletter->setUpdatedAt(new \DateTimeImmutable());
                $oNewsletter->setIsActive(true);
                $oNewsletter->setAuthor($oUser);
                $oNewsletter->setSendedContacts($aSendedContacts);
            
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($oNewsletter);
                try {
                    $entityManager->flush();
                    $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La newsletter a bien été sauvegardée.");
                } catch (\Throwable $th) {
                    //throw $th;
                    $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de la sauvegarde de la newsletter !");
                }
                
                if($request->request->get('save_and_send') ){
                    if($form_news->get('planning_newsletter')->getData()){
                        $this->newsletterPlanning($oNewsletter, $form_news);
                    } else {
                        $this->newsletterPublished($oNewsletter, $lUser, $aSendedContacts, $mailerService);
                    }
                }
                return $this->redirectToRoute('bo_newsLetter_update', array('id' => $oNewsletter->getId()));
            }
        }

        return $this->render('newsletter/newsletter.html.twig', [
            'form_news' => $form_news->createView(),
        ]);
    }

    /**
     * @Route("/bo/societaire/newsLetterList", name="bo_newsLetter_list")
     */
    public function newsLetterList(Request $request, MailerService $mailerService, NewsletterRepository $newsletterRepository): Response
    {
        $lNewsletter = $newsletterRepository->findIfNotDeleted();

        return $this->render('newsletter/newsletter_list.html.twig', [
            'o_newsletters' => $lNewsletter,
        ]);
    }


    /**
     * @Route("/bo/societaire/newsLetterList/delete/{id}", name="bo_newsLetter_delete")
     */
    public function newsLetterDelete(Request $request, MailerService $mailerService, NewsletterRepository $newsletterRepository, int $id): Response
    {
        $oNewsletter = $newsletterRepository->find($id);
        $oNewsletter->setIsActive(0);
        $oNewsletter->setDeletedAt(new \DateTimeImmutable());
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($oNewsletter);

        try {
            $entityManager->flush();
            $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La newsletter a bien été supprimée.");
        } catch (\Throwable $th) {
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de la suppression de la newsletter !");
        }

        return $this->redirectToRoute('bo_newsLetter_list');
    }

    /**
     * @Route("/bo/societaire/newsLetterUpdate/{id}", name="bo_newsLetter_update")
     */
    public function newsLetterUpdate(Request $request, MailerService $mailerService, int $id, NewsletterRepository $newsletterRepository, MailerPlanningRepository $mailerPlanningRepository): Response
    {
        $oNewsletter = $newsletterRepository->find($id);
        $aSendedContacts = $oNewsletter->getSendedContacts();

        $form_news = $this->createForm(NewsLetterType::class, $oNewsletter);
        $form_news->handleRequest($request);

        if ($form_news->isSubmitted() && $form_news->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $bCheckForm = true;
            $lUser = $form_news->get("send_list")->getData();

            if($request->request->get('save_and_send') ){
                $bCheckForm = $this->checkForm($form_news->get('publishedAt')->getData() ,$lUser);
            }

            if($bCheckForm){
                foreach($lUser as $oUser){
                    array_push($aSendedContacts["noPublished"], $oUser->getId());
                }
                $aSendedContacts['published'] = array_unique($aSendedContacts['published']);
                $aSendedContacts['noPublished'] = array_unique($aSendedContacts['noPublished']);
                $user = $this->get('security.token_storage')->getToken()->getUser();

                $oNewsletter->setTitle($form_news->get('title')->getData());
                $oNewsletter->setDescription($form_news->get('description')->getData());
                $oNewsletter->setUpdatedAt(new \DateTimeImmutable());
                $oNewsletter->setIsActive(true);
                $oNewsletter->setSendedContacts($aSendedContacts);

                if(!$form_news->get('planning_newsletter')->getData()){
                    $oMailerPlanning = $oNewsletter->getMailerPlanning();
                    try {
                        $entityManager->remove($oMailerPlanning);
                        $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La planification de la publication à été supprimer");
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            
                $entityManager->persist($oNewsletter);
                try {
                    $entityManager->flush();
                    $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La newsletter a bien été mise à jour.");
                } catch (\Throwable $th) {
                    //throw $th;
                    $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de la sauvegarde de la newsletter !");
                }

                $lUser = $form_news->get("send_list")->getData();

                if($request->request->get('duplicate')){
                    $oNewsletterNew = $this->duplicate($oNewsletter, $user);
                    if($oNewsletterNew->getId()){
                        $oNewsletter = $oNewsletterNew;
                    }
                }
                if($request->request->get('save_and_send') ){
                    if($form_news->get('planning_newsletter')->getData()){
                        $this->newsletterPlanning($oNewsletter, $form_news);
                    } else {
                        $this->newsletterPublished($oNewsletter, $lUser, $aSendedContacts, $mailerService);
                    }
                }
                return $this->redirectToRoute('bo_newsLetter_update', array('id' => $oNewsletter->getId()));
            }
        }
        return $this->render('newsletter/newsletter_update.html.twig', [
            "newsletter" => $oNewsletter,
            "form_news" => $form_news->createView(),
            "sended_contacts" => $aSendedContacts,
        ]);
    }

    /**
     * @Route("/bo/societaire/newsLetterSender", name="bo_newsLetter_sender")
     */
    public function newsLetterSender(SendedMailingCommand $sendedMailingCommand)
    {
        $sendedMailingCommand->execute();
    }

    private function newsletterPublished($oNewsletter, $lUser, $aSendedContacts, $mailerService)
    {
        $bCheckTry = true;
        try {
            $mailerService->sendMail($oNewsletter, $lUser);
            $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La newsletter a bien été publiée.");
        } catch (\Throwable $th) {
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de la publication de la newsletter !");
            $bCheckTry = false;
        }
    
        if($bCheckTry){
            try {
                $aSendedContacts['published'] = array_merge($aSendedContacts['noPublished'], $aSendedContacts['published']) ;
                $aSendedContacts['noPublished'] = [];
                $oNewsletter->setSendedContacts($aSendedContacts);
                $oNewsletter->setPublishedAt(new \DateTimeImmutable);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($oNewsletter);
                $entityManager->flush();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    private function newsletterPlanning($oNewsletter, $form_news)
    {
        $entityManager = $this->getDoctrine()->getManager();

        if(!$oNewsletter->getMailerPlanning()){
            $oMailerPlanning = new MailerPlanning;
            $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "Le planning de la publication Ajoutée");

        } else {
            $oMailerPlanning = $oNewsletter->getMailerPlanning();
        }
        $oMailerPlanning->setNewsletter($oNewsletter);
        $oMailerPlanning->setPlannedAt($form_news->get('publishedAt')->getData());

        $entityManager->persist($oMailerPlanning);

        try {
            $entityManager->flush();
            $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "Le planning de la publication est bien enregistrée");
        } catch (\Throwable $th) {
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de l'enregistrement du planning de la newsletter !");
        }
    }

    public function duplicate($oNewsletterOld, $oUser){
        $aSendedContacts = ["published" => [], "noPublished" => [] ];

        $oNewsletter = new NewsLetter();
        $oNewsletter->setTitle($oNewsletterOld->getTitle());
        $oNewsletter->setDescription($oNewsletterOld->getDescription());
        $oNewsletter->setCreatedAt(new \DateTimeImmutable());
        $oNewsletter->setUpdatedAt(new \DateTimeImmutable());
        $oNewsletter->setIsActive(true);
        $oNewsletter->setAuthor($oUser);
        $oNewsletter->setSendedContacts($aSendedContacts);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($oNewsletter);
        try {
            $entityManager->flush();
            $this->addFlash(BaseHelper::NOTIFICATION_BO_SUCCESS, "La newsletter a bien été dupliquée.");
        } catch (\Throwable $th) {
            //throw $th;
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Echec de la duplication de la newsletter !");
        }
        return $oNewsletter;
    }

    public function checkForm($dNewsPlanning, $lUser)
    {
        $bCheckForm = true;
        $dInit = new \DateTimeImmutable;
        $dInit = $dInit->add(new DateInterval('PT1H'));

        if($dNewsPlanning && ($dNewsPlanning <=> $dInit) !== 1){
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Il faut une date suppérieur d'au moin 1 heure à la date actuel");
            $bCheckForm = false;
        }

        if(count($lUser) == 0){
            $this->addFlash(BaseHelper::NOTIFICATION_BO_ERROR, "Il faut sélectionner au moin un contact");
            $bCheckForm = false;
        }
        return $bCheckForm;
    }
}
