<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'phone', 'address', 'address_nb', 'zip', 'city',
        'img_receipt', 'img_ean', 'img_box', 'legal_1', 'legal_2', 'legal_3', 'legal_4', 'token'];

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
                        case 'firstname':
                        case 'lastname':
                        case 'email':
                        case 'phone':
                        case 'address':
                        case 'address_nb':
                        case 'zip':
                        case 'city':
                        case 'img_receipt':
                        case 'img_ean':
                        case 'img_box':
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
                    case 'firstname':
                    case 'lastname':
                    case 'email':
                    case 'phone':
                    case 'address':
                    case 'address_nb':
                    case 'zip':
                    case 'city':
                    case 'img_receipt':
                    case 'img_ean':
                    case 'img_box':
                        $query->where($column, 'LIKE', "%$value%");
                        break;
                }
            }
        }

        return $query;
    }
}
