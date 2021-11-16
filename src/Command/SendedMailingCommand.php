<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\MailerPlanning;
use App\Repository\NewsLetterRepository;
use App\Repository\MailerPlanningRepository;
use App\Repository\UserRepository;
use App\Service\MailerService;
use DateInterval;

use Doctrine\ORM\EntityManagerInterface;

/** 
 * Pour server Unix, utilisation de Cron
 * Pour ajouter une tache planifiée, dans la console "crontab -e " et insérer une ligne " * * * * * cd /project-path ; php bin/console nameOfCommand " 
 */
class SendedMailingCommand extends Command
{
    protected static $defaultName = 'app:sended-mailing';
    protected static $defaultDescription = 'Program publication of newsletter with a specific dateTime';
    private EntityManagerInterface $entityManager;
    private NewsLetterRepository $newsLetterRepository;
    private MailerPlanningRepository $mailerPlanningRepository;
    private MailerService $mailerService;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(NewsLetterRepository $newsLetterRepository, EntityManagerInterface $entityManager, MailerPlanningRepository $mailerPlanningRepository, 
                                MailerService $mailerService, UserRepository $userRepository)
    {
        $this->newsLetterRepository = $newsLetterRepository;
        $this->mailerPlanningRepository = $mailerPlanningRepository;
        $this->mailerService = $mailerService;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        parent::__construct();
    } 

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $oMailerPlannings = $this->mailerPlanningRepository->findByDateTime(new \DateTimeImmutable);

        foreach($oMailerPlannings as $oPlanning){
            $oNewsletter = $oPlanning->getNewsletter();
            $lUserId = $oNewsletter->getSendedContacts()["noPublished"];
            $lUser = $this->userRepository->findById($lUserId);

            try {
                $this->mailerService->sendMail($oNewsletter, $lUser);
                $io->success('Les newsletters ont été envoyées');
                $this->entityManager->remove($oPlanning);

                $aSendedContacts['published'] = array_merge($aSendedContacts['noPublished'], $aSendedContacts['published']) ;
                $aSendedContacts['noPublished'] = [];
                $oNewsletter->setSendedContacts($aSendedContacts);
                $oNewsletter->setPublishedAt(new \DateTimeImmutable);
            } catch (\Throwable $th) {
                $io->error('L\'envoie des newsletters à échoué');
                $oPlanning->setPlannedAt($oPlanning->getPlannedAt()->add(new DateInterval('PT1H')));
            }

            try {
                $this->entityManager->flush();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return Command::SUCCESS;
    }
}
