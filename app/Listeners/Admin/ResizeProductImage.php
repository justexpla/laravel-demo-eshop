<?php

namespace App\Listeners\Admin;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\Facades\Image;

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
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $image = Image::make($event->image)->resize(700, 400);

        // https://stackoverflow.com/questions/42463274/laravel-intervention-saving-image-in-a-specific-disk
        \Storage::disk('public')->put("products_resized/{$event->image->hashname()}", (string) $image->encode());
    }
}
