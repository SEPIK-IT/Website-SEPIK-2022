<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Pesan;

class DonasiController extends Controller
{
    public function index($page = 'index')
    {
        if($page == "index"){
            return view('donasi/index', [
                'total' => Donasi::where('konfirmasi', 1)->sum('nominal'),
                'pesans' => Pesan::all()
            ]);
        }

        if($page == "donasi"){
            if(date('Y-m-d H:i:s') >= date('2022-02-07 00:00:00') && date('Y-m-d H:i:s') < date('2022-03-05 00:00:00') or true){
                return view('donasi/donasi');
            }else{
                return redirect('/donasi');
            }
        }

        if($page == "admin"){
            return view('donasi/admin', [
                'donasis' => Donasi::select("*")
                            ->orderBy('konfirmasi', 'desc')
                            ->orderBy('created_at', 'desc')
                            ->get()
            ]);
        }

        return view('donasi/' . $page);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nominal' => 'required',
            'sumber'=> 'required',
            'nrp' => 'required',
            'bukti' => 'required|image',
            'pesan' => ''
        ]);

        $validatedData['bukti'] = $request->file('bukti')->store('bukti-transfer');

        Donasi::create($validatedData);

        //kalo pesannya gak kosong baru diinsert
        if($validatedData['pesan'] != ''){
            Pesan::create($validatedData);
        }

        return redirect('/donasi/suwun');
    }
}
