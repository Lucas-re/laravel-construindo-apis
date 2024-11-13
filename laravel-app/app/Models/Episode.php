<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps = false;
    protected $cast = [
        'watched' => 'boolean'
    ];

    public function season()
    {
        $this->belongsTo(Season::class);
    }

    // protected function watched(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($watched) => (bool) $watched,
    //         set: fn ($watched) => (bool) $watched,
    //     );
    // }
}
