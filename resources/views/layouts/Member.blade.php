<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description"
            content="ຄິດເລື່ອງການສ້າງເວັບໄຊ ຫຼື ແອັບພິເຄຊັນ ທັງ Android ແລະ IOS ຫຼື ຕ້ອງການຮຽນ ຄິດເຖິງພວກເຮົາ ພວກເຮົາພ້ອມແລ້ວທີ່ຈະໃຫ້ບໍລິການທ່ານ">
        <meta name="keywords"
            content="HTML, CSS, JavaScript, ການຮຽນ, ການສອນ, ເປີດການຮຽນ-ການສອນ, ການຮຽນ-ການສອນ, ຫ້ອງຮຽນອອນລາຍ, ຫ້ອງຮຽນຄົນລາວ, ພັດທະນາ, ພັດທະນາເວັບໄຊ, ເວັບໄຊ, ແອັບ, ແອັປ, ແອບ, ແອັບພິເຄຊັນ, ແອັປພິເຄຊັນ, ແອປ, ເວັບໄຊສ໌, ສ້າງເວັບໄຊ, ສ້າງແອັບ, ຂຽນແອັບ, ຂຽນເວັບໄຊ">

        <meta name="author" content="Champadev">

        <link rel="icon" href="{{asset('Images/Logo/Champadev.png')}}" type="image/gif">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">


        <!-- Java Script -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/Custom.js') }}" defer></script>
        <script src="{{ asset('js/Admin.js') }}" defer></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/Admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/Member.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        {{-- Font Awesome  --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--Bootstrap  CSS only -->
        <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!--  -->
        <script src="//code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>

    <body onload="tableData()">

        @yield('contents')



    </body>

</html>
