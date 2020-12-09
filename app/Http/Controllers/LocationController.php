<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::all();
        return view('admin.locations.index',[
            "route_name" => "locations",
            "page_name" => "Locations",
            "page_title" => "",
            "locations" => $locations
        ]);
    }
    public function edit($id){
        $category = Category::query()->where('id','=',$id)->first();
        return view('admin.categories.edit',[
            "route_name" => "locations",
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

    public function create()
    {
        return view('admin.locations.create', [
            "route_name" => "locations",
            "page_name" => "Create New Locations",
            "page_title" => "",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:location',
        ]);
        $data = $request->only(['name']);
        $location = Location::query()->create($data);

        if (!$location->exists) {
            return redirect(route('locations.create'))->withErrors(['Create location failed']);
        }

        return redirect(route('locations.index'));
    }
}
