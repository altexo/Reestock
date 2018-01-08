<?php

namespace App\Http\Controllers;
use App\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $adminID = Auth::user()->id;
        $admins = DB::select('select job_titles.job_title from admins inner join job_titles on admins.job_title_id = job_titles.id where admins.id = :id', ['id' => $adminID]);
        return view('admins.admin', ['admins' => $admins]);*/
        //return $admins;
        return view('admins.admin');
    }
    //Productos
    // public function showCreateProduct(){
    //     return view('admins.create-products');
    // }

    //Usuarios
    public function showEmployeesList(){
        return view('admins.show-employees');
    }
    public function showClientsList(){
        return view('admins.show-clients');
    }

    public function showProducts(){
        $products = App\Products::all();
        return $products;
        //return view('admins.show-products');
    }
}
