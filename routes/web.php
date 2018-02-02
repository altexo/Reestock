<?php
Use App\Lists;
USe App\List_products;
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
	Route::get('/order/list', 'ListAdminController@orderList')->name('Lista de compra');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	//ProductController
	Route::get('/products', 'ProductsController@index')->name('Ver Productos');
	Route::post('/create/product/save', 'ProductsController@create')->name('product.create');
	Route::post('/create/product/import', 'ProductsController@importProducts')->name('import.products');
	Route::get('/edit/product/{id}', 'ProductsController@getEditProduct')->name('Editar Producto');
	Route::post('/edit/product/{id}/update', 'ProductsController@updateProduct')->name('product.update');
	Route::post('/edit/product/{id}/IMGupdate', 'ProductsController@updateProductImg')->name('product.img');
	Route::post('/delete/product/{id}', 'ProductsController@deleteByid')->name('product.delete');
	
	route::get('/lists', 'ListAdminController@index')->name('Listas / Todas');
	//Test
	Route::get('/livesearch','ProductsController@liveSearch');

	
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

Route::get('/tienda', 'StoreController@index')->name('store');
Route::get('/search','StoreController@search')->name('search');
Route::resource('/lista', 'StoreController');
Route::post('/lista/addToCart', 'StoreController@addToCart');
Route::post('/lista/updateCart', 'StoreController@updateCart');
Route::post('/lista/removeFromCart', 'StoreController@removeFromCart');
Route::post('/lista/updateConcurrence', 'StoreController@updateConcurrence');

Route::get('/lista', 'StoreController@showList')->name('show.list');

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
Route::get('/test/views/index2', function(){
		$current_date =  new \DateTime();

        $reestock_lock_date = $current_date->modify('+2 days')->format('Y-m-d');
        $list = App\List_products::select(DB::raw('DISTINCT list_products.products_id, SUM(list_products.quantity) as cantidad'))
        	->groupBy('list_products.products_id')
        	->where(DB::raw('date(reestock_date)'), $reestock_lock_date)
        	->where('active', 4)
        	->get();
        //$list = App\list_products::where(DB::raw('date(reestock_date)'), $reestock_lock_date)
        //->join('products','list_products.products_id','=','products.id')
        //->get();

       
	return ['order' => $list];
});





