<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('auth.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {

        if($request->hasFile('avatar')){
            $avatarName = time().'.'.request()->avatar->extension();
            request()->avatar->move(public_path('images/users/'), $avatarName);
            $request['avatar'] = $avatarName;
            // dd($avatarName);
        }
        $user = User::find($user);
        $user->avatar = $avatarName;
        $user->save();

        return back();
    }
}
