<?php
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



if(!function_exists('toast'))
{
    function toast($message,$type)
    {
        $msg = "message";
        $tp  = "type";
        session()->flash($msg,$message);
        session()->flash($tp,$type);
    }
}


