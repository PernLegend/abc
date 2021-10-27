<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;


class SliderAdminController extends Controller
{
    public function Home()
    {
        $data = Slider::all();
        $page = 'Slider';
        return view('Admin.Slider.Slider', compact('page', 'data'));
    }

    public function Store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ],
            [
                'image.required' => 'ກະລຸນາເລືອກຮູບພາບ',
                'image.image' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະຮູບພາບເທົ່ານັ້ນ',
                'image.mimes' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະ jpg, jpeg, png, svg, gif ເທົ່ານັ້ນ',
                'image.max' => 'ຮູບພາບຂະໜາດໃຫຍ່ເກີນ 2mb ບໍ່ອະນຸຍາດໃຫ້ອັບໂຫຼດ',
            ]
        );

        $image = $request->file('image');
        $fileName = time() . mt_rand() . '.' . strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath());
        $img->resize(1200, 775);
        $img_path = 'Images/Slider/';
        $full_path = $img_path . $fileName;
        $img->save($img_path . $fileName);

        Slider::insert([
            'Images' => $full_path,
            'Created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'ອັບໂຫຼດຮູບພາບສຳເລັດແລ້ວ');
    }

    public function Delete(Request $request)
    {
        $delete = Slider::find($request->id);
        unlink($request->unImage);
        $delete->delete();
        return back()->with('delete', 'ຮູບພາບໄດ້ຖືກລົບແລ້ວ');
    }


    public function Update(Request $request)
    {
        $request->validate(
            [
                'imageNew' => 'required|image|mimes:JPG,PNG,jpg,jpeg,png,svg,gif|max:2048',
            ],
            [
                'imageNew.required' => 'ກະລຸນາເລືອກຮູບພາບ',
                'imageNew.image' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະຮູບພາບເທົ່ານັ້ນ',
                'imageNew.mimes' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະ jpg, jpeg, png, svg, gif ເທົ່ານັ້ນ',
                'imageNew.max' => 'ຮູບພາບຂະໜາດໃຫຍ່ເກີນ 2mb ບໍ່ອະນຸຍາດໃຫ້ອັບໂຫຼດ',
            ]
        );

        $image = $request->file('imageNew');
        $fileName = time() . mt_rand() . '.' . strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath());
        $img->resize(1200, 775);
        $img_path = 'Images/Slider/';
        $full_path = $img_path . $fileName;
        $img->save($img_path . $fileName);


        Slider::find($request->id)->update([
            'Images' => $full_path,
        ]);
        unlink($request->Unlink);

        return back()->with('update', 'ອັບເດດຮູບພາບໃໝ່ສຳເລັດແລ້ວ');
    }
}
