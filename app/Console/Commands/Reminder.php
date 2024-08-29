<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder as Rem;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Reminder extends Command
{

    protected $signature = 'auto:presReminder';

    protected $description = 'Prescriptions reminder';

    public function handle()
    {
        $rems = Rem::where([['at', '=', date('H:i')], ['from', '<=', date('Y-m-d')]])->get();
        foreach ($rems as $rem) {
            $user = User::findOrFail($rem->user_id);
            Log::channel('Reminder')->info(($rem->category) . " reminder mail sent successful to " . ($user->name) . " of mail " . ($user->email));
            $this->phonesms(($user->contact),"Hello ".($user->name).", Please remember your ".($rem->title)." Regards, HealthLabsDotCom");
            Mail::send(
                'message',
                ['name' => $user->name, 'rem' => $rem],
                function ($message) use ($rem, $user) {
                    $message->to($user->email, $user->name)->subject($rem->title);
                }
            );
        }
    }
    
    function phonesms($phone, $message){
        $API_KEY = "3d5bb20a395bb6d2d08452ac4b2146e1";
        $API_TOKEN = "cb0873ee-3bf4-46c8-94c5-74279f9a794f";
        $data = json_encode([
            "apikey" => $API_KEY,
            "partnerID"=>"8510",
            "message" => $message,
            "shortcode" => "TextSMS",
            "mobile" => $phone
        ]);
        Http::withBody($data, 'application/json')->withHeaders(['Access-Token'=>$API_TOKEN])->post('https://sms.textsms.co.ke/api/services/sendsms/');
        
    }
}