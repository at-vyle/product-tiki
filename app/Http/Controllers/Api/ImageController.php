<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $img = Image::findOrFail($id);
            $product = Product::with('images')->findOrFail($img->product_id);
            if (count($product->images) <= 1) {
                return response(trans('product.update.delete_last_file_fail'), 400);
            }
            $img->delete();

            return response()->json($img);
        } catch (ModelNotFoundException $e) {
            return response(trans('messages.delete_fail'), 400);
        }
    }
}
