<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;

class VariationAttribute extends Model
{
    use HasUuid, SoftDeletes;

    public function findOrCreateAttributes($attributes)
    {
        $attributes = [];
        foreach ($attributes as $attribute) {
            $data = VariationAttribute::firstOrCreate(['name' => strtoupper($attribute)]);
            $attributeIds[] = (string) $data->id;
        }

        return $attributeIds ?? null;
    }
}
