<?php

namespace App\Http\Controllers;
use App\Products;
use App\supplier_products;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\List_products;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\StandbyProducts;
use App\Categories;
use App\Sub_categories;
use App\Departments;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class Store2Controller extends Controller
{
    public function index(){
    	$listItems = cart::content(); 
    	$lists = $this->getLists();
    	$all_products = $this->getAllProducts();

	    	// $products = $all_products->where('sub_categories_id', 15);

    	 $products = $this->manuallyPaginate($all_products);
    
    	return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);

    }
    // public function searchBy($department){
    // 	$listItems = cart::content();
    // 	$lists = $this->getLists();
    // 	$all_products = $this->getAllProducts();

    // 	return view('categories');
    // }
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
    	//return $name;
    	return view('sub_categories', ['sub_categories' => $sub_category, 'listItems' => $listItems, 'header' => $name]);

    }


    public function findBySubCategory($department, $category, $sub_category){
    	$listItems = cart::content();
    	$lists = $this->getLists();
    	$all_products = $this->getAllProducts();
    	//return $all_products;
    	 $all_products = $all_products->where('departments_id', $department);
    	 $all_products = $all_products->where('category_id', $categorie);
    	//return $all_products = $all_products->where('scat_id', $sub_categorie);
    	$products = $this->manuallyPaginate($all_products);
    	
    	return view('storev1', ['products' => $products, 'listItems' => $listItems, 'lists' => $lists]);
    }
    private function manuallyPaginate($array){
    	// The total number of items. If the `$items` has all the data, you can do something like this:
		$total = count($array);
		// How many items do you want to display.
		$perPage = 15;
		// The index page.
		$currentPage = 1;
		$paginator = new LengthAwarePaginator($array, $total, $perPage, $currentPage);
    
    	return $paginator;
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
