<?php
namespace App\Http\Controllers;

use App\helper\Twilio;
use App\Models\Message;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class whatscontroller extends Controller
{
    public function whatsappindex(){
        $message = Message::all();
        return view('welcome', compact('message'));
    }
    
    public function messageSendToMobile(Request $request){
        Message::create($request->all());
        $from = '+14155238886'; 
        $to   = '+201278552735';
        $body = $request->message;
        $twilio = new Twilio;
        try {
              $twilio->sendWhatsAppSMS($from, $to, $body);
              return back()->with(['success' => 'Message Done']);
        } catch (\Throwable $th) {
              return dd($th);
        }
    }

}