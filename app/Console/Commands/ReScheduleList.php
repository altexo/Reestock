<?php

namespace App\Console\Commands;
use DateTime;
use DB;
use App\List_products;
use Illuminate\Console\Command;

class ReScheduleList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lists:reSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-Schedule Not confirmed Lists.';

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
        $n = $current_date->format('Y-m-d');
        $lists = List_products::where(DB::RAW('date(reestock_date)'), $n)->where('active', 1)->get();
        foreach ($lists as $item ) 
        {
            $interval = $item->reestock_concurrence;
            $uid = $item->users_id;

            if ($interval == 0) {
                $reScheduleItem = List_products::find($item->id);
                $reScheduleItem->delete();
                
            }else{
                $reScheduleItem = List_products::find($item->id);
                //guardar fecha en variable y aplicar date modify.
                $dateToM = $reScheduleItem->reestock_date;
                $newDate = date('Y-m-d h:m:s', strtotime($dateToM. ' + '.$interval.' days'));
                if (date('N', strtotime($newDate)) == '7') {
                        $newDate = date('Y-m-d h:m:s', strtotime($newDate. ' + 1 days'));
                } 
                $reScheduleItem->reestock_date = $newDate;
                $reScheduleItem->save();
               

                $this->info($newDate); 
            }
            

        }
          //$this->info($n); 
    }
}
