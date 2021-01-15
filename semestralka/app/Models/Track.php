<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Track extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist',
        'name',
        'genre',
        'album_id'
    ];
    
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class); 
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
