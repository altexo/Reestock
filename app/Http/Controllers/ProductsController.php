<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Products;
use App\supplier_products;
use DB;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
         $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
            ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
            ->join('departments', 'departments.id', '=', 'products.department_id')
            ->select('products.*', \DB::raw("MIN(supplier_products.purchase_price) AS purchase_price"), \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
            ->groupBy('supplier_products.products_id')
            ->Paginate(15);

    
    	return view('admins.show-products', ['products' => $products]);
    }

     public function showCreateProduct()
    {
    	return view('admins.create-products');
    }



    public function create(Request $r){
        $file_name = '';
       // return dd($r);
         if ($r) 
         {
            if($r->hasFile('file')){
                echo 'Uploaded';
                $file=Input::file('file');
                $length = 16;
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $rand_name = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
                $file_name = $file->move('images' , $rand_name.$file->getClientOriginalName());
            }else{
                 return redirect()->back()->with('err', 'Hay un problema con la imagen que intentas subir.');
    
            }
            try {
                //Comienza transaccion de crear producto y agregar a suppliers.
                DB::transaction(function () use($r, $file_name) {

                    //Se crea un objeto del modelo Productos para crear el producto y despues obtener su id
                    $product = new Products;
                    $product->product_name = $r->product_name;
                    $product->bar_code = $r->bar_code;
                    $product->brand = $r->brand;
                    $product->department_id = $r->department;
                    $product->unity = $r->unity;
                    $product->product_img = $file_name;
                    $product->save();
                    
                    $product_id = $product->id;

                    $suppliers = $r->supplier;
                    foreach ($suppliers as $supplier ) {
                        //Se asigna el precio de compra a una variable para realizar el calculo de su precio de venta
                        $purchase_price = $supplier['purchase_price'];
                        $sale_price = $purchase_price * 1.07; 

                        $supplier_products = new supplier_products;
                        $supplier_products->products_id = $product_id;
                        $supplier_products->supplier_id = $supplier['supplier_id']; 
                        $supplier_products->purchase_price = $purchase_price;
                        $supplier_products->sale_price = $sale_price;
                        $supplier_products->save();
                    }
                

                });
            
           
                    //return response()->json($product_name);
            } catch (\Exception $e) {
                return $e;
                //return dd($r);
            }
    //session()->flash('message', '')
        return redirect('admin/create/product')->with('success', 'El producto ha sido creado exitosamente!');

        }
    }
       

 
    

    
    public function getEditProduct($id)
    {
        $product = DB::table('products')
        ->join('departments', 'departments.id', '=', 'products.department_id')
         ->select('products.*', 'departments.department_name')->where('products.id','=',$id)->get();
         
         $product_suppliers = supplier_products::join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
         ->select('suppliers.*', 'supplier_products.*')
         ->where('products_id', $id)->get();

        return view('admins.edit-product', ['product' => $product, 'product_suppliers' => $product_suppliers]);
        //return ['product' => $product, 'product_suppliers' => $product_suppliers];
    }
    public function updateProductImg(Request $img)
    {
         if ($img) 
         {
             if($img->hasFile('file')){
                echo 'Uploaded';
                $file=Input::file('file');
                $length = 16;
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $rand_name = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
                $file_name = $file->move('images' , $file_name.$file->getClientOriginalName());
                $prod_id = $img->route('id');
                $product = Products::find($prod_id);
                $product->product_img = $file_name;
                $product->save();

               return back()->with('success', 'La imagen se actualizo correctamente!');
            //return 'ok';
            }else
            {
                 return back()->with('err', 'Ooops parece que hay un problema con la imagen.'); 
            }
        }else{
            return back()->with('err', 'Ooops parece que hay un problema con la imagen.');   
           // return 'err';
        }
    }


    public function updateProduct(Request $r)
    {
        /*$prod_id = $r->route('id');
        $product = Products::find($prod_id);*/
     
        if ($r) 
         {
            try {
                //Comienza transaccion de crear producto y agregar a suppliers.
                DB::transaction(function () use($r) {
                    
                    $prod_id = $r->route('id');
                    $delete_supplier = DB::table('supplier_products')->where('products_id', $prod_id)->delete();
                    
                    //Se crea un objeto del modelo Productos para crear el producto y despues obtener su id
                    $product = Products::find($prod_id);

                    $product->product_name = $r->product_name;
                    $product->bar_code = $r->bar_code;
                    $product->brand = $r->brand;
                    $product->department_id = $r->department;
                    $product->unity = $r->unity;
                    $product->save();
                    
                    $product_id = $product->id;

                    $suppliers = $r->supplier;
                    foreach ($suppliers as $supplier ) {
                        //Se asigna el precio de compra a una variable para realizar el calculo de su precio de venta
                        $purchase_price = $supplier['purchase_price'];
                        $sale_price = $purchase_price * 1.07; 

                        $supplier_products = new supplier_products;
                        $supplier_products->products_id = $product_id;
                        $supplier_products->supplier_id = $supplier['supplier_id']; 
                        $supplier_products->purchase_price = $purchase_price;
                        $supplier_products->sale_price = $sale_price;
                        $supplier_products->save();
                    }
                

                });
            
           
                    //return response()->json($product_name);
            } catch (\Exception $e) {
                return $e;
                //return dd($r);
            }
            //session()->flash('message', '')
            return redirect('/admin/products')->with('success', 'El producto ha sido actualizado exitosamente!');

        }
       
    }

    public function deleteByid(Request $id){
        //return 'helo';

         try {
            
                //Comienza transaccion
            DB::transaction(function () use($id) {
                $p_id = $id->route('id');
                    $delete = DB::delete('delete from supplier_products where products_id = :id', ['id' => $p_id]);
                    $delete = DB::delete('delete from products where id = :id', ['id' => $p_id]);

            });
        
            } catch (\Exception $e) {
                return $e;
                //return dd($r);
            }
   
        return redirect('/admin/products')->with('success', 'El producto ha sido eliminado exitosamente!');
    }

//Funcion para importar productos desde un CSV
    public function importProducts(Request $request){

        $validator = \Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            echo "Fail :(";
            //return redirect()->back()->withErrors($validator);
        }
        
        $file = $request->file;
        $csvData = file_get_contents($file);
        //dd($csvData);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        //return dd($header);
       //dd($header);

        foreach ($rows as $row) {
            $row = array_combine($header, $row);
            

        
        // dd($row);
    

            $product = new Products;
            echo "start<br>";
                //$product->bar_code = $row['CODIGO'];
                    $product->product_name = $row['ARTICULO'];
                   // echo $product->product_name.'<br>';
                    $product->brand = $row['MARCA'];
                    if ($row['DEPARTAMENTO'] == 'ABARROTES') {
                        $product->department_id = 1;
                    }elseif ($row['DEPARTAMENTO'] == 'CÁRNICOS') {
                        $product->department_id = 2;
                    }elseif ($row['DEPARTAMENTO'] == 'FRUTA Y VERDURA') {
                        $product->department_id = 3;
                    }elseif ($row['DEPARTAMENTO'] == 'REFRIGERADO') {
                        $product->department_id = 4;
                    }elseif ($row['DEPARTAMENTO'] == 'HIGIENE PERSONAL') {
                        $product->department_id = 5;
                    }elseif ($row['DEPARTAMENTO'] == 'LIMPIEZA') {
                        $product->department_id = 6;
                    }elseif ($row['DEPARTAMENTO'] == 'DESECHABLES') {
                        $product->department_id = 7;
                    }else
                    {
                        $product->department_id = 8;
                    }
                    $product->unity = $row['UNIDAD'];
                    $product->save();

                    $product_id = $product->id;
                    //Supplier price
                        
                        if (isset($row['COSTCO']) && ($row['COSTCO'] != '') && ($row['COSTCO']!= '  ')) 
                        {    $supplier_products = new supplier_products;
                            $purchase_price = $row['COSTCO'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 3; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                            echo "Costo Yes";
                        }else
                        {}
                        if (isset($row['SAMS']) && ($row['SAMS'] != '') && ($row['SAMS'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['SAMS'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 4; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }else
                        {}
                        if (isset($row['WALMART']) && ($row['WALMART'] != '') && ($row['WALMART'] != '  ')) 
                        {
                        
                                   $supplier_products = new supplier_products;
                            $purchase_price = $row['WALMART'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 1; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            //print_r($supplier_products);
                            $supplier_products->save();
                            // if(!$saved){
                            //     App::abort(500, 'Error');
                            // }  
                         
                        }
                        if (isset($row['LEY']) && ($row['LEY'] != '') && ($row['LEY'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['LEY'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 2; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }else
                        {}
                        if (isset($row['SORIANA']) && ($row['SORIANA'] != '') && ($row['SORIANA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['SORIANA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 5; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }else
                        {}
                        if (isset($row['FRUT OLIVAS']) && ($row['FRUT OLIVAS'] != '' ) && ($row['FRUT OLIVAS'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['FRUT OLIVAS'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 6; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }else
                        {}
                        if (isset($row['FRUT LOS COMPADR.']) && ($row['FRUT LOS COMPADR.'] != '') && ($row['FRUT LOS COMPADR.'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['FRUT LOS COMPADR.'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 7; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                        if (isset($row['FRUT EL CANARIO']) && ($row['FRUT EL CANARIO'] != '') && ($row['FRUT EL CANARIO'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['FRUT EL CANARIO'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 8; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                         if (isset($row['FRUT LA TAPATIA']) && ($row['FRUT LA TAPATIA'] != '') && ($row['FRUT LA TAPATIA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['FRUT LA TAPATIA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 8; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                         if (isset($row['SANTA CLARA']) && ($row['SANTA CLARA'] != '') && ($row['SANTA CLARA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['SANTA CLARA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 8; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                          if (isset($row['LA VAQUITA']) && ($row['LA VAQUITA'] != '') && ($row['LA VAQUITA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['LA VAQUITA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 8; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }

                        // if (($row['LA MERA'] != '') && ($row['LA MERA'] != '  ')) 
                        // {
                        //     $supplier_products = new supplier_products;
                        //     $purchase_price = $row['LA MERA'];
                        //     $sale_price = $purchase_price * 1.07; 
                        //     $supplier_products->products_id = $product_id;
                        //     $supplier_products->supplier_id = 9; 
                        //     $supplier_products->purchase_price = $purchase_price;
                        //     $supplier_products->sale_price = $sale_price;
                        //     $supplier_products->save();
                        // }
                        // if (($row['F MODERNA'] != '') && ($row['F MODERNA'] != 'N/A')) 
                        // {
                        //     $supplier_products = new supplier_products;
                        //     $purchase_price = $row['F MODERNA'];
                        //     $sale_price = $purchase_price * 1.07; 
                        //     $supplier_products->products_id = $product_id;
                        //     $supplier_products->supplier_id = 10; 
                        //     $supplier_products->purchase_price = $purchase_price;
                        //     $supplier_products->sale_price = $sale_price;
                        //     $supplier_products->save();
                        // }
                        if (isset($row['TRAUB']) && ($row['TRAUB'] != '') && ($row['TRAUB'] != '  '))
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['TRAUB'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 11; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                        if (isset($row['CHATA']) && ($row['CHATA'] != '') && ($row['CHATA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['CHATA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 12; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                        // if (($row['LA CUARTA'] != '') && ($row['LA CUARTA'] != '  ')) 
                        // {
                        //     $supplier_products = new supplier_products;
                        //     $purchase_price = $row['LA CUARTA'];
                        //     $sale_price = $purchase_price * 1.07; 
                        //     $supplier_products->products_id = $product_id;
                        //     $supplier_products->supplier_id = 13; 
                        //     $supplier_products->purchase_price = $purchase_price;
                        //     $supplier_products->sale_price = $sale_price;
                        //     $supplier_products->save();
                        // }
                        if (isset($row['VINOTECA']) && ($row['VINOTECA'] != '') && ($row['VINOTECA'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['VINOTECA'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 14; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                        if (isset($row['TODO ORGANIKO']) && ($row['TODO ORGANIKO'] != '') && ($row['TODO ORGANIKO'] != '  ')) 
                        {
                            $supplier_products = new supplier_products;
                            $purchase_price = $row['TODO ORGANIKO'];
                            $sale_price = $purchase_price * 1.07; 
                            $supplier_products->products_id = $product_id;
                            $supplier_products->supplier_id = 15; 
                            $supplier_products->purchase_price = $purchase_price;
                            $supplier_products->sale_price = $sale_price;
                            $supplier_products->save();
                        }
                        

                       
                       
               
        }
            
        return back();
    }



     public function liveSearch(Request $request)
    { 
        $search = $request->id;

        if (is_null($search))
        {
           return view('admins.livesearch');        
        }
        else
        {

          $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
            ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
            ->join('departments', 'departments.id', '=', 'products.department_id')
            ->select('products.*', \DB::raw("MIN(supplier_products.purchase_price) AS purchase_price"), \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name')
             ->where('products.product_name','LIKE',"%{$search}%")
            ->groupBy('supplier_products.products_id')->get();

           return view('admins.livesearchajax')->withPosts($products);
        }
    }

}






