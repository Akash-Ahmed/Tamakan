<?php

namespace App\Http\Controllers;

use App\Models\Services\Services;
use App\Models\Token\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $token = Token::with(['services'])->get();

//        dd($token);

        return view('token.index',compact('token'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Services::where('status','=','1')->get();

        return view('token.add',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latest_token = Token::latest()->first();

        $servide_id = Services::where('id','=',$request->service)->first();

        $servide_time = $servide_id->time_period;

        $token_id = $latest_token->t_id+1;

        $user_id = Auth::id();
//        dd($user_id);

//        dd($servide_id);

        $token = new Token();
        $token->t_id = $token_id;
        $token->name = $request->name;
        $token->number = $request->phone;
        $token->service_id = $request->service;
        $token->service_time = $servide_time;
        $token->user_id = $user_id;
//        $token->end_time = $request->department;
//        $token->extra_time = $request->department;
        $token->created_at = Carbon::now();
//        $token->updated_at = Carbon::now();
//
//        if(!empty($last_img)) {
//            $student->image = $last_img;
//        }

        if($token->save()){
            alert()->success('successfully','Student add successfully');
            return redirect()->back();
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Token\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function show(Token $token)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Token\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function edit(Token $token)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Token\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token $token)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Token\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = Token::find($id)->delete();

        return redirect()->back();
    }
}
