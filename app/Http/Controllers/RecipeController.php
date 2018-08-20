<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\supplier_products;
use Gloudemans\Shoppingcart\Facades\Cart;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingridedients = ['96', '8336', '9898', '13279', '8321', '971', '13252', '9908', '9954', '13329','2917'];

      // return $products = Products::whereIn('id', $ingridedients)->get();
        $product = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
        ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
        ->join('departments', 'departments.id', '=', 'products.departments_id')
        ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
        ->whereIn('supplier_products.products_id', $ingridedients)
        ->groupBy('supplier_products.products_id')->get();

        return view('posts.recipes.recipe-view', ['ingredients'=> $product]);
    }

    public function addIngredientToCart(Request $r){
        $ingredientsID = $r->rowID;
       // return dd($r);
        foreach ($ingredientsID as $id) {
                $product = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                    ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                    ->join('departments', 'departments.id', '=', 'products.departments_id')
                    ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
                    ->where('supplier_products.products_id', '=', $id)
                    ->groupBy('supplier_products.products_id')
                    ->first();
        
                cart::add($product->id, $product->product_name, 1, $product->sale_price, ['reestock' => 0, 'instructions' => $r->instructions])->associate('App\Products');
        }
        
        return redirect()->back()->with('success', 'Los ingredientes se han cargado a su carrito con exito!');     


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
}
