<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiController extends Controller
{
    public function index($page = 'index')
    {
        return view('donasi/' . $page);
    }
}
