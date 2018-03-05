<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use DB;
use Mail;
use App\Mail\scheduleNotify;
use App\List_products;
use App\Order_lists;
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
        //fechas de notificacion y bloqueo(Confirmada)
        $current_date =  new \DateTime();
        $reestock_lock_date = $current_date->modify('+2 days')->format('Y-m-d');
        $current_date =  new \DateTime();
        $reestock_notify = $current_date->modify('+3 days')->format('Y-m-d');
        
        //Bloqueo de listas donde tengan activo el autoreestock y esten en la fecha de bloqueo
        $lock_lists = List_products::where(DB::raw('date(reestock_date)'), $reestock_lock_date)
            ->where('auto_reestock', 1)
            ->update(['active' => 4]);

            $out_of_time_lists = List_products::where(DB::raw('date(reestock_date)'), $reestock_lock_date)
            ->where('active',1)
            ->update(['active' => 5]);

        //Obtener orden de compra diaria de las listas confirmadas
        $list = List_products::select(DB::raw('DISTINCT list_products.products_id, SUM(list_products.quantity) as cantidad'))
            ->groupBy('list_products.products_id')
            ->where(DB::raw('date(reestock_date)'), $reestock_lock_date)
            ->where('active', 4)
            ->get();
       
         //Se guardan en la tabla de orden de compra (Order Lists)   
        foreach ($list as $l) {
                $order_list = new Order_lists;
                $order_list->products_id = $l->products_id;
                $order_list->quantity = $l->cantidad;
                $order_list->save();
           }
          

        //Se obtienen los usuarios que deben ser notificados
        $reestock_users = List_products::select(DB::raw('DISTINCT list_products.users_id, users.email'))
            ->join('users', 'list_products.users_id', '=', 'users.id')
            ->where(DB::raw('date(reestock_date)'), $reestock_notify)
            ->get();

        //Se envian las notificaciones    
        foreach ($reestock_users as $r_u){
            $m = new scheduleNotify;
            Mail::to($r_u->email)->send($m);
        }
       
        

    }
}
