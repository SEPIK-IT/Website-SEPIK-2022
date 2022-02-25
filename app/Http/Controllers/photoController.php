<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;

class photoController extends Controller
{
    public function index(){
        $data = photo::get();
        return view('Pameranfoto', ['data'=>$data]);
    }
}
