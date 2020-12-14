<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',[
            "route_name" => "categories",
            "page_name" => "Categories",
            "page_title" => "",
            "categories" => $categories
        ]);
    }
    public function edit($id){
        $category = Category::query()->where('id','=',$id)->first();
        return view('admin.categories.edit',[
            "route_name" => "categories",
            "page_name" => "Categories",
            "page_title" => "",
            "category" => $category
        ]);
    }
    public function update($id, Request $request)
    {
        $request->validate(['name' => "required|unique:category,name,".$id.",id"]);

        $category = Category::query()->findOrFail($id);

        if (empty($category)) {
            return redirect(route('categories'))->withErrors(['Group not found']);
        }
        $data = $request->only(['name']);

        $categoryUpdate = Category::query()->where('id', $id)->update($data);

        if (!$categoryUpdate) {
            return redirect(route('category.edit', ['id' => $id]))->withErrors(['Update category failed']);
        }

        return redirect(route('categories.edit', ['id' => $id]))->with('success','Update successfully!');
    }
    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        $deleteResult = $category->delete();
        if(!$deleteResult)
        {
            return redirect()->back()->with('error','Can not delete');
        }
        return redirect()->back()->with('success','Delete successfully!');
    }


    public function create()
    {
        return view('admin.categories.create', [
            "page_name" => "Create New Category",
            "page_title" => "",
            "route_name" => "categories",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category',
        ],
        [
            'name.required'=>'Bạn phải nhập name',
            'name.unique' => 'Tên đã tồn tại'
        ]
        );
        $data = $request->only(['name']);
        $category = Category::query()->create($data);

        if (!$category->exists) {
            return redirect(route('categories.create'))->withErrors(['Create category failed']);
        }

        return redirect(route('categories.index'));
    }
}
