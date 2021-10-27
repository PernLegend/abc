<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function Home()
    {
        $page = '';
        return view('Admin.Home.Home', compact('page'));
    }
}
