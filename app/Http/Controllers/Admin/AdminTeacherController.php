<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    public function create()
    {
        return view('admin.create-teacher');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'university_id' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'role' => 'teacher',

            'phone' => $request->phone,
            'address' => $request->address,
            'university_id' => $request->university_id,
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'تم إنشاء حساب المعلم بنجاح');
    }


    
    public function index()
{
    $teachers = User::where('role', 'teacher')->get();

    return view('admin.teachers.index',
        compact('teachers'));
}


public function edit(User $teacher)
{
    return view('admin.teachers.edit',
        compact('teacher'));
}


public function update(Request $request, User $teacher)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable'
    ]);

    $teacher->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    return redirect('/admin/teachers')
        ->with('success', 'تم تعديل المعلم');
}


public function destroy(User $teacher)
{
    $teacher->delete();

    return back()
        ->with('success', 'تم حذف المعلم');
}
}