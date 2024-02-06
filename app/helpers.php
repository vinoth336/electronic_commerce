<?php

use App\CartSettings;
use App\CategoryType;
use App\NotificationManager;
use App\SiteInformation;
use App\UserOrder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

function getSiteMenus()
{
    $categoriesType = CategoryType::with(['categories' => function ($services) {
        $services->with('subcategories')->orderBy('sequence');
    }])->get();

    return $categoriesType;
}

function getCartSettings()
{
    $cart_settings = CartSettings::first();

    return  [
        'free_deliver_min_amt' => $cart_settings->min_home_delivery_order_amount,
        'shop_pickup_min_amt' => $cart_settings->min_shop_pickup_order_amount,
    ];
}

function setMailNotificationDetailsInCache($ttl = 5000)
{
    $mailNotification = NotificationManager::first();
    $data = [
        'order_create' => $mailNotification->order_create,
        'order_cancel' => $mailNotification->order_cancel,
    ];
    Cache::forget('email_notification');
    Cache::add('email_notification', $data, $ttl);
}

function setSiteMenuValueInCache($categories, $ttl = 5000)
{
    Cache::forget('site_menu_items');
    Cache::add('site_menu_items', $categories, $ttl);
}

function setSiteInformationInCache()
{
    Cache::forget('site_information');
    Cache::add('site_information', SiteInformation::first(), 5000);
}

function orderNumber()
{
    $latest = UserOrder::latest()->first();
    if (! $latest) {
        return date('Y').'00125';
    }

    $string = preg_replace("/[^0-9\.]/", '', $latest->order_no);

    return sprintf('%04d', $string + 1);
}

function filterRemoveEmptyValues($input)
{
    if (! is_array($input)) {
        $temp = $input;
        $input = [$temp];
    }
    $newValues = [];

    foreach ($input as $key => $value) {
        if ($value != '' && $value != 'all') {
            $newValues[$key] = $value;
        }
    }

    return $newValues;
}

function setCartSettings($values, $ttl = 5000)
{
    Cache::forget('cart_settings');
    Cache::add('cart_settings', $values, $ttl);
}

function remove_image_background($image, $bgcolor = ['red' => '255', 'green' => '255', 'blue' => '255'], $fuzz = '90')
{
    info('convert '.$image.' -fuzz 90% -transparent white '.$image);
    $image = shell_exec('convert '.$image.' -fuzz 90% -transparent white '.$image);

    return $image;
}

function getTagSectionStyles()
{
    return DB::table('tag_section_styles')->get();
}

function getBannerSectionStyles()
{
    return DB::table('banner_section_styles')->get();
}

function bannerIsEditMode($mode, $targetClassName)
{
    return $mode == 'edit' ? $targetClassName : null;
}

    /**
     * Search for file and return full path.
     *
     * @param  string  $pattern
     * @return array
     */
    function rglob($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
        }

        return $files;
    }

    /**
     * Load js file from each view subdirectory into public js.
     *
     * @return void
     */
    function load_js_function()
    {
        //call to the previous function that returns all js files in view directory
        $files = rglob(resource_path('views').'/*/*.js');
        foreach ($files as $file) {
            copy($file, base_path('public/js/new.js'));
        }
    }

    function getModelName($model)
    {
        return 'App\\'.$model;
    }

    function getValuesToJson($values)
    {
        return json_encode($values, true);
    }
