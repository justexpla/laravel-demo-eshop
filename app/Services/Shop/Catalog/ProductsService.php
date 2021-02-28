<?php

namespace App\Services\Shop\Catalog;

use App\Events\Admin\ProductImageWasChanged;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductsService
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $data = $this->generateModelData($request);

        $result = Product::create($data);

        //events

        return $result;
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return bool
     */
    public function update(Product $product, Request $request)
    {
        $data = $this->generateModelData($request);

        if ($data['image'] && $product->image !== $data['image']) {
            $file = $request->file('image');

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

        // events

        return $result;
    }

    /**
     * Get model's data from request and generate missing parts
     *
     * @param Request $request
     * @return array
     */
    private function generateModelData(Request $request): array
    {
        $data = $request->except(['_token']);

        if (! $data['slug']) {
            $data['slug'] = Str::slug($data['title']);
        }

        if (! $data['description']) {
            $data['description'] = __('admin.products.no_description_placeholder');
        }

        if (($file = $request->file('image'))->isFile()) {
            $data['image'] = $file->getFilename();
        }

        $data['is_active'] = ($data['is_active']) ? true : false;

        return $data;
    }

    public function storeImage(UploadedFile $file): bool|string
    {
        $fileName = \Storage::disk('public')->putFile('products', $file);

        return $fileName;
    }
}
