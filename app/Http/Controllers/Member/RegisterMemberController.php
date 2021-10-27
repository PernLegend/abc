<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class RegisterMemberController extends Controller
{
    public function Enroll(Request $request)
    {
      
        $data = Course::find($request->id);
        return view('Member.Register.Enroll', compact('data',));
    }

    public function EnrollStore(Request $request)
    {
        $request->validate(
            [
                'Time_Table' => 'required | string',
                'Serial_Course' => 'required | max:255',
                'Price' => 'required | max:255 ',
                'Promotion' => 'max:255',
                'Bill' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
               
            ],
            [
                'Bill.required' => 'ກະລຸນາເລືອກຮູບບິນການຊຳລະເງິນ',
                'Bill.image' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະຮູບພາບເທົ່ານັ້ນ',
                'Bill.mimes' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະ jpg, jpeg, png, svg, gif ເທົ່ານັ້ນ',
                'Bill.max' => 'ຮູບພາບຂະໜາດໃຫຍ່ເກີນ 2mb ບໍ່ອະນຸຍາດໃຫ້ອັບໂຫຼດ',

                'Time_Table.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Time_Table.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',

                'Serial_Course.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Serial_Course.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',

                'Price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Price.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',

                'Promotion.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Promotion.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
            ]
        );

        
        $image = $request->file('Bill');
        $fileName = time() . mt_rand() . '.' . strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath());
        $img->resize();
        $img_path = 'Images/Bill/';
        $full_path = $img_path . $fileName;
        $img->save($img_path . $fileName);

        Order::insert([
            'User_ID' => Auth::user()->id,
            'Time_Table' => $request->Time_Table,
            'Serial_Course' => $request->Serial_Course,
            'Price' => $request->Price,
            'Promotion' => $request->Promotion,
            'Bill' =>  $full_path,
            'Serial_Bill' => $request->Serial_Bill,
            'Status' => '0',
        ]);

        return redirect()->route('Member')->with('success', 'ລົງທະບຽນສຳເລັດແລ້ວ');
    }
}
