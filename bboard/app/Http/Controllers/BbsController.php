<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bb;
class BbsController extends Controller
{
    public function index()
    {
        /*$bbs=Bb::latest()->get(); //It's about showing all items
        $s="Объявление\r\n\r\n";
        foreach($bbs as $bb){
            $s .= $bb->title . "\r\n";
            $s .= $bb->price . "руб.\r\n";
            $s .= "\r\n";
        }
        return response($s)->header('Content-Type', 'text/plain');*/
        $context = ['bbs' => Bb::latest()->get()];
        return view('index', $context);
    }

    public function detail(Bb $bb){
//        $bb = Bb::find($bb); //getting detail by id
//        $s = $bb->title . "\r\n\r\n";
//        $s .=$bb->content . "\r\n";
//        $s .= $bb->price . "руб . \r\n";

//        return response($s)->header('Content-Type', 'text/plain');
        return view('detail', ['bb'=>$bb]);
    }
}
