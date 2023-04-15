<?php

namespace App\Http\Controllers;

use App\Models\Categories\Categories;
use App\Models\Products\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::all();


        return view('products.index',compact('product'));

    }
    public function Category_search()
    {
        $category = Categories::all();

        return view('products.search',compact('category'));
    }

    public function category(Request $request)
    {
        $product = Products::where([
            ['category', '=',$request->name],
            ['brand', '=',$request->subcategories],
        ])->get();

        return view('products.index',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();

        return view('products.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function p_store(Request $request)
    {
        if($request->hasFile('thumbnail')) {
            $image       = $request->file('thumbnail');
//            $name = time().'.'.$image->getClientOriginalExtension();
            $name = time().rand(1,50).'.'.$image->extension();
//            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(770, 450);
            $image->move(public_path('image/product/'), $name);
//            $image_resize->save(public_path('image/product/'.$name));
            $last_img ='image/product/'.$name;
        }

        $files = [];
        if($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time().rand(1,50).'.'.$file->extension();
//                $name = time().'.'.$file->getClientOriginalExtension();
//                $image_resize = Image::make($file->getRealPath());
//                $image_resize->resize(770, 450);
                $file->move(public_path('image/product/'), $name);
//                $image_resize->save(public_path('image/product/'.$name));
                $files[] = 'image/product/'.$name;
            }
        }


        Products::insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discountPercentage' => $request->discountPercentage,
            'rating' => $request->rating,
            'stock' => $request->stock,
            'brand' => $request->subcategories,
            'category' => $request->name,
            'thumbnail' => $last_img,
            'images' => json_encode($files),
            'created_at' => Carbon::now()
        ]);

        alert()->success('successfully','Product add successfully');
        return redirect()->back();
    }

    public function store()
    {
        $api_url = 'https://dummyjson.com/products';

        $response = Http::get($api_url);

        $data = json_decode($response->body());


        echo "<pre>";

        foreach($data as $posts)
        {
            foreach($posts as $post) {

                Products::updateOrCreate(
                 ['id' => $post->id],
                [

                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'price' => $post->price,
                    'discountPercentage' => $post->discountPercentage,
                    'rating' => $post->rating,
                    'stock' => $post->stock,
                    'brand' => $post->brand,
                    'category' => $post->category,
                    'thumbnail' => $post->thumbnail,
                    'images' => json_encode($post->images),
                ],
                );
            }
            dd('Data Stored');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $category = Categories::all();

        return view('products.edit',compact(['product','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::where([
            ['id', '=',$id],
        ])->first();



        $images = json_decode($product->images);

//        dd($images);

        $old_image = $product->thumbnail;
        unlink($old_image);

        foreach ($images as $imagess)
        {
            unlink($imagess);
        }


        $product->delete();

        alert()->success('successfully','Product Delete successfully');
        return redirect()->back();
    }
}
