<?php

namespace App\Http\Controllers;
use App\List_products;
use DB;
use Illuminate\Http\Request;

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
 			$query[] = List_products::select(DB::raw('DISTINCT users_id, users.name, day(reestock_date) as dia, DAYNAME(reestock_date) as nom_dia, MONTHNAME(reestock_date) as mes, year(reestock_date)'))
 			->join('users', 'users.id', '=', 'list_products.users_id')
 			->orderBy('reestock_date', 'desc')->where('users_id', $u->users_id)->where('active', 4)->first();
 			if ($query) {
 				$listsArray[] = $query;
 			}
 			

 		}
 		
		$lists = collect($listsArray);
		return ['lists' => $lists, 'users'=> $users];
 		return view('admins.show-all-lists', ['lists' => $lists, 'users' => $users]);
 	}

 	public function orderList(){
 		// $order = List_products::select(DB::raw('DISTINCT list_products.products_id, SUM(list_products.quantity) as cantidad, suppliers.name, MIN(supplier_products.sale_price) as min_sale'))
 		// ->join('supplier_products', 'list_products.products_id', '=', 'supplier_products.products_id')
 		// ->join('suppliers', 'supplier_products.supplier_id', '=', 'suppliers.id')
 		// ->where('list_products.active', 4)
 		// ->groupBy('list_products.products_id')
 		// ->get();
 		$order = List_products::select(DB::raw('DISTINCT list_products.products_id, SUM(list_products.quantity) as cantidad'))
 		//->join('supplier_products', 'list_products.products_id', '=', 'supplier_products.products_id')
 		//->join('suppliers', 'supplier_products.supplier_id', '=', 'suppliers.id')
 		->where('list_products.active', 4)
 		->groupBy('list_products.products_id')->get();
 		$osup = array();
 		foreach ($order as $o) {
 			$osup[$o->products_id]['cantidad'] = $o->cantidad;
 			$osup[$o->products_id]['suppliers'] = DB::table('supplier_products')
 			->join('products', 'supplier_products.products_id', '=', 'products.id')
 			->join('suppliers', 'supplier_products.supplier_id', '=', 'suppliers.id')
 			->orderBy('sale_price', 'asc')
 			->where('products_id', $o->products_id)
 			->get();
 		}
 		// $osuo = DB::select( DB::raw('select * from list_products lp (select * from supplier_products sp ) where lp.active = 4') );
 		//$order_supp = DB::table('supplier_products')->where($order)->get();
 		//->get();
 		return $osup;
 		return view('admins.show-order-list', ['order' => $osup]);
 	}
}
