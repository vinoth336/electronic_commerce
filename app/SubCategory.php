<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class SubCategory extends Model
{
    use HasUuid;

    protected $fillable = ['slug_name', 'name', 'sequence', 'category_id'];

    public static function boot()
    {
        parent::boot();

        static::created(function () {
            setSiteMenuValueInCache(getSiteMenus());
        });

        static::updated(function () {
            setSiteMenuValueInCache(getSiteMenus());
        });
        static::deleted(function () {
            setSiteMenuValueInCache(getSiteMenus());
        });
    }
}
