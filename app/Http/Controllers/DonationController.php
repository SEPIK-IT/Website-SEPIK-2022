<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Validation\Rule;

class DonationController extends Controller
{

    public function index()
    {
        return view('donasi/index', [
            'total' => Donation::where('confirmation', 1)->sum('nominal'),
            'messages' => Donation::where('confirmation', 1)->whereNotNull('message')->get()
        ]);
    }

    public function donate()
    {

        if (date('Y-m-d H:i:s') >= date('2022-02-07 00:00:00') && date('Y-m-d H:i:s') < date('2022-03-05 00:00:00')) {
            return view('donasi/donasi');
        } else {
            return redirect('/donasi');
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'sourceType' => ['required', Rule::in(['umum', 'mahasiswa'])],
            'source' => ['required', Rule::in(['ukp', 'uc', 'wm', 'ubaya',])],
            'origin' => Rule::requiredIf(fn() => $request->input('sourceType') === 'umum'),
            'identification' => 'required',
            'nominal' => ['required', 'gte:10000']
        ]);

        Donation::create([
            'source' => $request->input('sourceType') === 'mahasiswa' ? $request->input('source') : 'umum',
            'origin' => $request->input('sourceType') === 'mahasiswa' ? null : $request->input('origin'),
            'name' => $request->input('name'),
            'nominal' => $request->input('nominal'),
            'proof' => $request->file('proof')->store('donation-transfer-proof', 'public'),
            'identification' => $request->input('identification'),
            'message' => $request->input('message') ?? null,
            'confirmation' => 2
        ]);

        return redirect('/donasi/suwun');
    }
}
