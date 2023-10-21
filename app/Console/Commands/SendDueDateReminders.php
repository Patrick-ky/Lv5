<?php

namespace App\Console\Commands;

use App\Models\ClientInfo;
use Illuminate\Console\Command;
use Twilio\Rest\Client; // Import the Twilio client

class SendDueDateReminders extends Command
{
    protected $signature = 'send:due-date-reminders';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Your logic here to query the client_info table for records 15 days before the due date
        $records = ClientInfo::whereDate('due_date', '=', now()->addDays(15)->toDateString())->get();

        // Initialize Twilio client
     
    $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));


        foreach ($records as $record) {
            // Compose the SMS message
            $message = "Hello, {$record->client->firstname}. Your due date is approaching on {$record->due_date}. please pay your bill {$record->ownerMonthly}";

            // Send SMS
            $twilio->messages->create(
                $record->client->clients_number,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),

                    'body' => $message,
                ]
            );
        }

        $this->info('Due date reminders sent successfully.');
    }
}