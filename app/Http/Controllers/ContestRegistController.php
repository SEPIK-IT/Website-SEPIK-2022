<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContestRegistController extends Controller
{
    public function index(){
        return view('contestRegistration', [

        ]);
    }
}
