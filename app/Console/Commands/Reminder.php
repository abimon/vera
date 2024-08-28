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
        
        $rems=Rem::where([['at','=',date('H:i')],['from','<=',date('Y-m-d')]])->get();
        foreach($rems as $rem){
            $user=User::findOrFail($rem->user_id);
            Log::channel('Reminder')->info(($rem->category)." reminder mail sent successful to ".($user->name)." of mail ".($user->email));
            // $this->sms('0'.($user->contact),json_decode("Hello ".($user->name).", Please remember your ".($rem->title)." Regards, HealthLabsDotCom"));
            Mail::send(
                'message',
                ['name'=>$user->name,'rem'=>$rem],
                function ($message) use ($rem,$user) {
                    $message->to($user->email, $user->name)->subject($rem->title);
                }
            );
        }
        
        
    }
    function sms($phone,$message)
    {
        
        $data = json_encode(array(
            "api_key" => env('UMS_API_KEY'),
            "email" => env('UMS_EMAIL'),
            "Sender_Id" => env('UMS_SENDER_ID'),
            "message" => $message,
            "phone" => $phone,
        ));
        Http::withBody($data,'application/json')->withHeaders(['Content-Type : application/json'])->post('https://api.umeskiasoftwares.com/api/v1/sms');
    }
}
