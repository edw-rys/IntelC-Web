<?php

use App\Exports\PinesExport;
use App\Imports\ImportPines;
use App\Models\Book;
use App\Models\Generados;
use App\Models\Pines;
use App\Models\PlanesPrices;
use App\Models\Role;
use App\Models\Service;
use App\Models\Testimonials;
use App\Models\Texto;
use App\Models\TypePlanes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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


Route::get('/admins', function () {
    // intelc@hotmail.com
    // dd(bcrypt('382@ipplnet@'));
    return redirect()->route('auth.login.show');
    //return view('welcome');
});

Route::get('login', 'LoginController@loginShow')->name('auth.login.show')->middleware(['logged_in']);
Route::post('login', 'LoginController@login')->name('auth.login')->middleware(['logged_in']);



Route::get('/', function () {
    $services = Service::all();
    $planesPrices = PlanesPrices::all();
    $testimonials = Testimonials::all();
    $typePlanes = TypePlanes::all();
    return view('static.home')
        ->with('title', 'INICIO')
        ->with('services', $services)
        ->with('testimonials', $testimonials)
        ->with('planesPrices', $planesPrices)
        ->with('typePlanes', $typePlanes)
        ->with('meta_description', '')
        ;
})->name('front.home');

Route::get('/web/{page}', 'FrontController@index')->name('front.view.static');

Route::get('front/blog/{id}', 'FrontController@showBlog')->name('front.blog.show');

Route::get('front/files/{type}/{file_id}', 'FrontController@getFiles')->name('front.files.index');

/**
 * Information
 */
// Route::get('front/information/{type}', 'InformationController@get')->name('front.information');
// Route::get('front/services/show/{id}', 'FrontController@showService')->name('front.services.show');
// Route::get('front/obra/show/{id}', 'InformationController@showObra')->name('front.obra.show');
// Route::get('front/news/show/{id}', 'InformationController@showNews')->name('front.news.show');

// Route::get('front/documents/{type}', 'FrontController@getOrders')->name('front.view.files');
// Route::get('front/events/{type}', 'FrontController@getEvents')->name('front.view.events');
// Route::get('front/event/{id}', 'FrontController@showEvent')->name('front.event.show');


// Route::get('front/obras', 'FrontController@typeObras')->name('front.obras');
// Route::get('front/obra/{id}', 'FrontController@showObras')->name('front.obra.show');


// Route::get('front/services', 'FrontController@services')->name('front.services');
// Route::get('front/service/{id}', 'FrontController@showService')->name('front.service.show');

// Route::get('front/alojamientos', 'FrontController@accommodations')->name('front.accommodations');
// Route::get('front/alojamiento/{id}', 'FrontController@showAccommodation')->name('front.accommodation.show');

// Route::get('front/directions', 'FrontController@directions')->name('front.directions');
// Route::get('front/direction/{id}', 'FrontController@showDirection')->name('front.directions.show');

// Route::get('front/notices', 'FrontController@notices')->name('front.notices');
// Route::get('front/notices/{id}', 'FrontController@showNotices')->name('front.notices.show');

// Route::get('front/search', 'FrontController@searchGlobal')->name('front.search');

Route::post('front/contact/submit', 'FrontController@submit')->name('front.contact.submit');

Route::get('admin/user/logout', 'LoginController@logout')->middleware('IsAuthenticated')->name('admin.user.logout');
