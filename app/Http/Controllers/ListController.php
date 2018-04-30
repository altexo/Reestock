<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier_products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Products;
use App\Lists;
Use App\List_products;
use DB;
use DateTime;

use App\Shipping;
class ListController extends Controller

{
    public function __construct() {
         $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::count() < 1) {
               return redirect()->route('store');
           }   
        $listItems = Cart::content()->groupBy('options.reestock');

        $uid = \Auth::user()->id; 
        $shipping = Shipping::where('user_id', $uid)->get();
        //return $uid;
        $total = Cart::subtotal();
        $newStr = str_replace(',', '', $total)+60;

        //return $newStr+60;
        return view('clientes.list-stepper', ['shipping' => $shipping, 'listItems' => $listItems, 'total' => $newStr]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $r)
    {   
        //return Cart::content();
        $date = $r->first_date_submit;
        $tdate = DateTime::createFromFormat('Y-m-d', $date);  

       
        $reestock_date = '';
        $uid = \Auth::user()->id; 
        
        if ($r) {
            try {
                    $products = Cart::content();
                      foreach ($products as $p) {
                        $list = new List_products;
                        $list->users_id = $uid;
                        $list->products_id = $p->id;
                        $list->quantity = $p->qty;  
                        $list->reestock_concurrence = $p->options->reestock;
                        if ($p->options->instructions != null) {
                            $list->instructions = $p->options->instructions;
                        }
                        $current_date =  new \DateTime();
                        //fecha de reestock
                        $reestock_date = $tdate;
                        if ($reestock_date->format("N") == '7') {
                            $reestock_date->modify('+1 day');
                        } 
                        $list->reestock_date = $reestock_date;
                        $list->active = 1;
                        //End fecha de reestock
                        $list->save();  
                        }
                    $uid = \Auth::user()->id; 
                    $shipping = Shipping::where('user_id', $uid)->first();
                    $shipping->user_id = $uid;
                    $shipping->name = $r->ship_name;
                    $shipping->last_name = $r->ship_lastName;
                    $shipping->address = $r->ship_st;
                    $shipping->colony = $r->ship_col;
                    $shipping->city = $r->ship_town;
                    $shipping->country = $r->ship_country;
                    $shipping->state = $r->ship_state;
                    $shipping->zip_code = $r->ship_cp;
                    $shipping->phone = $r->ship_phone;
                    $shipping->save();
                    //Cart::destroy();

            } catch (Exception $e) {
                return back()->with('err', 'Lo sentimos por el momento no es posible crear su lista.');               
            }
            Cart::destroy();
             return redirect()->home()->with('success','Se ha creado su lista exitosamente!');
        }
         return back()->with('err', 'Lo sentimos por el momento no es posible crear su lista.');
    }


    public function createNew(Request $r){
        $date = $r->first_date_submit;
        $tdate = DateTime::createFromFormat('Y-m-d', $date);  

        
        $reestock_date = '';
        $uid = \Auth::user()->id; 

        if ($r) {
            try {
                    $products = Cart::content();
                      foreach ($products as $p) {
                        $list = new List_products;
                        $list->users_id = $uid;
                        $list->products_id = $p->id;
                        $list->quantity = $p->qty;  
                        $list->reestock_concurrence = $p->options->reestock;
                        if ($p->options->instructions != null) {
                            $list->instructions = $p->options->instructions;
                        }
                        $current_date =  new \DateTime();
                        //fecha de reestock
                        $reestock_date = $tdate;
                        // $reestock_date = $current_date->modify('+'.$p->options->reestock.' day'); 
                        if($reestock_date->format("N") == '7') {
                            $reestock_date->modify('+1 day');
                        } 
                        $list->reestock_date = $reestock_date;
                        $list->active = 1;
                        //End fecha de reestock
                        $list->save();  
                    }
                    $shipping = new Shipping;
                    $shipping->user_id = $uid;
                    $shipping->name = $r->ship_name;
                    $shipping->last_name = $r->ship_lastName;
                    $shipping->address = $r->ship_st;
                    $shipping->colony = $r->ship_col;
                    $shipping->city = $r->ship_town;
                    $shipping->country = $r->ship_country;
                    $shipping->state = $r->ship_state;
                    $shipping->zip_code = $r->ship_cp;
                    $shipping->phone = $r->ship_phone;
                    $shipping->save();

            } catch (Exception $e) {
                return back()->with('err', 'Lo sentimos por el momento no es posible crear su lista.');                
            }
            Cart::destroy();
            return redirect()->home()->with('success','Se ha creado su lista exitosamente!');
        }
    }
               
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$id = $request->route('id');
         $product = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
        ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
        ->join('departments', 'departments.id', '=', 'products.department_id')
        ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
        ->where('supplier_products.products_id', '=', $id)
        ->groupBy('supplier_products.products_id')->first();

        cart::add($product->id, $product->product_name, 1, $product->sale_price);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addNewProduct(Request $r){
        if ($r) {
            $uid = \Auth::user()->id; 
            try {
                $list_prod = new List_products;
                $list_prod->users_id = $uid;
                $list_prod->products_id = $r->product_id;
                $list_prod->reestock_concurrence = $r->concurrence;
                $list_prod->quantity = $r->qty;
                $list_prod->active = 1;
                $list_prod->reestock_date = $r->reestockDate;
                $list_prod->save();
            } catch (Exception $e) {
                return response()->json("err");
            }
            return response()->json("success");

           

        }
        return response()->json()->with('err','Whoops! algo salio mal!');
    }
}
