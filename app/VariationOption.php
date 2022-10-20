<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class VariationOption extends Model
{
    use HasUuid;

    protected $fillable = ['name'];

    public function findOrCreateOptions($options)
    {
        $optionIds = [];
        foreach ($options as $option) {
            $data = VariationOption::firstOrCreate(['name' => strtoupper($option)]);
            $optionIds[] = (string) $data->id;
        }

        return $optionIds ?? null;
    }
}
