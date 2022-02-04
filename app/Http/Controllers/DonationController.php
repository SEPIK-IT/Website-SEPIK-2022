<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Message;

class DonationController extends Controller
{
    public function admin(){
        return view('donasi/admin', [
            'donations' => Donation::select("*")
                        ->orderBy('confirmation', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->get()
        ]);
    }
    public function index($page = 'index')
    {  
        if($page == "index"){
            return view('donasi/index', [
                'total' => Donation::where('confirmation', 1)->sum('nominal'),
                'messages' => Message::all()
            ]);
        }

        if($page == "donasi"){
            if(date('Y-m-d H:i:s') >= date('2022-02-07 00:00:00') && date('Y-m-d H:i:s') < date('2022-03-05 00:00:00') or true){
                return view('donasi/donasi');
            }else{
                return redirect('/donasi');
            }
        }

        // if($page == "admin"){
        //     return view('donasi/admin', [
        //         'donations' => Donation::select("*")
        //                     ->orderBy('confirmation', 'desc')
        //                     ->orderBy('created_at', 'desc')
        //                     ->get()
        //     ]);
        // }

        return view('donasi/' . $page);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nominal' => 'required',
            'source'=> 'required',
            'identification' => 'required',
            'proof' => 'required|image',
            'message' => ''
        ]);

        $validatedData['proof'] = $request->file('proof')->store('bukti-transfer');

        Donation::create($validatedData);

        //kalo pesannya gak kosong baru diinsert
        if($validatedData['message'] != ''){
            Message::create($validatedData);
        }

        return redirect('/donasi/suwun');
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        $data = $request['data'];
        $changeTo = $request['changeTo'];

        $hasil = Donation::where('donation_id', $id)
                ->update(['confirmation' => $changeTo]);

        // return [$id, $data, $changeTo];
        return $hasil;
    }
}
