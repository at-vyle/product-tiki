<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\EditCategoryRequest;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listCategories = Category::with('parent')
            ->withCount('products')
            ->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
                return $query->orderBy($request->sortBy, $request->dir);
            })
            ->paginate(config('define.category.limit_rows'));
        $listCategories->appends(request()->query());
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
    public function store(CategoryRequest $request)
    {
        if (!$request->parent_id) {
            $request['level'] = 0;
        } else {
            $parentLvl = Category::find($request->parent_id)->level;
            $request['level'] = $parentLvl + 1;
        }
        if (Category::create($request->all())) {
            return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.add'));
        } else {
            return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Category $category category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('level', '<=', $category->level)->get();
        $data['category'] = $category;
        $data['categories'] = $categories;
        return view('admin.pages.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request  get request
     * @param App\Models\Category      $category category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        if ($request->parent_id) {
            $parentLvl = Category::find($request->parent_id)->level;
            if ($category->level < $parentLvl) {
                return back()->with('message', __('category.admin.message.edit_fail'));
            }
            $category->level = ++$parentLvl;
        } else {
            $category->level = 0;
        }
        $category->save();
        return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Category $category category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            session()->flash('message', __('category.admin.message.del'));
        } catch (ModelNotFoundException $e) {
            DB::rollback();
            session()->flash('message', __('category.admin.message.del_fail'));
        }
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::whereId($id)
            ->with(['parent', 'children' => function ($query) {
                $query->with('children');
            }])->first();
        $data['category'] = $category;
        return view('admin.pages.categories.show', $data);
    }
}
