<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Image;

class CoursesAdminController extends Controller
{
    public function Home()
    {
        $data = Course::all();
        $page = 'Course';
        return view('Admin.Courses.Courses', compact('page', 'data'));
    }

    public function AddCourse(Request $request)
    {


        $page = 'Course';
        return view('Admin.Courses.AddCourse', compact('page'));
    }

    public function Store(Request $request)
    {
        $request->validate(
            [
                'Image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
                'Title' => 'required | max:255 | string',
                'Sub_Title' => 'required | string',
                'Teacher' => 'required | max:255 | string',
                'Group' => 'required | max:255 | string',
                'Price' => 'max:255 | string',
                'Promotion' => 'max:255',
                'End_Promotion' => 'max:255',
                'Objective' => 'required',
                'Content' => 'required',
                'Need' => 'required',
                'For_Who' => 'required',
                'Detail' => 'required',

            ],
            [
                'Image.required' => 'ກະລຸນາເລືອກຮູບພາບ',
                'Image.image' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະຮູບພາບເທົ່ານັ້ນ',
                'Image.mimes' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະ jpg, jpeg, png, svg, gif ເທົ່ານັ້ນ',
                'Image.max' => 'ຮູບພາບຂະໜາດໃຫຍ່ເກີນ 2mb ບໍ່ອະນຸຍາດໃຫ້ອັບໂຫຼດ',

                'Title.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Title.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Title.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Sub_Title.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Sub_Title.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Sub_Title.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Teacher.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Teacher.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Teacher.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Group.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Group.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Group.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Price.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Price.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Promotion.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'End_Promotion.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',

                'Objective.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Content.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Need.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'For_Who.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Detail.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
            ]
        );
        $serial = 'C-' . rand('100000', '999999');
        $create = date('d/m/Y');
        if ($request->Promotion == '') {
            $promotion = 'null';
            $EndPromotion = 'null';
        } else {
            if ($request->End_Promotion == "") {
                $promotion = $request->Promotion;
                $EndPromotion = date('d/m/Y');
            }
        }

        $image = $request->file('Image');
        $fileName = time() . mt_rand() . '.' . strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath());
        $img->resize(200, 110);
        $img_path = 'Images/Courses/';
        $full_path = $img_path . $fileName;
        $img->save($img_path . $fileName);


        Course::insert([
            'Title' => $request->Title,
            'Sub_Title' => $request->Sub_Title,
            'Teacher' => $request->Teacher,
            'Group' => $request->Group,
            'Update' => $create,
            'Price' => $request->Price,
            'Promotion' => $promotion,
            'End_Promotion' => $EndPromotion,
            'Objective' => $request->Objective,
            'Content' => $request->Content,
            'Need' => $request->Need,
            'For_Who' => $request->For_Who,
            'Detail' => $request->Detail,
            'Image' => $full_path,
            'Serial' => $serial,
        ]);
        return redirect()->route('AdminCourses')->with('success', 'ບັນທຶກຂໍ້ມູນເບື້ອງຕົ້ນສຳເລັດແລ້ວ');
    }

    public function Delete(Request $request)
    {
        $delete = Course::find($request->id);
        unlink($request->unImage);
        $delete->delete();
        return redirect()->route('AdminCourses')->with('delete', 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ');
    }

    public function EditCourse(Request $request, $Serial)
    {
        $data = Course::find($Serial);
        $page = 'Course';
        return view('Admin.Courses.EditCourse', compact('page', 'data'));
    }

    public function UpdateData(Request $request)
    {
        $request->validate(
            [
                'id' => 'required',
                'Title' => 'required | max:255 | string',
                'Sub_Title' => 'required | string',
                'Teacher' => 'required | max:255 | string',
                'Group' => 'required | max:255 | string',
                'Price' => 'max:255 | string',
                'Promotion' => 'max:255',
                'End_Promotion' => 'max:255',
                'Objective' => 'required',
                'Content' => 'required',
                'Need' => 'required',
                'For_Who' => 'required',
                'Detail' => 'required',

            ],
            [
                'id.required' => 'ບໍ່ພົບຂໍ້ມູນອ້າງອີງ',
                'Title.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Title.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Title.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Sub_Title.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Sub_Title.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Sub_Title.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Teacher.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Teacher.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Teacher.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Group.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Group.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Group.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Price.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Price.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'Price.string' => 'ຕົວໜັງສືເທົ່ານັ້ນ',

                'Promotion.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',
                'End_Promotion.max' => 'ຂໍ້ຄວາມຫ້າມຍາວເກີນ 255 ຕົວອັກສອນ',

                'Objective.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Content.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Need.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'For_Who.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
                'Detail.required' => 'ກະລຸນາປ້ອນຂໍ້ມູນ',
            ]
        );


        $create = date('d/m/Y');
        if ($request->Promotion == '') {
            $promotion = 'null';
            $EndPromotion = 'null';
        } else {
            if ($request->End_Promotion == "") {
                $promotion = $request->Promotion;
                $EndPromotion = date('d/m/Y');
            }
        }


        Course::find($request->id)->update([
            'Title' => $request->Title,
            'Sub_Title' => $request->Sub_Title,
            'Teacher' => $request->Teacher,
            'Group' => $request->Group,
            'Update' => $create,
            'Price' => $request->Price,
            'Promotion' => $promotion,
            'End_Promotion' => $EndPromotion,
            'Objective' => $request->Objective,
            'Content' => $request->Content,
            'Need' => $request->Need,
            'For_Who' => $request->For_Who,
            'Detail' => $request->Detail,
        ]);
        return redirect()->route('AdminCourses')->with('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ');
    }

    // Update Image =============================================================
    public function UpdateImage(Request $request)
    {
        $request->validate(
            [
                'id' => 'required',
                'Image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',

            ],
            [
                'id.required' => 'ບໍ່ພົບຂໍ້ມູນອ້າງອີງ',
                'Image.required' => 'ກະລຸນາເລືອກຮູບພາບ',
                'Image.image' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະຮູບພາບເທົ່ານັ້ນ',
                'Image.mimes' => 'ອະນຸຍາດໃຫ້ອັບໂຫຼດສະເພາະ jpg, jpeg, png, svg, gif ເທົ່ານັ້ນ',
                'Image.max' => 'ຮູບພາບຂະໜາດໃຫຍ່ເກີນ 2mb ບໍ່ອະນຸຍາດໃຫ້ອັບໂຫຼດ',
            ]
        );


        $image = $request->file('Image');
        $fileName = time() . mt_rand() . '.' . strtolower($image->getClientOriginalExtension());
        $img = Image::make($image->getRealPath());
        $img->resize(200, 110);
        $img_path = 'Images/Courses/';
        $full_path = $img_path . $fileName;
        $img->save($img_path . $fileName);
        unlink($request->oldImage);

        Course::find($request->id)->update([
            'Image' => $full_path,
        ]);
        return redirect()->route('AdminCourses')->with('success', 'ປ່ຽນຮູບພາບສຳເລັດແລ້ວ');
    }

    public function Edit(Request $request){

    }

}
