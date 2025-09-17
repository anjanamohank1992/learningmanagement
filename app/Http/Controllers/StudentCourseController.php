<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();
        $enrolledCourses = Auth::user()->courses()->pluck('course_id')->toArray();

        return view('student.courses.index', compact('courses', 'enrolledCourses'));
    }

    public function enroll(Course $course)
    {
        $user = Auth::user();

        if (!$user->courses->contains($course->id)) {
            $user->courses()->attach($course->id);
        }

        return redirect()->back()->with('success', 'Enrolled successfully!');
    }
    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses;

        return view('student.courses.my-courses', compact('courses'));
    }

}
