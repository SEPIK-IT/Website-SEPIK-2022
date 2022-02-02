<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SayembaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $link = "";
        $title = "";
        $humaninterest = "https://docs.google.com/forms/d/e/1FAIpQLScXJy7SSsisq9yAry52qtUoREDd7IcheBjMSqZREeOTxHJkXg/viewform?usp=pp_url";
        $humantitle = "HUMAN INTEREST & STREET PHOTOGRAPHY";
        $video = "https://docs.google.com/forms/d/e/1FAIpQLSf2vhSxQnsNBpSV_nuIT29oziAm5jwYAd2r6U8MxQwOi3qnoA/viewform?usp=pp_url";
        $videotitle = "SHORT CINEMATIC VIDEO COMPETITION";
        $mashup = "https://docs.google.com/forms/d/e/1FAIpQLSfGdICls_orjz1ZIzGf-aKTMlG8GJe4pmSncxm8j2wGOZsZKg/viewform?usp=pp_url";
        $mashuptitle = "MASH-UP LAGU";
        $desain = "https://docs.google.com/forms/d/e/1FAIpQLSf5LwVaFm1Wt8oz3oHcCI3niG6_xzrixRb_S6MyeoFrN7NJ6g/viewform?usp=pp_url";
        $desaintitle = "DESAIN ILUSTRASI";
        switch($id){
            case 1:
                $link = $humaninterest;
                $title = $humantitle;
                return view('gformSayembara', compact('link','title'));
                break;
            case 2:
                $link = $video;
                $title = $videotitle;
                return view('gformSayembara', compact('link','title'));
                break;
            case 3:
                $link = $mashup;
                $title = $mashuptitle;
                return view('gformSayembara', compact('link','title'));
                break;
            case 4:
                $link = $desain;
                $title = $desaintitle;
                return view('gformSayembara', compact('link','title'));
                break;
        }
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
    public function update(Request $request, $id)
    {
        //
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
