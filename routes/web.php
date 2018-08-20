<?php
Use App\Lists;
USe App\List_products;
use App\Tags;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/tiendav1', function(){
	return view('storev1');
});
Route::get('/', function () {
	$test = ['lista', 'lista 2' ,'lista 3', 'lista 5'];
    return view('welcome', compact('test'));
});

Route::get('/iniciar-sesion', function () {
    return view('login');
})->name('login');

Route::get('/registrar', function() {
	return view('register');
});

Auth::routes();

//Admins Routes
Route::prefix('admin')->group( function() {
	//AdminControllers
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/create/product', 'ProductsController@showCreateProduct')->name('Crear Producto');
	Route::get('/employees', 'AdminController@showEmployeesList')->name('Empleados');
	Route::get('/clients', 'AdminController@showClientsList')->name('Clientes');
	
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	//ProductController
	Route::get('/products', 'ProductsController@index')->name('Ver Productos');
	Route::post('/create/product/save', 'ProductsController@create')->name('product.create');
	Route::post('/create/product/import', 'ProductsController@importProductsWalmart')->name('import.products');
	Route::get('/edit/product/{id}', 'ProductsController@getEditProduct')->name('Editar Producto');
	Route::post('/edit/product/{id}/update', 'ProductsController@updateProduct')->name('product.update');
	Route::post('/edit/product/{id}/IMGupdate', 'ProductsController@updateProductImg')->name('product.img');
	Route::post('/delete/product/{id}', 'ProductsController@deleteByid')->name('product.delete');
	
	
	//Test
	Route::get('/livesearch','ProductsController@liveSearch');

	//ListAdmin routes
	Route::get('order/{date}/{id}/{status}', 'ListAdminController@show');
	//Orden de compra
	Route::get('/order/list', 'ListAdminController@orderList')->name('Lista de compra');
		//Filtros
		Route::get('/byDate/{date}', 'ListAdminController@orderByDate')->name('ordenada');
	//filtros para listas
	route::get('/lists/all', 'ListAdminController@index')->name('Listas / Todas');
	Route::get('/lists/confirmed/', 'ListAdminController@confirmed')->name('Listas / Confirmadas');
	Route::get('/lists/postponed', 'ListAdminController@postponed')->name('Listas / Pospuestas');
	Route::get('/lists/calceled', 'ListAdminController@canceled')->name('Listas / Canceladas');
	//Status de Get Lists
	Route::post('status/changue/done','ListAdminController@deliveredDone')->name('delivered.done');
	Route::get('create/recipe/','AdminRecipeController@create')->name('recipe.create');
	Route::get('/search',function(){
		 $query = Input::get('query');
		 $tags = Tags::where('tag_name','like','%'.$query.'%')->get();
		 return response()->json($tags);
	});

	//Inovice Route
	Route::post('inovice/dev/','ListAdminController@inovice')->name('inovice.test');
	//Route::get('records/','')
});
//End

Route::prefix('_auth/user')->group( function(){
Route::resource('/list/chekout/', 'ListController');
Route::post('/list/save/new/', 'ListController@createNew')->name('saveNew.list');
Route::post('/list/save/', 'ListController@create')->name('save.list');
Route::post('list/postpone', 'HomeController@postponeList')->name('postpone.list');
Route::post('list/cancel', 'HomeController@cancelList')->name('cancel.list');
Route::post('list/updateProduct', 'HomeController@updateList')->name('update.list');
Route::post('list/deleteItem', 'HomeController@deleteItem')->name('delete.item');
Route::post('list/addNewProduct', 'ListController@addNewProduct')->name('add.product');
Route::post('list/condirmList', 'HomeController@confirm_list')->name('confirm.list');
});
Route::get('/tienda','Store2Controller@index')->name('store.show');
//pruebas con busquedas dinamicas
// Route::get('/tienda2/{department}','Store2Controller@findByDepartment')->name('find.department');
// Route::get('/tienda2/{department}/{categorie}', 'Store2Controller@findByDepartmentCategorie')->name('find.DepCat');
// Route::get('/tienda2/{department}/{categorie}/{sub_cateogire}', 'Store2Controller@findByDepartmentCategorieSubC')->name('find.DepCatSubC');
//End

//pruebas de busqueda seccionada
Route::get('/tienda/searchby/{department}', 'Store2Controller@findByDepartment')->name('search.categorie');
Route::get('/tienda/searchby/{department}/{category}', 'Store2Controller@findByDepartmentCat')->name('search.subCat');
Route::get('/tienda/searchby/{department}/{category}/{sub_category}', 'Store2Controller@findBySubCategory')->name('search.results');


Route::post('/tienda/filter/brand', 'Store2Controller@filterBrand')->name('filter.brand');
// Route::get('tienda2/{department}/','Store2Controller@findByDepartment')->name('dep');
// Route::get('tienda2/{department}/{subcat}','Store2Controller@findByDepartment')->name('dep');
// Route::get('tienda2/{department}/{}','Store2Controller@findByDepartment')->name('dep');
// Route::get('/tienda', 'StoreController@index')->name('store');
Route::get('/search','StoreController@search')->name('search');
Route::get('/search','Store2Controller@mySearch')->name('search2');
Route::resource('/lista', 'StoreController');
Route::post('/lista/addToCart', 'StoreController@addToCart');
Route::post('/lista/updateCart', 'StoreController@updateCart');
Route::post('/lista/removeFromCart', 'StoreController@removeFromCart');
Route::post('/lista/updateConcurrence', 'StoreController@updateConcurrence');

Route::get('/lista', 'StoreController@showList')->name('show.list');
Route::post('/tienda/producto/solicitud','StoreController@requestProduct')->name('product.request');
//Route::resource('/lista/create/{id}', 'ListController@create')->name('addlist');

//Users Routes
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reset',function(){
	return view('auth.login-def');
});

Route::get('/lista/{lista}', function ($id){
	
	$lista = List_products::where('list_ID', $id)->get();

	return view('clientes.listDetails', compact('lista'));
});
//End
Route::get('/checkout', 'ListController@index');
//test-route
Route::get('/recetas','RecipeController@index')->name('recipe.view');
Route::post('/recetas/inCarrito','RecipeController@addIngredientToCart')->name('add.ingredients');
Route::get('/test/views/index2', function(){
	// if(DB::connection()->getDatabaseName())
 //   {
 //     echo "connected successfully to database ".DB::connection()->getDatabaseName();
  // }
	return view('components.search-store');
	//        $current_date =  new \DateTime();
  //       $n = $current_date->modify('+ 2 day')->format('Y-m-d');
  //       $lists = List_products::where(DB::RAW('date(reestock_date)'), $n)->where('active', 1)->orWhere('active', 5)->get();

  //       $out_of_time_lists = List_products::where(DB::raw('date(reestock_date)'), $n)
  //           ->where('active',1)
  //           ->update(['active' => 5]);
		// $current_date =  new \DateTime();

  //       $n = $current_date->format('Y-m-d');
  //         //$day = date("d", $n);
  //        $ne = date('N', strtotime($n));
  //       return $ne;
  //       $reestock_lock_date = $current_date->modify('+2 days')->format('Y-m-d');
  //       $list = App\List_products::select(DB::raw('DISTINCT list_products.products_id, SUM(list_products.quantity) as cantidad'))
  //       	->groupBy('list_products.products_id')
  //       	->where(DB::raw('date(reestock_date)'), $reestock_lock_date)
  //       	->where('active', 4)
  //       	->get();
  //       //$list = App\list_products::where(DB::raw('date(reestock_date)'), $reestock_lock_date)
  //       //->join('products','list_products.products_id','=','products.id')
  //       //->get();

       
	//	return ['lists' => $lists, 'date' => $n];
});





