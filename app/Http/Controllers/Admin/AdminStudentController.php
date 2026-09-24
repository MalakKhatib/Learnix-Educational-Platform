<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminStudentController extends Controller
{
    public function index()
    {
        $search = request('search');

        $students = User::where('role', 'student')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('university_id', 'like', "%{$search}%");

                });

            })
            ->latest()
            ->paginate(5);

        return view(
            'admin.students.index',
            compact('students', 'search')
        );
    }


    public function destroy(User $student)
    {
        $student->delete();

        return back()->with(
            'success',
            'تم حذف الطالب'
        );
    }
}
