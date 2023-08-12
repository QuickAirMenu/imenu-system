<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $data['user'] = User::findOrfail(Auth::id());
       $data['pagename'] = __('dash.account');

       return view('account.index',$data);

    }

    public function update(Request $request)
    {
        $user= User::findOrFail(Auth::id());

        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->name= $request->name;
        $user->email= $request->email;
        $user->save();

        toast('تمت التعديل بنجاح', 'success');
        return redirect()->route('my-account');
    }
}
