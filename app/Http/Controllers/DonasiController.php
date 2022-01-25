<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Pesan;

class DonasiController extends Controller
{
    public function index($page = 'index')
    {
        if($page = "inex"){
            return view('donasi/index', [
                'total' => Donasi::where('konfirmasi', 1)->sum('nominal'),
                'pesans' => Pesan::all()
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
