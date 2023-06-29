<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comic extends Model
{
    use HasFactory;

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

    protected $casts = [
        'artists' => 'array',
        'writers' => 'array',
    ];

    protected $serializeAttributes = [
        'artists',
        'writers',
    ];

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->serializeAttributes) && is_array($value)) {
            $value = serialize($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->serializeAttributes) && is_string($value)) {
            $value = unserialize($value);
        }

        return $value;
    }
}
