<?php

namespace App\Http\Controllers;

use App\Models\illustration;
use Illuminate\Http\Request;

class illustrationController extends Controller
{
    public function index(){
        $data = illustration::get();
        return view('Pameranilustrasi', ['data'=>$data]);
    }
}
