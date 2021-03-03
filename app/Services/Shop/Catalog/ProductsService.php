<?php

namespace App\Services\Shop\Catalog;

use App\Events\Admin\ProductImageWasChanged;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Storage;

class ProductsService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $result = Product::create($data);

        return $result;
    }

    /**
     * @param array $data
     * @param Product $product
     * @return bool
     */
    public function update(Product $product, array $data)
    {
        if ($data['image'] && $product->image !== $data['image']) {
            $file = request()->file('image');

            $this->storeImage($file);

            $data['image'] = $file->hashName();

            event(new ProductImageWasChanged($product, $file));
        }

        $result = $product->update($data);

        return $result;
    }

    /**
     * @param Product $product
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Product $product)
    {
        $result = $product->delete();

        return $result;
    }

    /**
     * Loads image to a disk
     *
     * @param UploadedFile $file
     * @return bool|string
     */
    public function storeImage(UploadedFile $file): bool|string
    {
        $fileName = Storage::disk('public')->putFile('products', $file);

        return $fileName;
    }
}
