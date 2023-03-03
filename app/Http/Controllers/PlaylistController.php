<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SongController;
use Session;
use DB;
use stdClass;
use App\Models\User;
use App\Models\Playlist;
use App\Models\PlaylistSession;
use App\Models\Song;
use PhpParser\Node\Expr\New_;
use App\Http\Controllers\PlaylistSessionController;

class PlaylistController extends Controller {
    // function to add songs to Session 
    public function addSong(Request $request){
        if(Session::has('loginId')){
            $sc = new PlaylistSessionController();
            $sc->add($request);
        }
        return back()->with('success','song has been added');
    }
  
    // function to delete song from temporary session playlist 
    public function deletePlaylist($id){
        if(Session::has('loginId')){
            app('App\Http\Controllers\PlaylistSessionController')->delete($id);
        }
        return redirect('dashboard');
    }
  
    // function to send playlist to database 
    public function savePlaylist(Request $request){
        if(Session::has('loginId')){
            $playlist = new Playlist;
            $playlist->name = $request->name;
            $playlist->user_id = app('App\Http\Controllers\PlaylistSessionController')->getID();
            $playlist->save();
            $maxId = Playlist::max('id');
            $selectedSongs = app('App\Http\Controllers\PlaylistSessionController')->getList();
            if (!empty($selectedSongs)) {
                foreach($selectedSongs as $selected){
                    $joinedTable = new PlaylistSession;
                    $joinedTable->song_id = $selected;
                    $joinedTable->playlist_id = $maxId;
                    $joinedTable->save();
                }
            } 
        app('App\Http\Controllers\PlaylistSessionController')->deleteSession();
        return back()->with('success','your list has been submitted');
        }
    }
    
        // function to return playlists view with all requested data 
        public function playListsIndex(){
            $data = array();
            if(Session::has('loginId')){  
                $data = User::where('id','=',app('App\Http\Controllers\PlaylistSessionController')->getID())->first();
                $playlistsession = PlaylistSession::get();  
                $songs = Song::get();
                $playlists = Playlist::get();
                return view('playlists', compact('data','playlistsession','songs','playlists'));
            }
        }
    
        // function to delete a song from database 
        public function deletePlaylistSong($id,$list){
            PlaylistSession::where([
                ['playlist_id', '=', $list],
                ['song_id', '=', $id]
            ])->delete();
            return redirect('playlists');
        }
    
        // function to delete a playlist and relative data from database 
        public function deleteList($list){
            PlaylistSession::where('playlist_id', '=', $list)->delete();
            Playlist::where('id', '=', $list)->delete();
            return redirect('playlists');
        }
    
        // function to change existed playlist in database 
        public function updateList(Request $request){
            Playlist::where('id',$request->id)->update(['name'=>$request->name]);
            return redirect('playlists');
        }
    
        // function to add new song to a playlist from database 
        public function addSongToPlaylist(Request $request){
            $data = array();
            if(Session::has('loginId')){  
                $data = User::where('id','=',app('App\Http\Controllers\PlaylistSessionController')->getID())->first();
                $sesh = new PlaylistSession;
                $sesh->playlist_id = $request['playlistId'];
                $sesh->song_id = $request['getSong2'];
                $sesh->save();
            }
            return redirect('playlists');
        }
}