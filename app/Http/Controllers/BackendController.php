<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dasboard(){
        return view('backend.pages.dasboard');
    }
}
