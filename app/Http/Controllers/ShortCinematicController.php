<?php

namespace App\Http\Controllers;

use App\Models\ShortCinematic;
use Illuminate\Http\Request;

class ShortCinematicController extends Controller
{
    public function index(){
        $data = shortcinematic::paginate(15);
        return view('shortCinematic', ['data'=>$data]);
    }
}
