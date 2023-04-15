<?php

namespace App\Http\Controllers;

use App\Models\Products\Products;
use App\Models\Products\ProductsOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Products::where([
            ['id', '=',$id],
        ])->first();

        return view('front.ProductOrder.ProductDetails',compact('product'));
    }

    public function check_out(Request $request)
    {
        $product = ProductsOrder::where([
            ['user_id','=',Auth::user()->id],
        ])->get();

        foreach ($product as $products)
        {
            $products->shipping_address = $request->shipping_address;
            $products->status = '1';
            $products->save();
        }
        alert()->success('successfully','Product add successfully');
        return redirect()->to('/');
    }

    public function check_list()
    {
        if (Auth::user())
        {
        $order =DB::table('products_orders')
            ->join('products','products_orders.product_id', '=','products.id')
            ->join('users','products_orders.user_id', '=','users.id')
            ->select('products.title','products.price','products.thumbnail','products.stock',
                'products.brand','products.category','products_orders.total_number','products_orders.status','products_orders.shipping_address',
                'users.name','users.email','users.phone','products_orders.total_price',
                'users.id','products.id','products_orders.id')->where([
                ['products_orders.user_id','=',Auth::user()->id],
                ['products_orders.status','=','0']
            ])->get();


        $amount = $order->sum('total_price');


        return view('front.ProductOrder.check_out',compact(['order','amount']));
        }
        else{
            alert()->warning('Please Login','Login First');
            return redirect()->back();
        }

    }

    public function user_order_info()
    {

        if (Auth::user()->is_admin =1)
        {

            $order =DB::table('products_orders')
                ->join('products','products_orders.product_id', '=','products.id')
                ->join('users','products_orders.user_id', '=','users.id')
                ->select('products.title','products.price','products.thumbnail','products.stock',
                    'products.brand','products.category','products_orders.total_number','products_orders.status','products_orders.shipping_address',
                    'users.name','users.email','users.phone',
                    'users.id','products.id','products_orders.id')->get();

            return view('front.ProductOrder.user_order_info',compact('order'));
        }
        else
        {
            $order =DB::table('products_orders')
                ->join('products','products_orders.product_id', '=','products.id')
                ->join('users','products_orders.user_id', '=','users.id')
                ->select('products.title','products.price','products.thumbnail','products.stock',
                    'products.brand','products.category','products_orders.total_number','products_orders.status','products_orders.shipping_address',
                    'users.name','users.email','users.phone','products_orders.total_price',
                    'users.id','products.id','products_orders.id')->where([
                    ['products_orders.user_id','=',Auth::user()->id],
                ])->get();

            return view('front.ProductOrder.user_order_info',compact('order'));
        }
    }

    public function add_to_card( Request $request, $id)
    {

        if (Auth::user())
        {
        $productOrder = Products::find($id);

        $productprice = $productOrder->price * $request->total_number;

        ProductsOrder::insert([
            'product_id' => $id,
            'total_number' => $request->total_number,
            'total_price' => $productprice,
            'user_id' => auth()->user()->id,
            'created_at' => Carbon::now()
        ]);

        alert()->success('successfully','Product add successfully');
        return redirect()->back();
        }
        else{
            alert()->warning('Please Login','Login First');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products\ProductsOrder  $productsOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsOrder $productsOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products\ProductsOrder  $productsOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsOrder $productsOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products\ProductsOrder  $productsOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsOrder $productsOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products\ProductsOrder  $productsOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsOrder $productsOrder)
    {
        //
    }
}
