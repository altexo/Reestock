<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use DB;
use Mail;
use App\Mail\scheduleNotify;
class cronTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      
      
            $m = new scheduleNotify;
            Mail::to('alejandro.riosyb@gmail.com')->send($m);
        
       
        

    }
}
