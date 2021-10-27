<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseUserController extends Controller
{
    public function Course()
    {
        $Links = Link::all();
        $data = Course::all();
        $active = 'all';
        $page = 'Course';
        return view('Users.Courses.Course', compact('page', 'Links', 'active', 'data'));
    }

    public function Detail($Course)
    {
        $data = Course::find($Course);
        $page = 'Course';
        return view('Users.Courses.Detail', compact('page', 'data'));
    }
}
