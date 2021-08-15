<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
