<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use DB;
use Mail;
use App\Mail\scheduleNotify;
use App\List_products;
class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

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
        $current_date =  new \DateTime();
        $reestock_lock_date = $current_date->modify('+2 days')->format('Y-m-d');
        $current_date =  new \DateTime();
        $reestock_notify = $current_date->modify('+3 days')->format('Y-m-d');
        
        $lock_lists = List_products::where(DB::raw('date(reestock_date)'), $reestock_lock_date)
          ->update(['active' => 5]);
        
        $reestock_users = List_products::select(DB::raw('DISTINCT list_products.users_id, users.email'))
            ->join('users', 'list_products.users_id', '=', 'users.id')
            ->where(DB::raw('date(reestock_date)'), $reestock_notify)
            ->get();

        foreach ($reestock_users as $r_u){
            $m = new scheduleNotify;
            Mail::to($r_u->email)->send($m);
        }
       
        

    }
}
