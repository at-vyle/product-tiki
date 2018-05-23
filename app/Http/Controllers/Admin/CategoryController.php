<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = Category::paginate(config('define.category.limit_rows'));
        $data['listCategories'] = $listCategories;
        return view('admin.pages.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategoriesParent = Category::get();
        $data['listCategoriesParent'] = $listCategoriesParent;
        return view('admin.pages.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request get request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequests $request)
    {
        $input = $request->except('_token', '_method');
        $category = Category::create($input);
        if ($category) {
            $listCategories = Category::paginate(config('define.category.limit_rows'));
            $data['listCategories'] = $listCategories;
            $data['msg'] = __('category.admin.message.add');
            return view('admin.pages.categories.index', $data);
        } else {
            $data['msg'] = __('category.admin.message.add_fail');
            return view('admin.pages.categories.create', $data);
        }
    }
}
