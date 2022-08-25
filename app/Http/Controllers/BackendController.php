<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function dashboard(){
        return view('backend.pages.dashboard');
    }
    // การอ่านข้อมูล
    public function employee(){
        $employee = DB::table('employees')->where('age','>','18')->get();
        $employee2 = DB::table('employees')->find(5);
        $employee3 = DB::table('employees')->count();

    // นำเข้า
    $data = array(
        'fullname' => 'Samit Koyom',
        'gender' => 'Male',
        'email' => 'samit@email.com',
        'tel' => '0898938889389',
        'age' => 38,
        'address' => '20/2 moo.2 bangkok',
        'avartar' => 'noavatar.jpg',
        'status' => 1
    );
    //$insertemployee = DB::table('employees')->insert($data);
    //$deleteemployee = DB::table('employees')->where('id','=','1002')->delete();
    return $employee;
    }

    public function employeelist(){
        $employeelist = Employee::all();
        //$pagination = Employee::paginate(25);

        // ส่งค่าไป View
        return view('backend.pages.employeelist', compact('employeelist'));
    }

    public function productlist(){
        $productlist = Product::all();

        // ส่งค่าไป View
        return view('backend.pages.productlist', compact('productlist'));
    }
}
