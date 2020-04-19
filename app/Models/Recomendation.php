<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'rating'
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
