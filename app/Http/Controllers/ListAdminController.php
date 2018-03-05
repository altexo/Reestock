<?php

namespace App\Http\Controllers;
use App\List_products;
use App\Products;
use App\Reestock_records;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ListAdminController extends Controller
{
   // private $date; 
 	public function __construct(){
 		 $this->middleware('auth:admin');
         
 	}

 	public function index(){
 		 DB::statement("SET lc_time_names = 'es_MX'");
 		$users = List_products::select(DB::raw('DISTINCT users_id, users.name'))->join('users', 'users.id', '=', 'list_products.users_id')->get();

 		$listsArray = array();
 		foreach ($users as $u) 
 		{
 			$query = List_products::select(DB::raw('DISTINCT users_id, users.name, date(reestock_date) as rdate, day(reestock_date) as dia, DAYNAME(reestock_date) as nom_dia, MONTHNAME(reestock_date) as mes, year(reestock_date), active'))
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

    public function orderByDate($date){
        $orders = $this->queryOrderLists($date);
        return $orders;
    }
 	public function orderList(){
       $current_date =  new \DateTime();

        $n = $current_date->modify('+2 day')->format('Y-m-d');
        $orders = $this->queryOrderLists($n);
      
       return 'Proximamente..';
        return view('admins.show-order-list', ['list' => $orders]);
 	}

 	  public function show($date, $id, $status)
    {	if ($status == 0) {
            $user_list = List_products::join('products', 'list_products.products_id', '=', 'products.id')
            ->where(DB::raw('date(reestock_date)'), $date)
            ->where('list_products.users_id', $id)
           // ->where('list_products.active', $status)
            ->get();
         }else{
        	$user_list = List_products::join('products', 'list_products.products_id', '=', 'products.id')
            ->select('list_products.*', 'list_products.id as l_id', 'products.*')
        	->where(DB::raw('date(reestock_date)'), $date)
        	->where('list_products.users_id', $id)
        	->where('list_products.active', $status)
        	->get();
        }
        //return $user_list;
    	return view('admins.get-list', ['user_list' => $user_list,'status' => $status]);
        
    }

    //Filtros de listas
    public function confirmed(){
                 DB::statement("SET lc_time_names = 'es_MX'");
        $users = List_products::select(DB::raw('DISTINCT users_id, users.name'))->join('users', 'users.id', '=', 'list_products.users_id')->get();

        $listsArray = array();
        foreach ($users as $u) 
        {
            $query = List_products::select(DB::raw('DISTINCT users_id, users.name, date(reestock_date) as rdate, day(reestock_date) as dia, DAYNAME(reestock_date) as nom_dia, MONTHNAME(reestock_date) as mes, year(reestock_date), active'))
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

       // return ['lists' => $lists, 'users'=> $users];
        return view('admins.show-all-lists', ['lists' => $lists, 'users' => $users, 'status' => 4]);
    }
    public function deliveredDone(Request $request){
      
        $dateTime = new \DateTime();
        $date = $dateTime->format('y-m-d');
        
        $listIDs = $request->listID; 
        try {
               foreach ($listIDs as $id) {
                    $list_prod = List_products::find($id);
                    $concurrence = $list_prod->reestock_concurrence;
                    $uid = $list_prod->users_id;
                    $p_id = $list_prod->products_id;
                    $quantity = $list_prod->quantity;
                    $status = 6;   

                    if ($concurrence == 0) {
                        $this->saveRecord($uid, $p_id, $status, $date, $quantity, $concurrence);
                        $list_prod->delete();

                    }else{
                       
                        $r_date = new DateTime($list_prod->reestock_date);
                        $new_r_date = $r_date->modify('+'.$concurrence.'day');
                        $list_prod->reestock_date = $new_r_date;
                        $list_prod->active = 1;
                        $list_prod->save();
                       
                        $this->saveRecord($uid, $p_id, $status, $date, $quantity,  $concurrence);
                    }
                   
                 }
        } catch (Exception $e) {
            return back()->with('err', 'Ocurrio un problema, vuelvelo a intentar. Si el problema persiste pongase en contacto con soporte.');
        }
        return redirect()->route('Listas / Confirmadas')->with('success', 'La lista fue completada correctamente.');   
    }

    private function queryOrderLists($date){
          $orders = DB::select('SELECT products_id, 
            sum(quantity),
            product_name,
            brand,
            Walmart,
            Sams,
            Ley,
            Costco,
            Soriana, 
            `Fruteria Olivas`,
            `Fruteria Los Compadres`, 
            `Fruteria El canario`, 
            `La mera`,  
            `Farmacia Moderna`,
            TRAUB,
            Chata,
            `La Cuarta`,
            Vinoteca,
            `Todo Organiko`
            from order_extended where date(created_at) = :d group by products_id, 
            Walmart,Sams,Ley,Costco,Soriana,  
            `Fruteria Olivas`,`Fruteria Los Compadres`, 
            `Fruteria El canario`, 
            `La mera`,  
            `Farmacia Moderna`,
            TRAUB,
            Chata,
            `La Cuarta`,
            Vinoteca,
            `Todo Organiko`',['d' => $date]);

          return $orders;
    }

    private function saveRecord($uid, $product_id, $status, $date, $quantity, $concurrence){
        $product_name = Products::find($product_id);//Parametro
            $record = new Reestock_records;
            $record->user_id = $uid; //Parametro
            $record->department_id = $product_name->department_id;
            $record->brand = $product_name->brand;
            $record->product_name = $product_name->product_name;
            $record->quantity = $quantity;
            $record->reestocked_date = $date; //Parametro
            $record->concurrence = $concurrence; //Parametro
            $record->status = $status; //Parametro
            $record->save();
    }
}
