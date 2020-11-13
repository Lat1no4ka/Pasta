<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Paste extends Model
{
    public function getData($req)
    {
        foreach ($req as $key => $val) {
            foreach ($val as $index => $value) {
                $Data[$index] = $value;
            }
        }
        $Data = $this->getEmail($Data);
        $Data['DateOfExist'] = $this->getDateOfExist($Data['DateOfExist']);
        $Data['link'] = $this->getLink();
        $Data = $this->getTextandTitle($Data);
        return $Data;
    }
    public function getEmail($Data)
    {
        if (Auth::check()) {
            $Data['email'] = Auth::user()->email;
        }

        return $Data;
    }
    public function getDateOfExist($Data)
    {
        switch ($Data) {
            case 1:
                $Date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10 minutes"));
                break;
            case 2:
                $Date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +60 minutes"));
                break;
            case 3:
                $Date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +720 minutes"));
                break;
            case 4:
                $Date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +10080 minutes"));
                break;
            case 5:
                $Date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +43800 minutes"));
                break;
            case 6:
                $Date = date("Y-m-d H:i:s", strtotime('1999-00-00 00:00:00'));
                break;
        }
        return $Date;
    }
    public function getLang($Data)
    {
    }
    public function getAcces($Data)
    {
    }
    public function getTextandTitle($Data)
    {
        if ($Data['text'] == "") {
            unset($Data['text']);
        }
        if ($Data['title'] == "") {
            unset($Data['title']);
        }
        return $Data;
    }
    public function getLink()
    {
        $link = md5(strtotime('now'));
        return $link;
    }
}
