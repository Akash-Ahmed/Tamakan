<?php

namespace App\Http\Controllers;

use App\Models\Services\Services;
use App\Models\Token\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_1()
    {
        $token = Token::where('service_id','=','1')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_2()
    {
        $token = Token::where('service_id','=','2')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_3()
    {
        $token = Token::where('service_id','=','3')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_4()
    {
        $token = Token::where('service_id','=','4')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_5()
    {
        $token = Token::where('service_id','=','5')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_6()
    {
        $token = Token::where('service_id','=','6')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_7()
    {
        $token = Token::where('service_id','=','7')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_8()
    {
        $token = Token::where('service_id','=','8')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_9()
    {
        $token = Token::where('service_id','=','9')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_10()
    {
        $token = Token::where('service_id','=','10')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
    }
    public function index_11()
    {
        $token = Token::where('service_id','=','11')->with(['services'])->get();

//        dd($token);

        return view('services.index',compact('token'));
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
     * @param  \App\Models\Services\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        //
    }
}
