<?php

namespace App\Content;

use Illuminate\Support\Facades\DB;

class ContentBanner extends ContentType
{

   public $fillable = ['name', 'style', 'background_color', 'background_image', 'hide_in', 'banner_info', 'target_urls'];

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

      return view('banner_styles.make_view.' . $styleFileName, ['bannerInfo' => $this->banner_info, 'targetUrlInfo' => $this->target_urls]);
   }


   public function getStyleFileName()
   {
      $style = DB::table('banner_section_styles')->where('id', $this->style)->first();

      return $style->file_name;
   }
}
