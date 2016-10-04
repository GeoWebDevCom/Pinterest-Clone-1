<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User;
use App\Like;
use App\Bookmark;

class ApiLikeController extends Controller
{
    public function addLike($id){

      $user_id = Auth::user()->id;
      $like = Like::firstOrCreate(['user_id' => $user_id,
                                       'bookmark_id' => $id]);
    }

    public function fetchLikes(){
      $bookmarks = Bookmark::all();
      foreach($bookmarks as $bookmark){
        $likes = $bookmark->getLikes();
        $bookmark->likes = $likes;
        //$likes = $bookmark->getLikes();
        // array_push($data, array("likes" => $likes, ));
      }
      return $bookmarks;
    }
}
