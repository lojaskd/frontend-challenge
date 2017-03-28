<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller {
    function show($id){
    	return view('user.order')->with(['id' => $id]);
    }
}
