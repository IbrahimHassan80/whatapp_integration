<?php
namespace App\Http\Controllers;

use App\helper\Twilio;
use App\Models\Message;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use DB;
class whatscontroller extends Controller
{
    public function whatsappindex(){
        $message = Message::all();
        return view('welcome', compact('message'));
    }
    
    public function messageSendToMobile(Request $request){
        try {
        DB::beginTransaction();
        Message::create($request->all());
        
        $from = '+141552388866'; 
        $to   = '+201278552735';
        $body = $request->message;
        $twilio = new Twilio;
      
              $twilio->sendWhatsAppSMS($from, $to, $body);
              DB::commit();
              return back()->with(['success' => 'Message Done']);
        } catch (\Throwable $th) {
             DB::rollback();
             return dd($th);
        }
    }

}