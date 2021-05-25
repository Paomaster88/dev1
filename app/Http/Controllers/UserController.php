<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            request()->session()->flash('error', 'ข้อมูลไม่ครบถ้วน');
            return back();
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $cnt_user = User::where(["email" => $email])->count();
        if (($cnt_user) == 1) {
            $user = User::where(["email" => $email])->first();
            if ($password == $user->password) {
                request()->session()->flash('success', 'เข้าสู่ระบสำเร็จ');
                Auth::login($user);
                $request->session()->put('data', $request->input());
                return view('userinformation')->with('user', $user);
            } else {
                request()->session()->flash('error', 'เข้าสู่ระบไม่สำเร็จ');
                return view('login');
            }
        } else {
            request()->session()->flash('error', 'ข้อมูลบัญชีไม่ถูกต้อง');
            return view('login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            request()->session()->flash('error', 'ข้อมูลไม่ครบถ้วน');
            return back();
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $check = User::where('email', $email)->count();

        if ($check == 0) {
            $userdata = new User();
            $userdata->email = $email;
            $userdata->password = $password;
            $userdata->save();

            $user = User::where('email', $email)->first();
            if ($user) {
                request()->session()->flash('success', 'ลงทะเบียนเรียบร้อยแล้ว กรุณาเข้าสู่ระบบ');
                return view('login');
            } else {
                request()->session()->flash('success', 'มีผู้ใช้อีเมลล์นี้เเล้ว');
                return view('login');
            }
        } else {
            request()->session()->flash('error', 'กรุณาลองอีกครั้ง!');
            return back();
        }
    }
    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'ออกจากระบบเรียบร้อยแล้ว');
        return  view('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return  view('userinformation', compact('user'));
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
        // dd($request->all());
        $user = User::where("id", $id)->first();
        $validator = Validator::make($request->all(), [
            'branch' => 'required',
            'firstname_th' => 'string|required',
            'lastname_th' => 'string|required',
            'firstname' => 'string|nullable',
            'lastname' => 'string|required',
            'spell_name' => 'string|required',
            'image' => 'string|required',
        ]);
        if ($validator->fails()) {
            request()->session()->flash('success', 'ข้อมูลไม่ครบถ้วน');
            return view('userinformation')->with('user', $user);
        }
        $branch = $request->input('branch');
        $firstname_th = $request->input('firstname_th');
        $lastname_th = $request->input('lastname_th');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $spell_name = $request->input('spell_name');
        $image = $request->input('image');

        if ($user) {
            $updateUser = User::where("id", $id)->update((['branch' => $branch, 'firstname_th' => $firstname_th, 'lastname_th' => $lastname_th, 'lastname' => $lastname, 'firstname' => $firstname, 'spell_name' => $spell_name, 'image' => $image]));
        }
        if ($updateUser) {
            request()->session()->flash('success', 'อัพเดทข้อมูลสำเร็จ');
            $request->session()->put('data', $request->input());
            return redirect()->route('home')->with('user', $user);
        } else {
            request()->session()->flash('error', 'อัพเดทข้อมูลไม่สำเร็จ');
            return view('userinformation')->with('user', $user);
        }
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
