<?php

namespace App\Http\Controllers;

use App\Models\Mashup;
use Illuminate\Http\Request;

class MashupController extends Controller
{
    public function index(){
        $data = mashup::paginate(15);
        return view('mashup', ['data'=>$data]);
    }
}
