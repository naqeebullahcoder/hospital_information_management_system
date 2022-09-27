<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});



//================================== Admin Panel Routes =======================================al
Route::redirect('login', 'login');
Route ::redirect('/reset','reset');

Route::redirect('/home', 'admin');
Route::resource('change-password', 'Auth\ResetPasswordController');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');
    Route::resource('faculty-members', 'FacultyMembersController');

    Route::resource('scheme-of-studies', 'SchemeOfStudiesController');
    Route::resource('programmes', 'ProgrammesController');
    Route::resource('courses', 'CoursesController');
    Route::resource('course-categories', 'CourseCategoriesController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
    Route::resource('jobs', 'JobsController');
    Route::resource('awards', 'AwardsController');
    Route::resource('publications', 'PublicationsController');
    Route::resource('workshops', 'WorkshopsController');
    Route::resource('memberships', 'MembershipsController');

    Route::resource('designations', 'DesignationController');
    Route::resource('faculties', 'FacultiesController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('objectives', 'ObjectivesController');
    Route::resource('offices', 'OfficesController');
    Route::resource('staff-members', 'StaffMembersController');

    Route::resource('change-password', 'AuthController');
    Route::resource('staff-job-responsibilities', 'StaffMemberJobResponsibilitiesController');
    Route::resource('office-projects', 'OfficeProjectsController');
    Route::resource('blogs', 'BlogsController');
    Route::resource('press', 'PressReleaseController');
    Route::resource('settings', 'SettingsController');
    Route::resource('orderforms', 'OrderformController');
    Route::resource('doctors', 'DoctorController');
    Route::resource('services', 'ServicesController');
    Route::resource('patients', 'PatientController');
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
