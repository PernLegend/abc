<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function RoleAdmin()
    {
        $Users = DB::table('Users')->select('*')->where('isAdmin', 'Admin')->get();
        $page = 'Role';
        $Active = 'Admin';
        return view('Admin.Role.Admin', compact('page', 'Users', 'Active'));
    }

    public function RoleMember()
    {
        $Users = DB::table('Users')->select('*')->where('isAdmin', 'Member')->get();
        $page = 'Role';
        $Active = 'Member';
        return view('Admin.Role.Member', compact('page', 'Users', 'Active'));
    }

    public function RoleUpdate(Request $request)
    {

        User::find($request->id)->update([
            'isAdmin' => $request->isAdmin,
        ]);
        return back()->with('UpdateAdmin', 'ປ່ຽນແປງສິດການໃຊ້ງານສຳເລັດແລ້ວ');
    }
}
