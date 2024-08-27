<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send welcomin email for user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('basmala@mail.com')->send(new SendEmail);
    }
}
