<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jamesh\Uuid\HasUuid;

class HomePage extends Model
{
    use HasUuid, SoftDeletes;

    protected $fillable = ['name', 'status', 'from_date', 'to_date', 'make_view'];


    public function renderRoute($toShow = 'home_page_container')
    {
        return route('home_pages.edit', ['home_page' => $this->id, 'to_show' => $toShow]);
    }

    public function home_page_sections()
    {
        return $this->hasMany(HomePageSection::class);
    }
    
}
