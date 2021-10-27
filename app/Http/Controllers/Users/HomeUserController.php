<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Course;


class HomeUserController extends Controller
{
    public function Home()
    {
        $Slider = Slider::all();
        $data = Course::all();
        $page = 'Home';
        return view('Users.Home.Home', compact('page', 'Slider', 'data'));
    }
}
