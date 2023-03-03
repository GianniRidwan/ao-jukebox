<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class PlaylistSessionController extends Controller {
        // function to add song to session 
        public function add(Request $request){
            $request->session()->push('InPlayList' ,$request['getSong']);
        }
    
        // function to delete song from the session 
        public function delete($id){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $playlistSec = Session::get('InPlayList');
            $arSearch = array_search($id, $playlistSec);
            $sessions = session()->pull('InPlayList',[]);
             
            if(($key = array_search($id, $sessions)) !== false){
               unset($sessions[$key]);
            }  
            session()->put('InPlayList', $sessions);
        }
    
        // function to get the user id 
        public function getID(){
            $id = Session::get('loginId');
            return $id;
        }
    
        // function to get the playlist from the session 
        public function getList(){
           $list = Session::get('InPlayList');
           return $list;
        }
    
        // function to get playlist name from session 
        public function getplName(){
            $name = Session::get('PlayList');
            return $name;
        }
        
        // function to delete all songs from session 
        public function deleteSession(){
            session::pull('InPlayList');
        }
        
        // function to delete user id from the session 
        public function deleteSessionId(){
            session::pull('loginId');
        }
}