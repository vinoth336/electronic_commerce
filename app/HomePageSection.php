<?php

namespace App;

use App\Traits\HasContentType;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class HomePageSection extends Model
{
    use HasUuid, HasContentType;

    protected $fillable = ['home_page_id', 'type', 'content', 'position', 'name'];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $this->castContentToJsonString($value);
    }

    public function getContentAttribute()
    {
        return $this->normalizeContent($this->attributes['content']);
    }

    public function scopewhereHomePage($query, $homePageId)
    {
        return $this->where('home_page_id', $homePageId);
    }
}
