<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thema extends Model
{
    use HasFactory;

    protected $fillable = ['thema'];

    protected $table = 'themas';

    public function woorden()
    {
        return $this->belongsToMany(Woord::class, 'themas_woorden', 'thema_id', 'woord_id');
    }
}
