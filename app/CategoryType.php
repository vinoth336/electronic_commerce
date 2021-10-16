<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;

class CategoryType extends Model
{
    use SoftDeletes, HasUuid;


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active_type_only', function (Builder $builder) {
            $builder->where('status', 1);
            $builder->orderBy('sequence', 'asc');
        });

        static::created(function() {
            setSiteMenuValueInCache(getSiteMenus());
        });

        static::updated(function() {
            setSiteMenuValueInCache(getSiteMenus());
        });
        static::deleted(function() {
            setSiteMenuValueInCache(getSiteMenus());
        });
    }

    public function categories()
    {
        return $this->hasMany(Services::class, 'category_type_id', 'id');
    }
}
