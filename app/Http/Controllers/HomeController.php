<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Employee;

class HomeController extends Controller
{
    
   public function index(){

		$q = \Input::get('search');
		$result = Employee::where('fullname', 'LIKE', '%' . $q . '%')
			->orWhere('gender', 'LIKE', '%' . $q . '%')
			->orWhere('birth_date', 'LIKE', '%' . $q . '%')
			->orWhere('phone', 'LIKE', '%' . $q . '%')
			->orWhere('email', 'LIKE', '%' . $q . '%')
			->orWhere('address', 'LIKE', '%' . $q . '%')
			->orderBy('id', 'desc')
			->paginate(10);

		$result->appends(['search' => $q]);
    	return view('home', compact('result'));
	}
}
