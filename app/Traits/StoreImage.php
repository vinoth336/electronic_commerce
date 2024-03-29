<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

trait StoreImage {

    public $customImageField;

/**
     * Store uploaded Testimonial image
     *
     * @param $Testimonial
     * @param $request
     * @return bool
     */
    public function storeImage($image, $thumbnailSize = null)
    {

        info('File Param ' . $this->fileParamName);

        if ($image) {
            $name = null;
            if($image){
                $name = time(). "_" . $image->getClientOriginalName();
                $storagePath = public_path('web/images/' . $this->storagePath);
                $this->makeFolder($storagePath);
                if(!empty($thumbnailSize)) {
                    $this->saveThumbnails($image, $thumbnailSize, $name);
                }
                if($this->resizeImage ?? false ){
                    $this->resize($image, $this->resizeValue, $name, $storagePath);
                } else {
                    $img = Image::make($image->getRealPath(), function($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $filePath = $storagePath . "/".  $name;
                    $img->save($filePath);
                    //remove_image_background($filePath);
                }
            }
            $this->unlinkImage($this->getOriginal($this->fileParamName));
            if($this->customImageField) {
                $this->{$this->customImageField} = $name;
            } else {
                $this->{$this->imageFieldName} = $name;
            }

            return true;
        } elseif (request()->input('remove_image')) {
            $this->unlinkImage($this->getOriginal($this->fileParamName));

            return true;
        }

        return false;
    }

    public function unlinkImage($image)
    {
        $existing_file = public_path('web/images/' . $this->storagePath . "/") . $image;
        $existing_fileThumbnail = public_path('web/images/' . $this->storagePath . '/thumbnails/' ) . $image;
        info("Thumbnails : " . $existing_fileThumbnail);
        if (file_exists($existing_file)) {
            @unlink($existing_file);
        } else {
            info(" File is not Exists " . $existing_file);
        }

        if (file_exists($existing_fileThumbnail)) {
            @unlink($existing_fileThumbnail);
        } else {
            info(" File Thumbnails is not Exists " . $existing_fileThumbnail);
        }


        return true;
    }

    public function resize($image, $resizeValue, $name, $storagePath)
    {
        $this->makeFolder($storagePath);
        $img = Image::make($image->getRealPath())->resize($resizeValue['width'], $resizeValue['height'], function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $filePath = $storagePath . '/' . $name;
        $img->save($filePath);
        //remove_image_background($filePath);
    }

    public function saveThumbnails($image, $thumbnailSize, $name)
    {
        //$image = public_path('web/images/' . $this->storagePath . '/') . $name ;
        $thumbnailpath = public_path('web/images/' . $this->storagePath . '/thumbnails') ;
        $this->makeFolder($thumbnailpath);
        $img = Image::make($image->getRealPath())->resize($thumbnailSize['width'], $thumbnailSize['height'], function($constraint) {
            //$constraint->aspectRatio();
            //$constraint->upsize();
        });
        $filePath = $thumbnailpath . '/' . $name;
        $img->save($filePath);
        //remove_image_background($filePath);
    }


    public function storeCustomImage($image, $customFieldName, $thumbnailSize = null) {
        $this->customImageField = $customFieldName;
        $this->storeImage($image, null);
    }

    public function makeFolder($filePath)
    {
        if(!File::exists($filePath)) {
            File::makeDirectory($filePath);
        }
    }
    
}
