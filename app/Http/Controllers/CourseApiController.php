<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseApiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $courses = Course::withCount('students')->get()->map(function($course) use ($user) {
            return [
                'title' => $course->title,
                'price' => $course->price,
                'enrolled_students_count' => $course->students_count,
                'is_enrolled' => $user->courses->contains($course->id),
            ];
        });

        return response()->json($courses);
    }
}
