<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'image_path',
        'min_to_read',
        'user_id',
    ];
}
