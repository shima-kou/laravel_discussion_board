<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['post_id','user_id'];

    public function board()
    {
      return $this->belongsTo(Board::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
