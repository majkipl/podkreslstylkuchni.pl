<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

/**
 * @method static search($search, $searchable)
 * @method static findOrFail(array|string|null $input)
 * @method static where(string $string, string $string1, int $id)
 * @method static insert(array $productData)
 */
class Product extends Model
{
    protected $fillable = ['id', 'name', 'code', 'type'];

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

    /**
     * @param $query
     * @param $search
     * @param $searchable
     * @return mixed
     */
    public function scopeSearch($query, $search, $searchable)
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    switch ($column) {
                        case 'id':
                            $query->orWhere('id', '=', '%' . $search . '%');
                            break;
                        case 'name':
                        case 'code':
                        case 'type':
                            $query->orWhere($column, 'LIKE', '%' . $search . '%');
                            break;
                    }
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            $filters = json_decode($filter, true);

            foreach ($filters as $column => $value) {
                switch ($column) {
                    case 'id':
                        $query->where('id', $value);
                        break;
                    case 'name':
                    case 'code':
                    case 'type':
                        $query->where($column, 'LIKE', "%$value%");
                        break;
                }
            }
        }

        return $query;
    }
}
