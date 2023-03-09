<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "songs";
    protected $fillable = [
       'song',
       'artist',
       'gender',
       'youtube',
       'image',
       'listened',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function getImageAttribute($value)
    // {
    //     return '/images' . $value;
    // }
}

