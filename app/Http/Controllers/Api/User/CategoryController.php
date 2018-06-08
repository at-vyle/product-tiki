<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesAll = Category::all();
        $categories = Category::where('level', 0)->get();
        $categories = $this->getCategoryChilds($categories, $categoriesAll);
        $maxLevel = Category::max('level');
        $categories['max_level'] = $maxLevel;

        return $this->showAll($categories, Response::HTTP_OK);
    }

    /**
     * Get all childs of categories.
     *
     * @param array $categories    categories level 0
     * @param array $categoriesAll all categories
     *
     * @return array  $categories
     */
    public function getCategoryChilds($categories, $categoriesAll)
    {
        foreach ($categories as $category) {
            $childCategories = [];
            foreach ($categoriesAll as $categoryCheck) {
                if ($category->id == $categoryCheck->parent_id) {
                    array_push($childCategories, $categoryCheck);
                    $category['child_categories'] = $childCategories;
                }
            }
            $this->getCategoryChilds($childCategories, $categoriesAll);
        }
        return $categories;
    }
}
