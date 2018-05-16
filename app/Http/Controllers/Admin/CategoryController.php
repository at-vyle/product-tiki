<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
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
        $listCategories = Category::paginate( config('define.page_length') );
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
        $category = new Category();
	    $category->name = $request->input('name');
        $category->parent_id = $request->parent_id;
	    if($category->save()) {
	      $listCategories = Category::paginate( config('define.page_length') );
	      $data['listCategories'] = $listCategories;
	      return view('admin.pages.categories.index', $data);
	    } else {
	      return view('admin.pages.categories.create');
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request get request
     * @param int                      $id      category's id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        dd($id);
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
        dd($id);
    }
}
