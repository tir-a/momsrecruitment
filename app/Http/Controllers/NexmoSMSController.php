<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\NexmoSMSController;


class NexmoSMSController extends Controller
{
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        try {
  
            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
  
            $receiverNumber = "60196873273";
            $message = "This message is from Moms Postnatal Care. Your job application status has been updated. Login to our system to view it.";
  
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);
  
            dd('SMS Sent Successfully.');
              
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}

