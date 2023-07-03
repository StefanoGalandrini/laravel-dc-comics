<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Comic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type',
        'artists',
        'writers',
    ];

    public function getArtistsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setArtistsAttribute($value)
    {
        $this->attributes['artists'] = implode(',', $value);
    }

    public function getWritersAttribute($value)
    {
        return explode(',', $value);
    }

    public function setWritersAttribute($value)
    {
        $this->attributes['writers'] = implode(',', $value);
    }
}
