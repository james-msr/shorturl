<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * class ShortUrl
 *
 * @property string $real_url
 * @property string $short_url
 * @property string $code
 */
class ShortUrl extends Model
{
    protected $fillable = [
        'real_url',
        'short_url',
        'code'
    ];
}
