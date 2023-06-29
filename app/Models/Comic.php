<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'series',
        'thumb',
        'price',
        'type',
        'sale_date',
        'artists',
        'writers',
    ];

    public function getWritersAttribute($value)
    {
        return unserialize($value);
    }

    public function getArtistsAttribute($value)
    {
        return unserialize($value);
    }

    public function setWritersAttribute($value)
    {
        $this->attributes['writers'] = serialize($value);
    }

    public function setArtistsAttribute($value)
    {
        $this->attributes['artists'] = serialize($value);
    }
}
