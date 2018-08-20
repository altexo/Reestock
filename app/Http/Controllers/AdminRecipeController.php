<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminRecipeController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');
    }
	public function create()
	{
		return view('admins.create-recipe');
	}
}