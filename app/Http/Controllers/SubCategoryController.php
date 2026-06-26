<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $sub_cats = Sub_category::all();
        return view('backend.sub-catgory.index', ['items'=>$sub_cats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sub-catgory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sub_cat = new Sub_category();
        $sub_cat->name= $request->name;

        $sub_cat->save();
        return redirect()->route('admin.sub_category.index')->with('success', 'Successfully Sub_cat Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sub_category $sub_category)
    {
        return view('backend.sub-catgory.edit',['item'=>$sub_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sub_category $sub_category)
    {
        $sub_category->name = $request->name;
        $sub_category->update();
        return redirect()->route('admin.sub_category.index')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub_category $sub_category)
    {
         $sub_category->delete();
         return redirect()->route('admin.sub_category.index')->with('success', 'Subcategory Deleted');
    }
}
