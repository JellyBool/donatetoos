<?php

namespace App\Http\Controllers;

use DB;
use App\Repostory;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function repos()
    {
        $repos =  Repostory::latest()->get();
        $langs = DB::table('repostories')->select('language')->distinct('language')->lists('language');

        return response()->json(['repos'=>$repos,'langs'=>$langs]);
    }

    public function languages()
    {
        return DB::table('repostories')->select('language')->distinct('language')->lists('language');
    }
}
