<?php 
namespace App\helper;

class Twilio 
{

    private $sid = "AC0e865bb87ec523f0c1b63e8fb6557db0";
    private $token = "8f4095a60156ed650a9d3144ea046710";
 
    private $client;
 
    public function __construct() {
        $this->client = new \Twilio\Rest\Client($this->sid, $this->token);
    }
 
    public function sendWhatsAppSMS($from, $to, $body) {
 
        $message = $this->client->messages
        ->create("whatsapp:" . $to, // to
                           array(
                               "from" => "whatsapp:" . $from,
                               "body" => $body
                           )
                  );
        return $message;          
    }
}