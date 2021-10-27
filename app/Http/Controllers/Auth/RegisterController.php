<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Gender' => ['required', 'string', 'max:255'],
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'NickName' => ['max:255'],
            'Tel' => ['required', 'string', 'min:10', 'max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Whatsapp' => ['required', 'string', 'max:10'],
            'Wechat' => ['max:255'],
            'Facebook' => [ 'max:255'],
            'Province' => ['required', 'string', 'max:255'],
            'District' => ['required', 'string', 'max:255'],
            'Village' => ['required', 'string', 'max:255'],
            'BirthDay' => ['required', 'string', 'max:255'],
        ],[
            'Gender.required' => 'ກະລຸນາເລືອກເພດ',
            'Gender.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'Gender.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'FirstName.required' => 'ກະລຸນາປ້ອນ ຊື່',
            'FirstName.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'FirstName.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'LastName.required' => 'ກະລຸນາປ້ອນ ນາມສະກຸນ',
            'LastName.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'LastName.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'NickName.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'Tel.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ ເບີໂທ',
            'Tel.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'Tel.min' => 'ເບີໂທຕ້ອງປະກອບດ້ວຍ 10 ຕົວອັນສອນ',
            'Tel.max' => 'ເບີໂທຕ້ອງປະກອບດ້ວຍ 10 ຕົວອັນສອນ',
            'Tel.unique' => 'ເບີໂທນີ້ມີໃນລະບົບແລ້ວ',

            'password.required' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
            'password.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'password.max' => 'ເບີໂທຕ້ອງປະກອບດ້ວຍຕົວເລກ 10 ຫຼັ້ກ',
            'password.confirmed' => 'ລະຫັດຜ່ານບໍ່ກົງກັນ',

            'Whatsapp.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ Whatsapp',
            'Whatsapp.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'Whatsapp.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 10 ຕົວອັນສອນ',

            'Wechat.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'Facebook.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
            'Facebook.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'Province.required' => 'ກະລຸນາເລືອກແຂວງ',
            'Province.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'Province.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'District.required' => 'ກະລຸນາເລືອກເມືອງ',
            'District.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'District.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'Village.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນບ້ານ',
            'Village.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'Village.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',

            'BirthDay.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ ວັນ ເດືອນ ປີ ເກີດ',
            'BirthDay.string' => 'ຕ້ອງໃສ່ຂໍ້ຄວາມເທົ່ານັ້ນ',
            'BirthDay.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັນສອນ',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Gender' => $data['Gender'],
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'NickName' => $data['NickName'],
            'Tel' => $data['Tel'],
            'password' => Hash::make($data['password']),
            'Whatsapp' => $data['Whatsapp'],
            'Wechat' => $data['Wechat'],
            'Facebook' => $data['Facebook'],
            'Province' => $data['Province'],
            'District' => $data['District'],
            'Village' => $data['Village'],
            'BirthDay' => $data['BirthDay'],
            'isAdmin' => 'Member',
        ]);
    }
}
