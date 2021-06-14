<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;

class Variation extends Model
{
    use HasUuid, SoftDeletes;

    protected $fillable = ['name', 'slug_name', 'status'];

    public function createVariation($data)
    {
        $variation = Variation::create([
            'name' => $data['name'],
            'slug_name' => $data['slug_name'],
            'status' => $data['status'] ? 1 : 0,
        ]);

        return $variation;
    }

    public function variation_options()
    {
        return $this->hasMany(VariationOption::class, 'variation_id', 'id');
    }

    public function variation_option()
    {
        return new VariationOption();
    }

    public function variation_option_values()
    {
        return $this->belongsToMany(VariationOption::class, 'variation_option_values', 'variation_id', 'variation_option_id');
    }
}
