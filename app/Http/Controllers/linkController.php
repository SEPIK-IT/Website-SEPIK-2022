<?php

namespace App\Http\Controllers;

use App\Models\link;
use Illuminate\Http\Request;

class linkController extends Controller
{
    public function index(){
        $data = link::paginate(15);
        return view('pameranVideo', ['data'=>$data]);
    }
}
