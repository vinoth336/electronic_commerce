<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureValue extends Model
{
    protected $fillable = ['id', 'product_id', 'feature_id', 'feature_value_id', 'block_id', 'sequence', 'highlighted'];

    public function features()
    {
        return $this->belongsTo(Features::class, 'feature_id', 'id');
    }

    public function feature_values()
    {
        return $this->belongsTo(FeatureValue::class, 'feature_value_id', 'id');
    }
}
