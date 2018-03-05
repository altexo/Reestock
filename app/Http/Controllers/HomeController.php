<?php

namespace App\Http\Controllers;
use App\List_products;
use App\Products;
use App\Reestock_records;
use App\supplier_products;
use DB;
use DateTime;
use App\Mail\scheduleNotify;
use Auth;

use Illuminate\Http\Request;


class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        DB::statement("SET lc_time_names = 'es_MX'");
       $uid = \Auth::user()->id;
        $lists = List_products::select(DB::raw('DISTINCT DATE(reestock_date) as fecha, MONTHNAME(reestock_date) AS mes, DAY(reestock_date) as dia, DAYNAME(reestock_date) as nombre_dia, active'))
        ->where('users_id', $uid)
        ->where('active', '!=', 3)
        ->orderBy('reestock_date', 'asc')
        ->get();
        
       $list_prod = array();
       $list_totals = array();
            foreach($lists as $reestock_date)
            {   

                   $list_prod['listas'][] = List_products::join('products', 'products.id', '=', 'list_products.products_id')
                    ->join('supplier_products', 'products.id', '=', 'supplier_products.products_id')
                    ->select('list_products.*','products.product_name', 'products.product_img', 'products.unity', \DB::raw("MIN(supplier_products.sale_price) AS sale_price "), \DB::raw("TRUNCATE(MIN(supplier_products.sale_price) * list_products.quantity,2) as amount"))
                    ->groupBy('list_products.id')
                    ->where(DB::raw('MONTHNAME(reestock_date) = ? and day(reestock_date) = ? and users_id'), [$reestock_date->mes, $reestock_date->dia, $uid])->get();

                    

                
            }
            

            // $user = 'alejandro.riosyb@gmail.com';
            //     \Mail::to($user)->send(new scheduleNotify);

            //return ['lists' => $list_prod];
       return view('clientes.home', ['list_prod' => $list_prod, 'lists' => $lists]); 

    }

    public function postponeList(Request $request){
        $current_date =  new \DateTime();
        $uid = \Auth::user()->id;
        $listIDs = $request->listID; 
        if ($request->listID) {
           
        
        try {
               foreach ($listIDs as $id) {
                    $list_prod = List_products::find($id);
                    $list_prod->reestock_date = $request->postpone_date;
                    $list_prod->save();
                    $product_name = Products::find($list_prod->products_id);
                    $record = new Reestock_records;
                    $record->user_id = $uid;
                    $record->department_id = $product_name->department_id;
                    $record->brand = $product_name->brand;
                    $record->product_name = $product_name->product_name;
                    $record->quantity = $list_prod->quantity;
                    $record->reestocked_date = $current_date;
                    $record->status = 2;
                    $record->save();
        }
        } catch (Exception $e) {
            return back()->with('err', 'Lo sentimos por el momento no a sido posible posponer su lista. Por favor intentalo de nuevo si el problema persiste comunicate con nustro equipo de soporte.');
        }
       
        return back()->with('success','Su lista ha sido pospuesta con exito!');
        }else{ return back();}

    }

    public function cancelList(Request $request){
        $current_date =  new \DateTime();
        $uid = \Auth::user()->id;
        $listIDs = $request->listID; 
        try {
               foreach ($listIDs as $id) {
                    $list_prod = List_products::find($id);
                    $list_prod->active = 3;
                    $list_prod->save();
                    $product_name = Products::find($list_prod->products_id);
                    $record = new Reestock_records;
                    $record->user_id = $uid;
                    $record->department_id = $product_name->department_id;
                    $record->brand = $product_name->brand;
                    $record->product_name = $product_name->product_name;
                    $record->quantity = $list_prod->quantity;
                    $record->reestocked_date = $current_date;
                    $record->status = 3;
                    $record->save();
                }

        } catch (Exception $e) {
            return back()->with('err', 'Lo sentimos por el momento no a sido posible cancelar su lista. Por favor intentalo de nuevo si el problema persiste comunicate con nustro equipo de soporte.');
        }
       
        return back()->with('success','Su lista ha sido cancelada!');
    }

    public function updateList(Request $request){
        $id = $request->id;
        try {

            $product = List_products::find($id);
            $product->quantity =  $request->qty;
            $product->save();
            $new_qty = $product->quantity;

            $amount = supplier_products::select(\DB::raw("MIN(supplier_products.sale_price) AS sale_price"))
            ->groupBy('supplier_products.id')
            ->where('products_id', $product->products_id)->first();
            
            $amount = $amount->sale_price * $new_qty;
            $a = number_format($amount, 2, '.', ',');

           // $total = 
            
        } catch (Exception $e) {
            return response()->json($e);
        }
        
        return response()->json(['success' => $a]); 
    }

    public function deleteItem(Request $request)
    {   
        if ($request) {
            try {
                $product = List_products::find($request->id);
                $product->delete();
            } catch (Exception $e) 
            {
                return response()->json('SYSTEM_ERR');
            }
            return response()->json('success');
        }

      
    }

    public function confirm_list(Request $request)
    {
        $current_date =  new \DateTime();
        $uid = \Auth::user()->id;
        $listIDs = $request->listID; 
        try {
               foreach ($listIDs as $id) {
                    $list_prod = List_products::find($id);
                    $list_prod->active = 4;
                    $list_prod->save();
                    $product_name = Products::find($list_prod->products_id);
                    $record = new Reestock_records;
                    $record->user_id = $uid;
                    $record->department_id = $product_name->department_id;
                    $record->brand = $product_name->brand;
                    $record->product_name = $product_name->product_name;
                    $record->quantity = $list_prod->quantity;
                    $record->reestocked_date = $current_date;
                    $record->status = 4;
                    $record->save();
                }

        } catch (Exception $e) {
            return back()->with('err', 'Lo sentimos por el momento no a sido posible cancelar su lista. Por favor intentalo de nuevo si el problema persiste comunicate con nustro equipo de soporte.');
        }
       
        return back()->with('success','Su lista ha sido confirmada!');
    }

}