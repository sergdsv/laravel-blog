<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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

        $user = User::find($user);

        if($request->hasFile('avatar')){

            Storage::delete('images/users/' . $user->avatar);
            $avatarName = time().'.'.request()->avatar->extension();
            request()->avatar->move(public_path('images/users/'), $avatarName);
            $image = Image::make('images/users/' . $avatarName);
            $image->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save('images/users/' . $avatarName);
            $request['avatar'] = $avatarName;
        }

        $user->avatar = $avatarName;
        $user->save();

        return back();
    }
}
