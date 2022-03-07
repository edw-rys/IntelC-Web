<?php
use Illuminate\Support\Facades\Route;
// Admin Route
Route::group([],function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    /**
     * Services routes
     */
    Route::resource('service', 'ServiceController')->except(['show']);
    Route::post('service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::post('service/restore/{id}', 'ServiceController@restore')->name('service.restore');

    /**
     * Plans and Prices
     */
    Route::resource('planes-prices', 'PlanesPricesController')->except(['show']);
    Route::post('planes-prices/update/{id}', 'PlanesPricesController@update')->name('planes-prices.update');
    Route::post('planes-prices/restore/{id}', 'PlanesPricesController@restore')->name('planes-prices.restore');

    /**
     * Plans and Prices
     */
    Route::resource('planes-prices', 'PlanesPricesController')->except(['show']);
    Route::post('planes-prices/update/{id}', 'PlanesPricesController@update')->name('planes-prices.update');
    Route::post('planes-prices/restore/{id}', 'PlanesPricesController@restore')->name('planes-prices.restore');

    /**
     * Testimonials
     */
    Route::resource('testimonials', 'TestimonialsController')->except(['show']);
    Route::post('testimonials/update/{id}', 'TestimonialsController@update')->name('testimonials.update');
    Route::post('testimonials/restore/{id}', 'TestimonialsController@restore')->name('testimonials.restore');

    /**
     * Our team
     */
    Route::resource('our-team', 'OurTeamController')->except(['show']);
    Route::post('our-team/update/{id}', 'OurTeamController@update')->name('our-team.update');
    Route::post('our-team/restore/{id}', 'OurTeamController@restore')->name('our-team.restore');

    /**
     * Questions
     */
    Route::resource('questions', 'QuestionsController')->except(['show']);
    Route::post('questions/update/{id}', 'QuestionsController@update')->name('questions.update');
    Route::post('questions/restore/{id}', 'QuestionsController@restore')->name('questions.restore');

    /**
     * Blog
     */
    Route::resource('blog', 'BlogController')->except(['show']);
    Route::post('blog/update/{id}', 'BlogController@update')->name('blog.update');
    Route::post('blog/restore/{id}', 'BlogController@restore')->name('blog.restore');
    
});
