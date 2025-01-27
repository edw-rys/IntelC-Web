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

    Route::post('service/del-sup/{id}', 'ServiceController@destroy')->name('service.del-sup');

    /**
     * Plans and Prices
     */
    Route::resource('planes-prices', 'PlanesPricesController')->except(['show']);
    Route::post('planes-prices/update/{id}', 'PlanesPricesController@update')->name('planes-prices.update');
    Route::post('planes-prices/restore/{id}', 'PlanesPricesController@restore')->name('planes-prices.restore');

    Route::post('planes-prices/del-sup/{id}', 'PlanesPricesController@destroy')->name('planes-prices.del-sup');

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

    Route::post('testimonials/del-sup/{id}', 'TestimonialsController@destroy')->name('testimonials.del-sup');

    /**
     * Our team
     */
    Route::resource('our-team', 'OurTeamController')->except(['show']);
    Route::post('our-team/update/{id}', 'OurTeamController@update')->name('our-team.update');
    Route::post('our-team/restore/{id}', 'OurTeamController@restore')->name('our-team.restore');

    Route::post('our-team/del-sup/{id}', 'OurTeamController@destroy')->name('our-team.del-sup');


    /**
     * Questions
     */
    Route::resource('questions', 'QuestionsController')->except(['show']);
    Route::post('questions/update/{id}', 'QuestionsController@update')->name('questions.update');
    Route::post('questions/restore/{id}', 'QuestionsController@restore')->name('questions.restore');

    Route::post('questions/del-sup/{id}', 'QuestionsController@destroy')->name('questions.del-sup');

    /**
     * Blog
     */
    Route::resource('blog', 'BlogController')->except(['show', 'update']);
    // Route::post('blog', 'BlogController@store')->name('blog.store');
    Route::post('blog/update/{id}', 'BlogController@update')->name('blog.update');
    Route::post('blog/restore/{id}', 'BlogController@restore')->name('blog.restore');

    Route::post('blog/del-sup/{id}', 'BlogController@destroy')->name('blog.del-sup');
    

    /**
     * Files Route
     */
    Route::get('files/{type}', 'FilesController@index')->name('files.index');//->except(['show','update']);
    Route::get('files/create/{type_id}', 'FilesController@create')->name('files.create');//->except(['show','update']);
    Route::post('files-store', 'FilesController@store')->name('files.store-item');//->except(['show','update']);

    // Route::post('files-store/{type_id}', 'FilesController@store')->name('files.store-item');//->except(['show','update']);
    //Route::post('files/{type_id}', 'FilesController@store')->name('files.store');//->except(['show','update']);
    Route::get('files/{type_id}/edit', 'FilesController@edit')->name('files.edit');//->except(['show','update']);
    Route::post('files/del-sup/{type_id}', 'FilesController@destroy')->name('files.del-sup');//->except(['show','update']);
    Route::post('files/update/{id}', 'FilesController@update')->name('files.update');
    Route::post('files/item/remove/{id}', 'FilesController@removeItem')->name('files.item.remove');
    Route::post('files/store/upload', 'FilesController@updoadFiles')->name('files.store.upload');
    Route::post('files/store/upload-f', 'FilesController@updoadFiles')->name('files.store.upload');    
    Route::post('files/store/upload-i', 'FilesController@updoadFiles')->name('files.store-item.upload');  

});
