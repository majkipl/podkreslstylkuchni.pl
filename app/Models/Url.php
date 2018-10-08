<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Url extends Model
{
    protected $fillable = ['id', 'url', 'product_id'];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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

    /**
     * @param string $productCode
     * @return mixed
     */
    public static function getByProductCode(string $productCode)
    {
        $cacheKey = (new self)->getTable() . '_' . $productCode;

        return Cache::remember($cacheKey, now()->addDay(1), function () use($productCode) {
            return self::with('product')
                ->whereHas('product', function ($query) use ($productCode) {
                    $query->where('code', '=', $productCode);
                })->pluck('url');
        });
    }
}
