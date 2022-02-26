<?php

namespace App\Http\Controllers;

use App\Models\ZoopikRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoopikRegistrationController extends Controller
{
    //
    public function index()
    {
        $zoopikRegistrationExist = ZoopikRegistration::where('user_id', Auth::user()->id)->first();

        $userRegistered = false;
        if ($zoopikRegistrationExist != null) {
            $userRegistered = true;
        }

        return view('zoopikRegistration', [
            'username' => Auth::user()->name,
            'userRegistered' => $userRegistered
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'asalUniv' => 'required',
            'ktm' => 'required|image',
            'foto' => 'required|image',
            'nominal' => 'required|numeric|min: 15000',
            'buktiTransfer' => 'required|image'
        ]);

        $ktm = uniqid() . '.' . $request->file('ktm')->getClientOriginalName();
        $foto = uniqid() . '.' . $request->file('foto')->getClientOriginalName();
        $buktiTransfer = uniqid() . '.' . $request->file('buktiTransfer')->getClientOriginalName();

        $ktmPath = $request->file('ktm')->storeAs('img/zoopikRegistration/ktm', $ktm, 'public');
        $photoPath = $request->file('foto')->storeAs('img/zoopikRegistration/foto3x4', $foto, 'public');
        $transferPath = $request->file('buktiTransfer')->storeAs('img/zoopikRegistration/buktiTransfer', $buktiTransfer, 'public');

        ZoopikRegistration::create([
            'nama_lengkap' => Auth::user()->name,
            'nrp' => $request->nrp,
            'asalUniv' => $request->asalUniv,
            'path_img_ktm' => $ktmPath,
            'path_img_foto' => $photoPath,
            'nominal_pembayaran' => $request->nominal,
            'path_img_bukti_transfer' => $transferPath,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/zoopiksplashscreen');
    }
}
