<?php

namespace App\Http\Controllers;

use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Paste;

class AddPasteControler extends Controller
{
    public function getData(Request $request)
    {
        try {
            $DateCreated = date('Y-m-d H:i:s');
            $Data = $request->all();
            $insert = new Paste();
            $insert->text = $Data[0]['paste'];
            $insert->title = $Data[1]['title'];
            $insert->lang = $Data[2]['lang'];
            $insert->DateOfExist = $DateCreated;
            //$Data[3]['DateOfExist'];
            $insert->access = $Data[4]['access'];
            $insert->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return  $errorInfo;
        }
        return $Data;
        
    }
}
