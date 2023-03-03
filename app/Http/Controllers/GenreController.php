<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Session;
use App\Models\User;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::get();
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id','=',app('App\Http\Controllers\PlaylistSessionController')->getID())->first();
        }
        return view('genre.index', ['genres' => $genres], compact('data'));  
    }
}