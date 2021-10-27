<?php

use Illuminate\Support\Facades\Route;
// ======================= Admin Controller =====================================
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\CoursesAdminController;
use App\Http\Controllers\Admin\LinkAdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderAdminController;
use App\Http\Controllers\Admin\RegisterController;

// ======================= Member Controller =====================================
use App\Http\Controllers\Member\HomeMemberController;
use App\Http\Controllers\Member\RegisterMemberController;


// ======================= User Controller =====================================
use App\Http\Controllers\Users\HomeUserController;
use App\Http\Controllers\Users\CourseUserController;



Auth::routes();

// =========================== User page ================================================
Route::get('/', [HomeUserController::class, 'Home'])->name('Home');
Route::get('/Course', [CourseUserController::class, 'Course'])->name('Course');
Route::get('/Course/Detail/{Course}', [CourseUserController::class, 'Detail'])->name('Detail');


Route::group(['middleware' => ['auth']], function () {

    // =========================== Member page ===============================================
    Route::get('/Member', [HomeMemberController::class, 'Home'])->name('Member');
    Route::get('/Member/Enroll/{id}', [RegisterMemberController::class, 'Enroll']);
    Route::post('/Member/Enroll/Store', [RegisterMemberController::class, 'EnrollStore'])->name('EnrollStore');


    // =========================== Admin page ================================================
    Route::get('/Admin', [HomeAdminController::class, 'Home'])->name('Admin')->middleware('isAdmin');
    Route::get('/Admin/Contact', [ContactAdminController::class, 'Contact'])->name('AdminContact')->middleware('isAdmin');
    Route::post('/Admin/Contact', [ContactAdminController::class, 'Store'])->name('ContactStore')->middleware('isAdmin');
    Route::get('/Admin/EditContact/{Serial}', [ContactAdminController::class, 'EditContact'])->name('Edit')->middleware('isAdmin');
    Route::post('/Admin/EditContact/UpdateData', [ContactAdminController::class, 'UpdateData'])->name('UpdateData')->middleware('isAdmin');

    // =========================== Role page ================================================
    Route::get('/Admin/Role/Admin', [RoleController::class, 'RoleAdmin'])->name('RoleAdmin')->middleware('isAdmin');
    Route::get('/Admin/Role/Member', [RoleController::class, 'RoleMember'])->name('RoleMember')->middleware('isAdmin');
    Route::post('/Admin/Role/Update', [RoleController::class, 'RoleUpdate'])->name('RoleUpdate')->middleware('isAdmin');


    // =========================== Register page ================================================
    Route::get('/Admin/Enroll', [RegisterController::class, 'Home'])->name('Enroll')->middleware('isAdmin');
    Route::get('/Admin/Enroll/Detail/', [RegisterController::class, 'EnrollDetail'])->name('EnrollDetail')->middleware('isAdmin');


    // ========== Courses =============
    Route::get('/Admin/Courses', [CoursesAdminController::class, 'Home'])->name('AdminCourses')->middleware('isAdmin');
    Route::get('/Admin/Courses/Add', [CoursesAdminController::class, 'AddCourse'])->name('AddCourse')->middleware('isAdmin');
    Route::get('/Admin/Courses/Edit/{Serial}', [CoursesAdminController::class, 'EditCourse'])->name('EditCourse')->middleware('isAdmin');
    Route::post('/Admin/Courses/Update/Data', [CoursesAdminController::class, 'UpdateData'])->name('UpdateData')->middleware('isAdmin');
    Route::post('/Admin/Courses/Update/Image', [CoursesAdminController::class, 'UpdateImage'])->name('UpdateImage')->middleware('isAdmin');
    Route::post('/Admin/Courses/Store', [CoursesAdminController::class, 'Store'])->name('StoreCourse')->middleware('isAdmin');
    Route::post('/Admin/Links/Delete', [CoursesAdminController::class, 'Delete'])->name('CourseDelete')->middleware('isAdmin');

    // ========= Links==============
    Route::get('/Admin/Links', [LinkAdminController::class, 'Home'])->name('Link')->middleware('isAdmin');
    Route::post('/Admin/Links/Store', [LinkAdminController::class, 'Store'])->name('LinkStore')->middleware('isAdmin');
    Route::post('/Admin/Links/Upadte', [LinkAdminController::class, 'Update'])->name('LinkUpdate')->middleware('isAdmin');

    // =========== Slider  ============
    Route::get('/Admin/Slider', [SliderAdminController::class, 'Home'])->name('Slider')->middleware('isAdmin');
    Route::post('/Admin/Slider/Store', [SliderAdminController::class, 'Store'])->name('SliderStore')->middleware('isAdmin');
    Route::post('/Admin/Slider/Update', [SliderAdminController::class, 'Update'])->name('SliderUpdate')->middleware('isAdmin');
    Route::post('/Admin/Slider/Delete', [SliderAdminController::class, 'Delete'])->name('SliderDelete')->middleware('isAdmin');
});
