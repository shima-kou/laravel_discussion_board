<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Board extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'user_id' => 'required',
        'title' => 'required|max:140',
        'content' => 'required|max:140',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
      return $this->hasMany(Like::class, 'post_id');
    }

    public function is_liked_user()
    {
      $id = Auth::id();

      $users = array();
      foreach($this->likes as $like) {
        array_push($users, $like->user_id);
      }

      if (in_array($id, $users)) {
        return true;
      } else {
        return false;
      }
    }
}
