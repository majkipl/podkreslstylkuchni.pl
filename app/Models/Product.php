<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    protected $fillable = ['id', 'name', 'code'];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function urls(): HasMany
    {
        return $this->hasMany(Url::class);
    }

    /**
     * @return mixed
     */
    public static function getAllCached()
    {
        $cacheKey = (new self)->getTable();

        return Cache::remember($cacheKey, now()->addDay(365), function () {
            return self::all();
        });
    }
}
