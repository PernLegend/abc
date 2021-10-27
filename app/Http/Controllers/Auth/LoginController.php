<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'Tel' => 'required | max:10 | min:10',
            'password' => 'required | min:8',
        ], [
            'Tel.max' => 'ເບີໂທຕ້ອງປະກອບດ້ວຍຕົວເລກ 10 ຫຼັກ',
            'Tel.min' => 'ເບີໂທຕ້ອງປະກອບດ້ວຍຕົວເລກ 10 ຫຼັກ',
            'Tel.required' => 'ກະລຸນາປ້ອນເບີໂທ',
            'password.required' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
        ]);

        if (Auth()->attempt(array('Tel' => $request['Tel'], 'password' => $request['password']))) {
            if (auth()->user()->isAdmin == 'Admin') {
                return redirect()->route('Admin');
            } else {
                return redirect()->route('Member');
            }
        } else {
            return redirect()->route('login')->with('error', "ຊື່ຜູ້ໃຊ້ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ");
        }
    }
}
