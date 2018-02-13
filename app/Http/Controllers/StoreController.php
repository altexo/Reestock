<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier_products;
use Auth;
use DB;
use App\List_products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\StandbyProducts;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function index()
    {
         $listItems = cart::content();
        // Next we associate a model with the item.
        
        if (request()->has('department')) {
            $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
            ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
            ->join('departments', 'departments.id', '=', 'products.department_id')
            ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
            ->where('departments.department_name',request('department'))
            ->Orwhere('departments.id',request('department'))
            ->groupBy('supplier_products.products_id')
            ->Paginate(15)
            ->appends('department', request('department'));


           
        }else{
        	   $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                ->join('departments', 'departments.id', '=', 'products.department_id')
                ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
                ->groupBy('supplier_products.products_id')
                ->Paginate(15);

                
            }        
            $lists = $this->getLists();

       


       
    	return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);
        //return $products;
    }
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

        public function addToCart(Request $r)
    {
         $id = $r->product_id;
         $product = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
        ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
        ->join('departments', 'departments.id', '=', 'products.department_id')
        ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
        ->where('supplier_products.products_id', '=', $id)
        ->groupBy('supplier_products.products_id')->first();

        cart::add($product->id, $product->product_name, $r->qty, $product->sale_price, ['reestock' => $r->concurrence])->associate('App\Products');
        return response()->json("success");
    }

    public function updateCart(Request $r)
    {

        if ($r) {
            if($r->qty >= 0.20)
            {
                Cart::update($r->rowId, $r->qty);
                return response()->json(['success' => 0]);
            }else{
                return response()->json(['empty' => 1]); 
            }
        }
        return response()->json("err");
       
        
    }

       public function updateConcurrence(Request $r)
    {
        try {
             if ($r) {
            Cart::update($r->rowId, ['options' => ['reestock' => $r->concurrence]]);
            return response()->json("success");
            }
        } catch (Exception $e) {
              return response()->json($e);
        }
       
      
       
    }

    public function removeFromCart(Request $r)
    {
        if ($r) {
            Cart::remove($r->rowId);
            return response()->json("success");
        }
         return response()->json("err");
    }

    public function showList()
    {
        $listItems = cart::content();

        return view('list', ['listItems' => $listItems]);
    }

      public function search(Request $request)
    { 
        $search = $request->search;
        //return $request;
        if (is_null($search))
        {
           return redirect()->route('store');      
        }
        else
        {
            $listItems = cart::content();
            $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
            ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
            ->join('departments', 'departments.id', '=', 'products.department_id')
            ->select('products.*', \DB::raw("MIN(supplier_products.purchase_price) AS purchase_price"), \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
            ->where('products.product_name','LIKE',"%{$search}%")
            ->orWhere('products.brand', 'LIKE', "%{$search}%")
            ->groupBy('supplier_products.products_id')
            ->Paginate(15);

             if (Auth::check()) {
                DB::statement("SET lc_time_names = 'es_MX'");
                $uid = \Auth::user()->id;
                $lists = List_products::select(DB::raw('DISTINCT DATE(reestock_date) as fecha, CONCAT(DAYNAME(reestock_date), " " , DAY(reestock_date), " de ", MONTHNAME(reestock_date)) as date'))
                ->where('users_id', $uid)->where('active', 1)->get();//where('users_id', $uid)->get();
            }else{
                $lists = [];
            }         
           // return $lists;
           return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);
        }
    }

    //Request product by custumer
    public function requestProduct(Request $r){
        $file_name = '';

        try {
                if($r->hasFile('p_image')){
                        $file=Input::file('p_image');
                        $length = 16;
                        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $rand_name = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
                        $file_name = $file->move('images/products' , $rand_name.$file->getClientOriginalName());
    
                }

              $standby = new StandbyProducts;
                $standby->name = $r->name;
                $standby->description = $r->description;
                $standby->department = $r->department;
                $standby->brand = $r->brand;
                $standby->unity = $r->unity;
                $standby->store = $r->store;
                $standby->email = $r->email;
                $standby->email = $r->email;
                $standby->image = $file_name;
                $standby->save();

        } catch (Exception $e) {
            return redirect()->back()->with('err', 'Woops. Ocurrio algo inesperado.');
        }
      
        return redirect()->back()->with('success', '¡Gracias! Nosotros te avisamos cuando el producto este disponible en la tienda.');
    }
    //Chek User Lists Method--> Internal Method.
    public function getLists(){
        if (Auth::check()) {
                    DB::statement("SET lc_time_names = 'es_MX'");
                    $uid = \Auth::user()->id;
                     $lists = List_products::select(DB::raw('DISTINCT DATE(reestock_date) as fecha, CONCAT(DAYNAME(reestock_date), " " , DAY(reestock_date), " de ", MONTHNAME(reestock_date)) as date'))->where('users_id', $uid)->where('active', 1)->get();//where('users_id', $uid)->get();
                     
                }else{
                    $lists = [];
                }   
        return $lists;           
    }
}
