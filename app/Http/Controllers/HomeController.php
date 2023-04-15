<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_profile($id)
    {
        $user = User::find($id);

       return view('setting.user_profile_update',compact('user'));
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;

        $user->save();
        alert()->success('successfully','User Information Updated');
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->status == 1)
        {

            return view('home');
        }

        $admin = User::find(auth()->id());

        if (empty($admin->email_verified_token))
        {
            $token = random_int(100000, 999999);

            $admin->email_verified_token = $token;

            $admin->update();
        }

        $data=['name'=>"Verification Token",'data'=>"Verify Token is ".$admin->email_verified_token ];
        $user['to']= $admin->email;

        Mail::send('mail',$data,function ($message) use ($user)
        {
            $message->to($user['to']);
            $message->subject('Verification Code');
        });

        return view('account_verify');

    }

    public function adminHome()
    {

        if(Auth::user()->status == 1)
        {
            return view('home');
        }

        $admin = User::find(auth()->id());

        if (empty($admin->email_verified_token))
        {
            $token = random_int(100000, 999999);

            $admin->email_verified_token = $token;

            $admin->update();
        }

        $data=['name'=>"Verification Token",'data'=>"Verify Token is ".$admin->email_verified_token ];
        $user['to']= $admin->email;

        Mail::send('mail',$data,function ($message) use ($user)
        {
            $message->to($user['to']);
            $message->subject('Verification Code');
        });

        return view('account_verify');

    }

    public function a_list()
    {
        $admin = User::all();

        return view('setting.admin_list',compact('admin'));
    }
    public function a_add()
    {
        return view('setting.admin_add');
    }
    public function a_store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|digits:11',
            'is_admin' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_admin' => $request->is_admin,
            'status' => $request->status,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        alert()->success('successfully','Category Creat');
        return redirect()->back();


    }
    public function a_destroy($id)
    {

        $admin = User::find($id)->delete();

        return redirect()->back();
    }

    public function status_update($id)
    {

        $admin = User::find($id);

        if ($admin -> status == 1)
        {
            $admin->status = '0';
            $admin->update();
        }
        else{
            $admin->status = '1';
            $admin->update();
        }

        return redirect()->back();


    }

    public function role_update($id)
    {
        $admin = User::find($id);

        if ($admin -> is_admin == 1)
        {
            $admin->is_admin = '0';
            $admin->update();
        }
        else{
            $admin->is_admin = '1';
            $admin->update();
        }
        return redirect()->back();
    }


}
