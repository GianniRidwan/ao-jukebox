<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;
use Session;
use App\Models\User;
use App\Models\PlaylistSessionController;

class SongController extends Controller
{
    public function index($id) {
        $songs = Song::get();
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id','=',app('App\Http\Controllers\PlaylistSessionController')->getID())->first();
            $playlistname = app('App\Http\Controllers\PlaylistSessionController')->getplName();
            $exPlayLists = Playlist::get();
        }
        return view('song.index', ['songs' => $songs], compact('id','data','playlistname','exPlayLists'));  
    }
}