<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeMemberController extends Controller
{
    public function Home()
    {
        $page = 'Member';
        return view('Member.Home.Home', compact('page'));
    }
}
