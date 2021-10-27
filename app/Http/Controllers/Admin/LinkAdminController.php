<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use Carbon\Carbon;

class LinkAdminController extends Controller
{
    public function Home()
    {
        $data = Link::all();
        $page = 'Course';
        return view('Admin.Courses.Link', compact('page', 'data'));
    }

    public function Store(Request $request)
    {
        $request->validate(
            [
                'NameLinks' => 'required|unique:links|string|max:100',
            ],
            [
                'NameLinks.unique' => 'ໝວດໝູ່ນີ້ມີໃນລະບົບແລ້ວ',
                'NameLinks.string' => 'ໝວດໝູ່ຕ້ອງເປັນຂໍ້ຄວາມເທົ່ານັ້ນ',
                'NameLinks.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 100 ຕົວອັກສອນ',
                'NameLinks.required' => 'ກະລຸນາປ້ອນຊື່ໝວດໝູ່',
            ]
        );

        Link::insert([
            'NameLinks' => $request->NameLinks,
            'Created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'ບັນທຶກໝວດໝູ່ສຳເລັດແລ້ວ');
    }


    public function Update(Request $request)
    {
        $request->validate(
            [
                'id' => 'required',
                'NameLinks' => 'required | string | max:100 ',
            ],
            [
                'id.required' => 'ບໍ່ພົບຂໍ້ມູນອ້າງອີງ',
                'NameLinks.unique' => 'ໝວດໝູ່ນີ້ມີໃນລະບົບແລ້ວ',
                'NameLinks.string' => 'ໝວດໝູ່ຕ້ອງເປັນຂໍ້ຄວາມເທົ່ານັ້ນ',
                'NameLinks.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 100 ຕົວອັກສອນ',
                'NameLinks.required' => 'ກະລຸນາປ້ອນຊື່ໝວດໝູ່',
            ]
        );

        Link::find($request->id)->update([
            'NameLinks' => $request->NameLinks,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('update', 'ປ່ຽນແປງຊື່ໝວດໝູ່ສຳເລັດແລ້ວ');
    }
}
