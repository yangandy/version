<?php

namespace App\Http\Controllers;

use App\Config;
use App\Part;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $parts = Part::all();
        //dd($parts);
        return view('main.index',['parts' => $parts]);


    }
    public function partdetail($id){



            $parts = Config::where('pid',$id)->get();

            //dd($parts);
            return view('main.partdetail',['parts' => $parts]);

    }
}
