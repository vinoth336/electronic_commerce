<?php

namespace App\Content;

class ContentType
{

    protected $fillable = [];


    public function setAttributes($request)
    {
        foreach ($this->getFillable() as $key) {
            $this->{$key} = $request[$key] ?? null;
        }
    }

    public function getAttributes()
    {
        $data = [];
        foreach ($this->getFillable() as $key) {
            $data[$key] = $this->{$key} ?? null;
        }

        return $data;
    }

    public function getFillable()
    {
        return $this->fillable;
    }
}
