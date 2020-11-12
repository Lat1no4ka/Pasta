<?php

namespace App\Http\Controllers;

use Carbon\Traits\Timestamp;
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
        return view('home', ['paste' => Paste::orderBy('id', 'desc')->take(10)->get()]);
    }
    public function getPage($link)
    {

        $Data = Paste::where('link', $link)->get();
        $resData = $Data[0];
        return view('detailPaste', [
            'Data' => $resData,
            'paste' => Paste::orderBy('id', 'desc')->take(10)->get()
        ]);
    }
}
