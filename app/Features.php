<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;
use Illuminate\Support\Str;

class Features extends Model
{
    use HasUuid;

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'slug_name'];
    protected $casts = ['name' => 'string'];
    
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
           if($model->slug_name == null) {
               $model->slug_name = str_slug($model->name);
           }
           if($model->id == null) {
                $model->id = (string) Str::uuid();
           }
        });
    }
}
