<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Hash;
use Session;

class SongController extends Controller
{
    public function index($id) {
        $songs = Song::get();
        $data = array();
        return view('song.index', ['songs' => $songs], compact('id','data'));  
    }
}
