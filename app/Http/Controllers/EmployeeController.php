<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Employee;

class EmployeeController extends Controller{

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

    	return view('employee.index', compact('result'));
	}

	public function create(){
		return view('employee.create');
	}

	public function store(Request $request){

		$rules = [
            'fullname' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'phone' => 'required|string|max:13|unique:employees',
            'email' => 'required|string|email|unique:employees',
            'address' => 'required',
        ];

         $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
			Employee::create([
				"fullname"=>$request->get('fullname'),
				"gender"=>$request->get('gender'),
				"birth_date"=>$request->get('birth_date'),
				"phone"=>$request->get('phone'),
				"email"=>$request->get('email'),
				"address"=>$request->get('address')
			]);
			\Session::flash('message', 'Your item has been saved.');
			return redirect()->route('employee.index');
        }

	}

	public function show($id){
		$employee = Employee::findOrFail($id);
		return view('employee.show', compact('employee'));
	}

	public function edit($id){
		$employee = Employee::findOrFail($id);
		return view('employee.edit', compact('employee'));
	}

	public function update(Request $request, $id){

		$rules = [
            'fullname' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'phone' => 'required|string|max:13|unique:employees,phone,' . $id,
            'email' => 'required|email|unique:employees,email,' . $id,
            'address' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        	 return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
        	$employee = Employee::findOrFail($id);
			$employee->fullname = $request->get('fullname');
			$employee->gender = $request->get('gender');
			$employee->birth_date = $request->get('birth_date');
			$employee->phone = $request->get('phone');
			$employee->email = $request->get('email');
			$employee->address = $request->get('address');
			$employee->save();
			\Session::flash('message', 'Your item has been updated.');
			return redirect()->route('employee.index');
        }
		
	}

	public function destroy($id){
		Employee::findOrFail($id)->delete();
		\Session::flash('message', 'Your item has been deleted.');
		return redirect()->route('employee.index');
	}

}