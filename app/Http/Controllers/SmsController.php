<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function send_sms(Request $request)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('fe88612e', 'CAAMPjuUovQME5my');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => $request->mobile,
            'from' => '8801535524791',
            'text' => 'Hello from Vonage SMS API'
        ]);

        // $basic  = new \Vonage\Client\Credentials\Basic('fe88612e', 'CAAMPjuUovQME5my');
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS('8801535524791', 'active', 'A text message sent using the Nexmo SMS API')
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
    }
}
