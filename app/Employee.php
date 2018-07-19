<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{

	protected $table = 'employees';
    protected $fillable = [
        'fullname',
        'gender',
        'birth_date',
        'phone',
        'email',
        'address',
    ];

    public function getFirstName(){
    	$name = $this->fullname;
    	$arr = explode(" ", $name);
    	return count($arr) > 0 ? $arr[0] : $name;
    }
}