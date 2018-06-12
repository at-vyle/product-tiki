<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait FilterTrait
{
    public static function scopeFilter($query, Request $request) {
        return static::where( function ($query) use ($request) {
            if ($request->category) {
                $query->where('category_id', $request->category);
            }
            if ($request->name) {
                $query->where('name', 'like', '%'.$request->name.'%');
            }
            if ($request->price) {
                $values = explode(",", $request->price);
                $query->where('price', '>', $values[0]);
                if (isset($values[1])) {
                    $query->where('price', '<', $values[1]);
                }
            }
            if ($request->rating) {
                $query->where('avg_rating', '>', $request->rating);
            }
        });
    }
}
