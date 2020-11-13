<?php

namespace App\Http\Controllers;

use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Paste;

class PasteController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $Data = $request->all();
            $Paste = new Paste();

            $Data = $Paste->getData($Data);

            foreach ($Data as $key => $val) {
                $Paste->$key = $val;
            }
            $Paste->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return  $errorInfo;
        }
        return $Data;
    }
    public function loadPaste()
    {
        if(Auth::check()){
        $myPaste = Paste::orderBy('id', 'desc')->where('email', Auth::user()->email)->where('DateOfExist', '>', date("Y-m-d H:i:s",strtotime('now')))->orwhere('DateOfExist', '<', date("2001-03-10 17:16:18"))->take(10)->get();
        }else{
            $myPaste = null;
        }
        return view('home', ['paste' =>  Paste::orderBy('id', 'desc')->where('access','0')->where('DateOfExist', '>', date("Y-m-d H:i:s",strtotime('now')))->orwhere('DateOfExist', '<', date("2001-03-10 17:16:18"))->take(10)->get(),
        'mypaste' =>  $myPaste
        ]);
    }
    public function getPage($link)
    {

        $Data = Paste::where('link', $link)->get();
        $resData = $Data[0];
        if(Auth::check()){
        $myPaste = Paste::orderBy('id', 'desc')->where('email', Auth::user()->email)->where('DateOfExist', '>', date("Y-m-d H:i:s",strtotime('now')))->orwhere('DateOfExist', '<', date("2001-03-10 17:16:18"))->take(10)->get();
        }else{
            $myPaste = null;
        }
        return view('detailPaste', [
            'Data' => $resData,
            'paste' => Paste::orderBy('id', 'desc')->where('access','0')->where('DateOfExist', '>', date("Y-m-d H:i:s",strtotime('now')))->orwhere('DateOfExist', '<', date("2001-03-10 17:16:18"))->take(10)->get(),
            'mypaste' => $myPaste
        ]);
    }
   
}
