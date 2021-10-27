<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;

class RegisterController extends Controller
{
    public function Home()
    {
        $data = Register::all();
        $page = 'Enroll';
        return view('Admin.Register.Home', compact('page', 'data'));
    }

    public function EnrollDetail()
    {
        $page = 'Member';
        return view('Admin.Register.Detail', compact('page'));
    }
}
