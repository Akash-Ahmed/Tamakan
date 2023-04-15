<?php

namespace App\Http\Controllers;

use App\Models\Categories\Categories;
use App\Models\Products\Products;
use App\Models\Token\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;

class OpenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {

        $product = Products::orderBy('id', 'DESC')->limit(8)->get();
        $category = Categories::all();

        return view('front.home',compact(['product','category']));
    }


    public function all_products()
    {
        $product = Products::latest()->paginate(8);
        $category = Categories::all();

        return view('front.all_product',compact(['product','category']));
    }

    public function search_product(Request $request)
    {
        $category = Categories::all();

        $product = Products::where([
            ['category', '=',$request->name],
            ['brand', '=',$request->subcategories],
        ])->latest()->paginate(8);

        return view('front.all_product',compact(['product','category']));

    }

    public function test()
    {

        return view('front.home');

//        $token = random_int(100000, 999999);
//
//        $data=['name'=>"Akash",'data'=>"Verify Token is ".$token ];
//        $user['to']='rkakash46@gmail.com';
//
//        Mail::send('mail',$data,function ($message) use ($user)
//        {
//            $message->to($user['to']);
//            $message->subject('hello Akash');
//        });
//
//        dd('tested');
//       return view('student_evaluation.layout.master');

    }

    public function index()
    {
        //
    }

    public function registration(Request $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success]);

    }

    public function log_in(Request $request)
    {
        $input = $request->all();

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'] ))){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success]);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
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
        $token = auth()->user()->email_verified_token;

        if ($request->verify_code == $token)
        {
            $admin = User::find(auth()->id());

            $admin->status = '1';

            $admin->update();

            return view('home');

        }
        else
        {
            alert()->warning('Error','Verification code are not correct');
            return redirect()->back();
        }


    }

    public function re_send()
    {
        $admin = User::find(auth()->id());

        $data=['name'=>"Verification Token",'data'=>"Verify Token is ".$admin->email_verified_token ];
        $user['to']= $admin->email;

        Mail::send('mail',$data,function ($message) use ($user)
        {
            $message->to($user['to']);
            $message->subject('Verification Code');
        });

        alert()->success('Send','Verification code ReSend');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
