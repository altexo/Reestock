<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Importar AUTH
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin');
	}

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	//Validar datos de formulario
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to login
    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
    		{
    			return redirect()->intended(route('admin.dashboard'));
    		}

    	//if not redirect back to the login form
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
