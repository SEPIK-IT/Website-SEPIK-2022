<?php

namespace App\Http\Controllers;

use App\Models\ZoopikRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoopikRegistrationController extends Controller
{
    //
    public function index(){
        return view('zoopikRegistration', [
            'username'=>Auth::user()->name
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nrp'=>'required|numeric',
            'asalUniv'=>'required|string',
            'ktm'=>'required|image',
            'foto'=>'required|image'
        ]);

        $ktm = $request->file('ktm')->getClientOriginalName();
        $foto = $request->file('foto')->getClientOriginalName();
        
        $request->file('ktm')->storeAs('public/img/zoopikRegistration/ktm', $ktm);
        $request->file('foto')->storeAs('public/img/zoopikRegistration/foto3x4', $foto);

        $zoopikRegistration = ZoopikRegistration::create([
            'nama_lengkap'=>Auth::user()->name,
            'nrp'=>$request->nrp,
            'asalUniv'=>$request->asalUniv,
            'path_img_ktm'=>$ktm,
            'path_img_foto'=>$foto,
            'user_id'=>Auth::user()->id
        ]);

        return redirect('/zoopikRegistration');
    }
}
