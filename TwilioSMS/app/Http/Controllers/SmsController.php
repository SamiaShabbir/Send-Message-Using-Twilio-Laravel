<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class SmsController extends Controller
{
    public function Sms(Request $req){
         try {
            
            $account_id= env('TWILIO_SID');
            $account_token=env('TWILIO_TOKEN');
            $number=env('TWILIO_FROM');

            $client= new Client($account_id,$account_token);
            $client->messages->create('+92'.$req->phonenumber,[
                'from'=>$number,
                'body'=>$req->message
            ]);
            return response()->json(['code'=>200,'message'=>'successfully sent']);

            } catch (\exception $e) 
            {
            return $e->getMessage();
            }
    }
}