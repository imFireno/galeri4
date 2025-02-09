<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $primaryKey = 'foto_id';
    protected $guarded = ['foto_id'];
    protected $timestapms = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }
}
