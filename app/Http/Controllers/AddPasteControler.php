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
            $Data = $request->all();
            $Paste = new Paste();
            
            $Data = $Paste->getData($Data);
            
            foreach($Data as $key => $val){
                $Paste->$key = $val;
            }
            $Paste->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return  $errorInfo;
        }
        return $Data;
        
    }
}
