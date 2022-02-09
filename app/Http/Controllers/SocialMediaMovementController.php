<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMediaMovement;

class SocialMediaMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movements = SocialMediaMovement::all();
        
        return view('movements', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return 0;
        //
        $id = $request['id'];
        $data = $request['data'];
        $changeTo = $request['changeTo'];

        $hasil = Donasi::where('id', $id)
                ->update(['verification_status' => $changeTo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


//example
// public function update(Request $request, $id)
//     {
//         //                 model
//         $moviereviews = MovieReview::where('moviereview_id', $id);
//         $moviereviews->update([
//             'moviereview_user'=>$request->moviereview_user,
//             'moviereview_rating'=>$request->moviereview_rating,
//             'moviereview_comment'=>$request->moviereview_comment,
//             'movie_id'=>$request->movie_id_key,
//             'moviereview_date'=>Carbon::now()->format('Y-m-d H:i:s')
//         ]);
//         $movies = Movie::where('movie_id', $request->movie_id_key)->first();
//         return view('moviesdetail',compact('movies'));
//     }