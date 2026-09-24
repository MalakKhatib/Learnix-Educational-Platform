<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'student') {

            $layout = 'student.layouts.app';

        } elseif ($user->role == 'teacher') {

            $layout = 'teacher.layouts.app';

        } else {

            $layout = 'admin.layouts.app';

        }

        return view(
            'profile.index',
            compact(
                'user',
                'layout'
            )
        );
    }

public function edit()
{
    $user = auth()->user();

    if ($user->role == 'student') {

        $layout = 'student.layouts.app';

    } elseif ($user->role == 'teacher') {

        $layout = 'teacher.layouts.app';

    } else {

        $layout = 'admin.layouts.app';

    }

    return view(
        'profile.edit',
        compact(
            'user',
            'layout'
        )
    );
}

public function changePassword()
{
    $user = auth()->user();

    if ($user->role == 'student') {

        $layout = 'student.layouts.app';

    } elseif ($user->role == 'teacher') {

        $layout = 'teacher.layouts.app';

    } else {

        $layout = 'admin.layouts.app';

    }

    return view(
        'profile.change-password',
        compact(
            'user',
            'layout'
        )
    );
}

public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([

        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'university_id' => 'nullable|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);


    if ($request->hasFile('profile_image'))
    {
        $image = $request->file('profile_image')
            ->store('profiles', 'public');

        $user->profile_image = $image;
    }


    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->university_id = $request->university_id;

    $user->save();


    return redirect('/profile')
        ->with(
            'success',
            'تم تحديث المعلومات الشخصية بنجاح.'
        );
}



public function updatePassword(Request $request)
{
    $user = auth()->user();

    $request->validate([

        'current_password' => 'required',

        'password' => 'required|min:8|confirmed',

    ]);


    if (
        !Hash::check(
            $request->current_password,
            $user->password
        )
    )
    {
        return back()->withErrors([

            'current_password' =>
            'كلمة المرور الحالية غير صحيحة.'

        ]);
    }


    $user->password =
        Hash::make(
            $request->password
        );

    $user->save();


    return redirect('/profile')
        ->with(
            'success',
            'تم تغيير كلمة المرور بنجاح.'
        );
}
}