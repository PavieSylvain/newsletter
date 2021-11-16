<?php
namespace App\Service;

use \Mailjet\Resources;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MailerService
{
    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function sendMail($oNewsletter, $oUsers)
    {
        $apikey = $this->params->get('api_key');
        $apisecret = $this->params->get('secret_key');

        $mj = new \Mailjet\Client($apikey, $apisecret, true,['version' => 'v3.1']);

        $SENDER_NAME = $this->params->get('sender_name');
        $SENDER_EMAIL = $this->params->get('sender_email');

        foreach($oUsers as $oUser){
            $userEmail = $oUser->getEmail();
            $userName = $oUser->getLastName() . " " . $oUser->getFirstName();

            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => $SENDER_EMAIL,
                            'Name' => $SENDER_NAME,
                        ],
                        'To' => [
                            [
                                'Email' => $userEmail,
                                'Name' => $userName,
                            ]
                        ],
                        'Subject' => $oNewsletter->getTitle(),
                        'TextPart' => $oNewsletter->getTitle() . "\n \n" . $oNewsletter->getDescription(),
                        'HTMLPart' => "<h3>Bonjour " . $userName . "</h3>" .
                                      "<h3>" . $oNewsletter->getTitle() . "</h3><br/>" .
                                      "<p>" . $oNewsletter->getDescription() . "</p>",
                    ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
        }     
    }
}