<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Requests\Backend\EditCategoryRequest;
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
        $listCategoriesParent = Category::where('parent_id', null)->get();
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
    public function store(CategoryRequest $request)
    {
        $input = $request->except('_token', '_method');
        $category = Category::create($input);
        if ($category->save()) {
            $listCategories = Category::paginate(config('define.category.limit_rows'));
            $data['listCategories'] = $listCategories;
            $data['msg'] = __('category.admin.message.add');
            return view('admin.pages.categories.index', $data);
        } else {
            return view('admin.pages.categories.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categoryParent = Category::where('parent_id', null)->get();
        $data['category'] = $category;
        $data['categoryParent'] = $categoryParent;
        return view('admin.pages.categories.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request get request
     * @param int                      $id      category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        if ($category->save()) {
            session(['msg' => __('category.admin.message.edit')]);
            return redirect()->route('admin.categories.index');
        } else {
            return view('admin.pages.categories.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Category::where('parent_id', $id)->delete();
        session(['msg' => __('category.admin.message.del')]);
        return redirect()->route('admin.categories.index');
    }
}
