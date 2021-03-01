<?php

namespace App\Listeners\Admin;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Facades\Image;

/**
 * Class ResizeProductImage
 * @package App\Listeners\Admin
 */
class ResizeProductImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Resizing of product image when it is loaded
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $image = Image::make($event->image)->resize(
            config('admin_settings.products.resize_image_width'),
            config('admin_settings.products.resize_image_height')
        );

        // https://stackoverflow.com/questions/42463274/laravel-intervention-saving-image-in-a-specific-disk
        \Storage::disk('public')->put("products_resized/{$event->image->hashname()}", (string) $image->encode());
    }
}
