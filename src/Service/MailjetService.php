<?php
namespace App\Service;

use \Mailjet\Resources;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/* documentation mailjet -> https://dev.mailjet.com/email/reference/contacts/contact/ */
class MailjetService
{
    public function __construct(ParameterBagInterface $params, EntityManagerInterface $em, HttpClientInterface $client)
    {
        $this->apikey = $params->get('api_key');
        $this->apisecret = $params->get('secret_key');
        $this->mj = new \Mailjet\Client($this->apikey, $this->apisecret, true, ['version' => 'v3']);
        $this->mj2 = new \Mailjet\Client($this->apikey, $this->apisecret, true, ['version' => 'v4']);
        $this->client = $client;
        $this->em = $em;
        $this->mjToken = $params->get('mj_token');
    }   
    /* CRUD liste mailjet */
    public function createListMailjet($listName){
        $body = [
            'Name' => $listName,
        ];
        $response = $this->mj->post(Resources::$Contactslist, ['body' => $body]);
        $response->success() && var_dump($response->getData());
    }

    public function getAllListMailjet(){
        $response = $this->mj->get(Resources::$Contactslist);
        $response->success() && var_dump($response->getData());
    }

    public function getListMailjet($mailjetListId){
        $response = $this->mj->get(Resources::$Contactslist, ['id' => $mailjetListId]);
        $response->success() && var_dump($response->getData());
    }

    public function updateListMailjet($listName, $id){
        $body = [
            'Name' => $listName,
          ];
          $response = $this->mj->put(Resources::$Contactslist, ['id' => $id, 'body' => $body]);
          $response->success() && var_dump($response->getData());
    }

    public function deleteListMailjet($id){
        $response = $this->mj->delete(Resources::$Contactslist, ['id' => $id]);
        $response->success() && var_dump($response->getData());
        
    }

    /* CRUD contact mailjet */
    public function createContactMailjet($oUser){
        $body = [
            'IsExcludedFromCampaigns' => "true",
            'Name' => $oUser->getFirstname() . " " . $oUser->getLastname(),
            'Email' => $oUser->getEmail(),
        ];

        $response = $this->mj->post(Resources::$Contact, ['body' => $body]);
        $response->success();
        $aUserMailjet = $response->getData();

        var_($aUserMailjet[0]["ID"]);
        $mailjetId = $aUserMailjet[0]["ID"];
        $oUser->setMailjetId($mailjetId);

        $this->em ->persist($oUser);
        $this->em ->flush();
    }

    public function getAllContactMailjet(){
        $response = $this->mj->get(Resources::$Contact);
        return $response->getData();
    }

    public function getContactMailjetById($id){
        $response = $this->mj->get(Resources::$Contact, ['id' => $id]);
        $response->success() && var_dump($response->getData());
    }

    public function updateContactMailjet($oUser){
        $body = [
            'Name' => $oUser->getFirstname() . " " . $oUser->getLastname(),
            'Email' => $oUser->getEmail(),
          ];
          $response = $this->mj->put(Resources::$Contact, ['id' => $oUser->getMailjetId(), 'body' => $body]);
          $response->success() && var_dump($response->getData());
    }

    public function deleteContactMailjet($id){
        $response = $this->client->request(
            'DELETE',
            'https://api.mailjet.com/v4/contacts/' . $id,
            ['auth_bearer' => $this->mjToken,]
        );

        $statusCode = $response->getStatusCode();
        //$statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
    }

    /* gestion liste de contact */
    public function AddContactInList($oUser, $mailjetListId){
        $body = [
            'IsUnsubscribed' => "true",
            'ContactID' => $oUser->getMailjetId(),
            'ContactAlt' => $oUser->getEmail(),
            'ListID' => $mailjetListId,
            //'ListAlt' => "abcdef123"
          ];
          $response = $this->mj->post(Resources::$Listrecipient, ['body' => $body]);
          $response->success() && var_dump($response->getData());
    }

    public function addMultipleContactInList($oUser, $aListIdAction){
        /* $aListIdAction -> [['Action' => 'remove', 'ListId' => 12356] ]  
            Action -> addforce || addnoforce || remove || unsub */ 

        $body = [
            'Contacts' => [
              [
                'ContactID' => $oUser->getMailjetId(),
                'ContactAlt' => $oUser->getEmail(),
                'Email' => $oUser->getEmail(),
                'IsExcludedFromCampaigns' => "false",
                //'Name' => "Passenger 1",
               // 'Properties' => "object"
              ]
            ],
            'ContactsLists' => $aListIdAction
          ];
          $response = $this->mj->post(Resources::$ContactManagemanycontacts, ['body' => $body]);
          $response->success() && var_dump($response->getData());
    }

    public function addMultipleContactInMailjetList($oUsers, $listMailjetId){
        $aContacts = [];

        foreach($oUsers as $oUser){
            $aContacts[] = [
                'Email' => $oUser->getEmail(),
                'IsExcludedFromCampaigns' => "false",
                'Name' => $oUser->getFirstName() . " " . $oUser->getLastName(),
                'Properties' => "object"
            ];
        }

        $body = [
            'Action' => "addnoforce",
            'Contacts' => $aContacts,
          ];
          $response = $this->mj->post(Resources::$ContactslistManagemanycontacts, ['id' => $listMailjetId, 'body' => $body]);
          $response->success() && var_dump($response->getData());
    }
}