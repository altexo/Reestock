<?php

namespace App\Http\Controllers;
use App\Products;
use App\supplier_products;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Collection;
use App\List_products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\StandbyProducts;
use App\Categories;
use App\Sub_categories;
use App\Departments;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Store2Controller extends Controller
{
    public function index(){
        //return $products = Products::all()->modelFilter();
       
        // foreach ($products as $p) {
        //     $p->supplier;
        // }
        //  return $products;
    	$listItems = cart::content(); 
    	$lists = $this->getLists();
    	$all_products = $this->getAllProducts();
        $products = $this->manuallyPaginate($all_products);

    	return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);
    }

    public function findByDepartment($department){
    	$listItems = cart::content();

    	$categories = Categories::where('departments_id', $department)->get();
    	$name = Departments::select('department_name as h_name')->where('id', $department)->first();
    	
    	return view('categories', ['categories' => $categories, 'listItems' => $listItems, 'header' => $name]);
    }

    public function findByDepartmentCat($department, $category){
    	$listItems = cart::content();
    	$sub_category = Sub_categories::where('categories_id', $category)->get();
    	$name = Categories::select('name as h_name')->where('id', $category)->first();	
        if($category >= 54 && $category <= 60)
        {
            return $this->noneSubCategory($department, $category);
        }
    	//return $name;
    	return view('sub_categories', ['sub_categories' => $sub_category, 'listItems' => $listItems, 'header' => $name]);

    }


    public function findBySubCategory($department, $category, $sub_category){
    	$listItems = cart::content();
    	$lists = $this->getLists();
    	$all_products = $this->getAllProducts();
    	//return $all_products;
    	$all_products = $all_products->where('departments_id', $department);
    	$all_products = $all_products->where('category_id', $category);
    	$all_products = $all_products->where('scat_id', $sub_category);
    	$products = $this->manuallyPaginate($all_products);
        $unique_brands = $all_products->unique('brand');
        $brands = $unique_brands->pluck('brand');
    	//return $brands;
        // if (request()->has('brand')) {
        //     return $brand = request()->brand;
        //      $products = $products->where('brand', $brand);
        //         $products = $this->manuallyPaginate($products);

        //         $unique_brands = $products->unique('brand');
        //         $brands = $unique_brands->pluck('brand');
        // }

    	return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists,]);
    }

    public function filterBrand(Request $request){
        return url()->previous();
    }

    private function noneSubCategory($department, $category){
        $listItems = cart::content();
        $lists = $this->getLists();
        $all_products = $this->getAllNoneSubCatProducts();
        $all_products = $all_products->where('departments_id', $department);
        $all_products = $all_products->where('categories_id', $category);
        $products = $this->manuallyPaginate($all_products);

        return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);
 
    }

    private function manuallyPaginate($items)
    {
        $perPage = 15;
        $pageStart = request('page', 1);
        $offSet    = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = $items->slice($offSet, $perPage);

        return new LengthAwarePaginator(
            $itemsForCurrentPage, $items->count(), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }
  
    private function getAllProducts(){
    	  $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                ->join('departments', 'departments.id', '=', 'products.departments_id')
                ->join('sub_categories','sub_categories.id','=', 'products.sub_categories_id')
    			->join('categories','sub_categories.categories_id','=', 'categories.id')
                ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name','sub_categories.name as scat_name', 'sub_categories.id as scat_id', 'categories.name as categorie_name', 'categories.id as category_id')
                ->groupBy('supplier_products.products_id')
                ->get();
    	//$products = DB::table('order_extended')->get();
      
    	return $products;
    }
        private function getAllNoneSubCatProducts(){
          $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                ->join('departments', 'departments.id', '=', 'products.departments_id')
                ->join('categories','products.categories_id','=', 'categories.id')
                ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name', 'categories.name as categorie_name', 'categories.id as category_id')
                ->groupBy('supplier_products.products_id')
                ->get();
        //$products = DB::table('order_extended')->get();
      
        return $products;
    }
    public function mySearch(Request $r){
        $listItems = cart::content(); 
        $lists = $this->getLists();
        if($r->has('search')){

            $products = Products::search($r->get('search'))
                ->join('supplier_products', 'supplier_products.products_id','=', 'products.id')
                ->join('departments', 'departments.id', '=', 'products.departments_id')
                ->join('sub_categories','sub_categories.id', '=', 'products.sub_categories_id')
                ->select('products.*', 'supplier_products.sale_price',  'departments.department_name','sub_categories.name as scat_name', 'sub_categories.id as scat_id')
             
                ->orderBy('relevance', 'desc')
                ->get();

            $brands = $products->unique('brand')->take(12);
            $brands = $brands->pluck('brand');

            $unique_sub_cat = $products->unique('scat_name');
            $sub_cats = $unique_sub_cat->pluck('scat_name');
            if (request()->has('brand')) {
                $brand = request()->brand;
                $products = $products->where('brand', $brand);
               
                $unique_sub_cat = $products->unique('scat_name');
                $sub_cats = $unique_sub_cat->pluck('scat_name');

            }
            if (request()->has('sub_cat')) {
                $sub_cat = request()->sub_cat;
                $products = $products->where('scat_name', $sub_cat);

                $unique_brands = $products->unique('brand');
                $brands = $unique_brands->pluck('brand');
            }
            
        }else{
            $products = Products::get();
        }
        $products = $this->manuallyPaginate($products)->appends('search', request('search'));
          return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists, 'brands' => $brands, 'sub_cats' => $sub_cats]);
      //  return view('storev1', compact('users'));
    }

    public function search(Request $request){
        $listItems = cart::content(); 
        $lists = $this->getLists();
       // $search = $request->search;
        $search = explode(' ', $request->search);
                $products = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                ->join('departments', 'departments.id', '=', 'products.departments_id')
                ->join('sub_categories','sub_categories.id','=', 'products.sub_categories_id')
                ->join('categories','sub_categories.categories_id','=', 'categories.id')
                ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name','sub_categories.name as scat_name', 'sub_categories.id as scat_id', 'categories.name as categorie_name', 'categories.id as category_id')
                ->whereIn('products.product_name',$search)
                // ->where('products.product_name', 'like', '%' .$search. '%')
                ->groupBy('supplier_products.products_id')//->get();
                ->paginate(15)
                ->appends('search', request('search'));//La mejor solucion para paginar busquedas.
                //Busqueda sin paginador para filtros
                $filtros = supplier_products::join('products', 'products.id', '=', 'supplier_products.products_id')
                ->join('suppliers', 'suppliers.id', '=', 'supplier_products.supplier_id')
                ->join('departments', 'departments.id', '=', 'products.departments_id')
                ->join('sub_categories','sub_categories.id','=', 'products.sub_categories_id')
                ->join('categories','sub_categories.categories_id','=', 'categories.id')
                ->select('products.*', \DB::raw("MIN(supplier_products.sale_price) AS sale_price"), 'departments.department_name','sub_categories.name as scat_name', 'sub_categories.id as scat_id', 'categories.name as categorie_name', 'categories.id as category_id')
                 ->whereIn('products.product_name',$search)
                // ->where('products.product_name', 'like', '%' .$search. '%')
                ->groupBy('supplier_products.products_id')->get();



                $unique_brands = $filtros->unique('brand');
                $brands = $unique_brands->pluck('brand');

                $unique_sub_cat = $filtros->unique('scat_name');
                $sub_cats = $unique_sub_cat->pluck('scat_name');

            if (request()->has('brand')) {
                $brand = request()->brand;

                $filtros = $filtros->where('brand', $brand);
               
                $unique_brands = $filtros->unique('brand');
                $brands = $unique_brands->pluck('brand');

                $unique_sub_cat = $filtros->unique('scat_name');
                $sub_cats = $unique_sub_cat->pluck('scat_name');

                 $products = $this->manuallyPaginate($filtros);

            }

            if (request()->has('sub_cat')) {
                $sub_cat = request()->sub_cat;

                $filtros = $filtros->where('scat_name', $sub_cat);
               

                $unique_brands = $filtros->unique('brand');
                $brands = $unique_brands->pluck('brand');

                $unique_sub_cat = $filtros->unique('scat_name');
                $sub_cats = $unique_sub_cat->pluck('scat_name');
                $products = $this->manuallyPaginate($filtros);

            }

         return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists, 'brands' => $brands, 'sub_cats' => $sub_cats]);
    }

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
