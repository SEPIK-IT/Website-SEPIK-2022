<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;
 
class DownloadController extends Controller
{
    public function downloadvideo()
    {
        $path=public_path('/pdf/sopvideo.pdf');
        return response()->download($path); 
    }
    public function downloadhuman()
    {
        $filepath = public_path().'/pdf/sophuman.pdf';
        return Response::download($filepath); 
    }
    public function downloadmashup()
    {
        $filepath = public_path().'/pdf/sopmashup.pdf';
        return Response::download($filepath); 
    }
    public function downloaddesain()
    {
        $filepath = public_path().'/pdf/sopdesain.pdf';
        return Response::download($filepath); 
    }
    public function downloadlaporan()
    {
        $filepath = public_path().'/docx/lembarorisinalitas.docx';
        return Response::download($filepath); 
    }
}