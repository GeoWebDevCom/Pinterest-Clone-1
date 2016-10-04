<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Like;

class Bookmark extends Model
{
    //
    public function getLikes(){
      $id = $this->id;
      $likes = Like::where('bookmark_id', $id)->count();
      return $likes;
    }
}
