<?php

namespace App\Http\Controllers;
use App\List_products;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ListAdminController extends Controller
{
 	public function __construct(){
 		 $this->middleware('auth:admin');
 	}

 	public function index(){
 		 DB::statement("SET lc_time_names = 'es_MX'");
 		$users = List_products::select(DB::raw('DISTINCT users_id, users.name'))->join('users', 'users.id', '=', 'list_products.users_id')->get();

 		$listsArray = array();
 		foreach ($users as $u) 
 		{
 			$query = List_products::select(DB::raw('DISTINCT users_id, users.name, date(reestock_date) as rdate, day(reestock_date) as dia, DAYNAME(reestock_date) as nom_dia, MONTHNAME(reestock_date) as mes, year(reestock_date)'))
 			->join('users', 'users.id', '=', 'list_products.users_id')
 			->orderBy('reestock_date', 'desc')->where('users_id', $u->users_id)//->where('active', 4)
            ->get();
 			if ($query) {
 				$listsArray[] = $query;
 			}
 			

 		}
 		
		$collection = collect($listsArray);
		$lists = $collection->collapse();
		$lists->all();
		$lists = $lists->sortByDesc('reestock_date');
		$lists->values()->all();

		//return ['lists' => $lists, 'users'=> $users];
 		return view('admins.show-all-lists', ['lists' => $lists, 'users' => $users, 'status' => 0]);
 	}

 	public function orderList(){
       $current_date =  new \DateTime();

        $n = $current_date->format('Y-m-d');
        $results = DB::select('select * from order_extended where date(created_at) = :d', ['d' => $n]);
        return $results;
        return view('admins.show-order-list', ['list' => $results]);
 	}

 	  public function show($date, $id)
    {	
    	$user_list = List_products::join('products', 'list_products.products_id', '=', 'products.id')
    	->where(DB::raw('date(reestock_date)'), $date)
    	->where('list_products.users_id', $id)
    	->where('list_products.active', 4)
    	->get();
    	return view('admins.get-list',['user_list' => $user_list]);
        
    }

    //Filtros de listas
    public function confirmed(){
                 DB::statement("SET lc_time_names = 'es_MX'");
        $users = List_products::select(DB::raw('DISTINCT users_id, users.name'))->join('users', 'users.id', '=', 'list_products.users_id')->get();

        $listsArray = array();
        foreach ($users as $u) 
        {
            $query = List_products::select(DB::raw('DISTINCT users_id, users.name, date(reestock_date) as rdate, day(reestock_date) as dia, DAYNAME(reestock_date) as nom_dia, MONTHNAME(reestock_date) as mes, year(reestock_date)'))
            ->join('users', 'users.id', '=', 'list_products.users_id')
            ->orderBy('reestock_date', 'desc')->where('users_id', $u->users_id)
            ->where('active', 4)
            ->get();
            if ($query) {
                $listsArray[] = $query;
            }
            

        }
        
        $collection = collect($listsArray);
        $lists = $collection->collapse();
        $lists->all();
        $lists = $lists->sortByDesc('reestock_date');
        $lists->values()->all();

        //return ['lists' => $lists, 'users'=> $users];
        return view('admins.show-all-lists', ['lists' => $lists, 'users' => $users, 'status' => 4]);
    }
}
