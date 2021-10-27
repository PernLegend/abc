<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactAdminController extends Controller
{
        public function Contact()
        {
            $data = Contact:: all();
            $page = 'Contact';
            return view ('Admin.Home.Contact', compact('page', 'data'));

        }

        public function Store(Request $request){
            $request -> validate ([
                'Facebook' => 'required | max:255',
                'Messenger' => 'required | max:255',
                'Whatsapp' => 'required | max:10 | min:10',
                'Line' => 'required | max:255',
                'Github' => 'required | max:255',
                'Email' => 'required | email | max:255',

            ],
            [
                'Facebook.max' => 'ກະລຸນາປ້ອນຊື່ Facebook',
                'Facebook.required' => 'ກະລຸນາປ້ອນຊື່ Facebook',
                'Messenger.max' => 'ກະລຸນາປ້ອນຊື່ Messenger',
                'Messenger.required' => 'ກະລຸນາປ້ອນຊື່ Messenger',
                'Whatsapp.max.min' => 'ກະລຸນາປ້ອນຊື່ເບີ Whatsapp',
                'Whatsapp.required' => 'ກະລຸນາປ້ອນຊື່ເບີ Whatsapp',
                'Line.max' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Line',
                'Line.required' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Line',
                'Github.max' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Github',
                'Github.required' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Github',
                'Email.max.email' => 'ກະລຸນາປ້ອນຊື່ໃຫ້ຖືກ',
                'Email.required' => 'ກະລຸນາປ້ອນຊື່ໃຫ້ຖືກ',
            ]
        );

        Contact::insert([
            'Facebook' => $request -> Facebook,
            'Messenger' => $request -> Facebook,
            'Whatsapp' => $request -> Facebook,
            'Line' => $request -> Facebook,
            'Github' => $request -> Facebook,
            'Email' => $request -> Facebook,
        ]);
        return redirect ()-> route ('ContactStore') -> with('success' , 'ບັນທືກສຳເລັດ' );
        }

        public function EditContact(Request $request, $Serial){
            $data = Contact::find($Serial);
            $page = 'Contact';
            return view('Admin.Home.EditContact' , compact('page' , 'data'));
        }
        public  function UpdateData(Request $request)
        {
            $request->validate([
                'Facebook' => 'required | max:255',
                'Messenger' => 'required | max:255',
                'Whatsapp' => 'required | max:10 | min:10',
                'Line' => 'required | max:255',
                'Github' => 'required | max:255',
                'Email' => 'required | email | max:255',
            ],
            [
                'Facebook.max' => 'ກະລຸນາປ້ອນຊື່ Facebook',
                'Facebook.required' => 'ກະລຸນາປ້ອນຊື່ Facebook',
                'Messenger.max' => 'ກະລຸນາປ້ອນຊື່ Messenger',
                'Messenger.required' => 'ກະລຸນາປ້ອນຊື່ Messenger',
                'Whatsapp.max.min' => 'ກະລຸນາປ້ອນຊື່ເບີ Whatsapp',
                'Whatsapp.required' => 'ກະລຸນາປ້ອນຊື່ເບີ Whatsapp',
                'Line.max' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Line',
                'Line.required' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Line',
                'Github.max' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Github',
                'Github.required' => 'ກະລຸນາປ້ອນຊື່ໄອດີ Github',
                'Email.max.email' => 'ກະລຸນາປ້ອນຊື່ໃຫ້ຖືກ',
                'Email.required' => 'ກະລຸນາປ້ອນຊື່ໃຫ້ຖືກ',
            ]
        );
    }
}
