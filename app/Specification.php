<?php

namespace App;

use App\Traits\HasContentType;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;
use Illuminate\Support\Str;


class Specification extends Model
{
    use HasUuid, HasContentType;

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

    public function specification_values()
    {
        return $this->hasMany(SpecificationValue::class, 'product_specification_values', 'id');
    }
}
