<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Woord extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['woord,id'];

    protected $fillable = [
        'woord',
    ];
    protected $table = 'woorden';

    public function thema()
    {
        return $this->belongsToMany(Thema::class,'themas_woorden', 'woord_id', 'thema_id');
    }
}
