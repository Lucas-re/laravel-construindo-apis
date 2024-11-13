<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nome']; 

    public function seasons()
    {
        return $this->hasMany(Season::class, 'serie_id');
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }

    // public function scopeActiveSeries(Builder $queryBuilder)
    // {
    //     return $queryBuilder->where('nome', "Billions");
    // }
}
