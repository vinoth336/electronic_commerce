<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecificationValue extends Model
{
    protected $fillable = ['id', 'product_id', 'specification_id', 'specification_value_id', 'block_id', 'sequence', 'highlighted'];

    public function specifications()
    {
        return $this->belongsTo(Specification::class, 'specification_id', 'id');
    }

    public function specification_values()
    {
        return $this->belongsTo(SpecificationValue::class, 'specification_value_id', 'id');
    }
}
