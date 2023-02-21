<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Hash;
use Session;

class GenreController extends Controller
{
    public function genrePage() {
        $genres = Genre::get();
        $data = array();
        return view('genre.genre', ['genres' => $genres], compact('data'));  
    }
}
