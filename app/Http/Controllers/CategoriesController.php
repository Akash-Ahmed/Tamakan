<?php

namespace App\Http\Controllers;

use App\Models\Categories\Categories;
use App\Models\Products\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Categories::all();

        return view('categori.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categori.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categories::insert([
            'name' => $request->name,
            'subcategories' => $request->subcategories,
            'created_at' => Carbon::now()
        ]);

        alert()->success('successfully','Category Creat');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);

        return view('categori.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = Categories::find($id);

        $category->name = $request->name;
        $category->subcategories = $request->subcategories;

        if($category->save()){
            alert()->success('successfully','Category edit successfully');
            return redirect()->to('/admin/categories/list');
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->delete();

        alert()->success('successfully','Category Delete successfully');
        return redirect()->back();
    }
}
