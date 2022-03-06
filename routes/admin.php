<?php
use Illuminate\Support\Facades\Route;
// Admin Route
Route::group([],function(){
    Route::get('dashboard.index', 'DashboardController@index')->name('dashboard.index');
    /**
     * Accomodation routes
     */
    Route::resource('accommodation', 'AccommodationController')->except(['show','update']);
    Route::post('accommodation/update/{id}', 'AccommodationController@update')->name('accommodation.update');
    Route::delete('accommodation/item/remove/{id}', 'AccommodationController@removeItem')->name('accommodation.item.remove');
    Route::post('accommodation/store/upload', 'AccommodationController@updoadFiles')->name('accommodation.store.upload');

    /**
     * Services routes
     */
    Route::resource('service', 'ServiceController')->except(['show','update']);
    Route::post('service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::delete('service/item/remove/{id}', 'ServiceController@removeItem')->name('service.item.remove');
    Route::post('service/store/upload', 'ServiceController@updoadFiles')->name('service.store.upload');
    /**
     * Directions
     */
    Route::resource('directions', 'DirectionsController')->except(['show','update']);
    Route::post('directions/update/{id}', 'DirectionsController@update')->name('directions.update');
    Route::delete('directions/item/remove/{id}', 'DirectionsController@removeItem')->name('directions.item.remove');
    Route::post('directions/store/upload', 'DirectionsController@updoadFiles')->name('directions.store.upload');
    /**
     * Notices routes
     */
    Route::resource('notice', 'NoticeController')->except(['show','update']);
    Route::post('notice/update/{id}', 'NoticeController@update')->name('notice.update');
    Route::delete('notice/item/remove/{id}', 'NoticeController@removeItem')->name('notice.item.remove');
    Route::post('notice/store/upload', 'NoticeController@updoadFiles')->name('notice.store.upload');

    /**
     * Events schedule routes
     */
    Route::resource('schedule', 'ScheduleController')->except(['show','update']);
    Route::post('schedule/update/{id}', 'ScheduleController@update')->name('schedule.update');
    Route::delete('schedule/item/remove/{id}', 'ScheduleController@removeItem')->name('schedule.item.remove');
    Route::post('schedule/store/upload', 'ScheduleController@updoadFiles')->name('schedule.store.upload');
    Route::get('schedule_/participants/{id}', 'ScheduleController@participants')->name('schedule.participants');
    Route::post('schedule_/participants_store', 'ScheduleController@participantsStore')->name('schedule.participants.store');
    Route::post('schedule_/participants_delete/{ID}', 'ScheduleController@participantsDelete')->name('schedule.participants.delete');
    
    /**
     * Obras routes
     */
    Route::resource('obra', 'ObraController')->except(['show','update']);
    Route::post('obra/update/{id}', 'ObraController@update')->name('obra.update');
     /**
     * Gallery routes
     */
    Route::resource('gallery', 'GalleryController')->except(['show','update']);
    Route::post('gallery/update/{id}', 'GalleryController@update')->name('gallery.update');
    // Route::delete('service/item/remove/{id}', 'ServiceController@removeItem')->name('service.item.remove');
    // Route::post('service/store/upload', 'ServiceController@updoadFiles')->name('service.store.upload');
    
    
    /**
     * Files Route
     */
    Route::get('files/{type}', 'FilesController@index')->name('files.index');//->except(['show','update']);
    Route::get('files/create/{type_id}', 'FilesController@create')->name('files.create');//->except(['show','update']);
    Route::post('files/{type_id}', 'FilesController@store')->name('files.store');//->except(['show','update']);
    Route::get('files/{type_id}/edit', 'FilesController@edit')->name('files.edit');//->except(['show','update']);
    Route::delete('files/delete/{type_id}', 'FilesController@destroy')->name('files.delete');//->except(['show','update']);
    Route::post('files/update/{id}', 'FilesController@update')->name('files.update');
    Route::delete('files/item/remove/{id}', 'FilesController@removeItem')->name('files.item.remove');
    Route::post('files/store/upload', 'FilesController@updoadFiles')->name('files.store.upload');    
});
