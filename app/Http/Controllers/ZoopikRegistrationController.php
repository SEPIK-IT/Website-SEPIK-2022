<?php

namespace App\Http\Controllers;

use App\Models\ZoopikRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoopikRegistrationController extends Controller
{
    //
    public function index(){
        $zoopikRegistrationExist = ZoopikRegistration::where('user_id', Auth::user()->id)->first();

        $userRegistered = false;
        if($zoopikRegistrationExist != null){
            $userRegistered = true;
        }

        return view('zoopikRegistration', [
            'username'=>Auth::user()->name,
            'userRegistered'=>$userRegistered
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nrp'=>'required|numeric',
            'asalUniv'=>'required',
            'ktm'=>'required|image',
            'foto'=>'required|image',
            'nominal'=>'required|numeric|min: 15000',
            'buktiTransfer'=>'required|image'
        ]);

        $ktm = uniqid() . '.' . $request->file('ktm')->getClientOriginalName();
        $foto = uniqid() . '.' . $request->file('foto')->getClientOriginalName();
        $buktiTransfer = uniqid() . '.' . $request->file('buktiTransfer')->getClientOriginalName();
        
        $request->file('ktm')->storeAs('public/img/zoopikRegistration/ktm', $ktm);
        $request->file('foto')->storeAs('public/img/zoopikRegistration/foto3x4', $foto);
        $request->file('buktiTransfer')->storeAs('public/img/zoopikRegistration/buktiTransfer', $buktiTransfer);

        $zoopikRegistration = ZoopikRegistration::create([
            'nama_lengkap'=>Auth::user()->name,
            'nrp'=>$request->nrp,
            'asalUniv'=>$request->asalUniv,
            'path_img_ktm'=>$ktm,
            'path_img_foto'=>$foto,
            'nominal_pembayaran'=>$request->nominal,
            'path_img_bukti_transfer'=>$buktiTransfer,
            'user_id'=>Auth::user()->id
        ]);

        return redirect('/zoopiksplashscreen');
    }
}
