<?php

namespace App\Content;

use App\Tag;
use Illuminate\Support\Facades\DB;

class ContentTag extends ContentType
{
    public $fillable = ['name', 'style', 'background_color', 'background_image', 'hide_in', 'tag_id', 'selected_products', 'order_by'];

    public $name;

    public $style;

    public $background_color;

    public $background_image;

    public $hide_in;

    public $tag_id;

    public $selected_products = [];

    public $order_by;

    public function makeView()
    {
        $styleFileName = $this->getStyleFileName();

        $tag = Tag::find($this->tag_id);

        $products = $tag->product_tags()->limit(10)->get();

        return view('tag_styles.'.$styleFileName, ['products' => $products, 'name' => $this->name]);
    }

    public function getStyleFileName()
    {
        $style = DB::table('tag_section_styles')->where('id', $this->style)->first();

        return $style->file_name;
    }
}
