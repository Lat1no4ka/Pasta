<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paste;

class ShowPasteControler extends Controller
{
    public function loadPaste()
    {
        return view('home',['paste' => Paste::all()]);
    }
}
