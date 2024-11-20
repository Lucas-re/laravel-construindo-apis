<?php

namespace App\Models;

use Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nome']; 
    // protected $appends = ['links'];

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
    // }    // public function links(): Attribute
    // {
    //     return new Attribute(
    //         get: fn () => [
    //             [
    //                 'rel' => 'self',
    //                 'url' => "/api/series/{$this->id}/seasons"
    //             ],
    //             [
    //                 'rel' => 'seasons',
    //                 'url' => "/api/series/{$this->id}/seasons"
    //             ],
    //             [
    //                 'rel' => 'episodes',
    //                 'url' => "/api/series/{$this->id}/episodes"
    //             ],
    //         ],
    //     );
    // }

    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/series/{$this->id}/seasons"
                ],
                [
                    'rel' => 'seasons',
                    'url' => "/api/series/{$this->id}/seasons"
                ],
                [
                    'rel' => 'episodes',
                    'url' => "/api/series/{$this->id}/episodes"
                ],
            ],
        );
    }
}
