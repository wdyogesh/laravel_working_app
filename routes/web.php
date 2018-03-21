<?php

use App\Host;

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

Route::get('/useravatar/{avatar}', 'UserController@avatar')->name('user.avatar');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

//HOME PAGE

Route::get('/',function() {
	if(Auth::check())
	{
		if (Auth::user()->isAdmin()) 
		{
	        return redirect()->route('admin.index');
	    }elseif(Auth::user()->isHost()) {
	        return redirect('/host');
	    }elseif(Auth::user()->isStudent()) {
	        return redirect('/student');
	    }elseif(Auth::user()->isPartner()) {
	        return redirect('/partner');
	    }
	}else{
		return view('homepage');
	}
	
})->name('homepage');


Auth::routes();

// -------------------------------------------------------------------------------------------------------------

//HOST ROUTES

Route::group(['middleware' => 'auth',  'prefix' => 'host'], function(){

	Route::get('/', 'HostController@index')->name('host.index');
	
	Route::get('/houses', 'HouseController@index')->name('house.index');

	Route::get('/profile/{host_id}', 'HostController@show')->name('host.show')->where('host_id', '[0-9]+');
	Route::get('/profile/{host_id}/edit', 'HostController@edit')->name('host.edit')->where('host_id', '[0-9]+');
	Route::put('/profile/{host_id}', 'HostController@update')->name('host.update')->where('host_id', '[0-9]+');

	Route::get('/bookings', 'HostController@bookingList')->name('host.booking');

	Route::get('/student/{student_id}', 'StudentController@show')->name('host.student')->where('student_id', '[0-9]+');
	
	Route::get('/family/list', 'FamilyMemberController@index')->name('family.index');
	Route::get('/family', 'FamilyMemberController@create')->name('family.create')->where('id', '[0-9]+');
	Route::post('/family/{id}', 'FamilyMemberController@store')->name('family.store');
	Route::get('/family/{id}/edit', 'FamilyMemberController@edit')->name('family.edit')->where('id', '[0-9]+');
	Route::put('/family/{id}', 'FamilyMemberController@update')->name('family.update')->where('id', '[0-9]+');
	Route::get('/family/{id}/delete', 'FamilyMemberController@destroy')->name('family.destroy')->where('id', '[0-9]+');

	Route::get('/house', 'HouseController@index')->name('house.index');
	Route::get('/house/add', 'HouseController@create')->name('house.create');
	Route::post('/house', 'HouseController@store')->name('house.store');
	Route::get('/house/{id?}', 'HouseController@show')->name('house.show')->where('id', '[0-9]+');
	Route::get('/house/{id}/edit', 'HouseController@edit')->name('house.edit')->where('id', '[0-9]+');
	Route::put('/house/{id}', 'HouseController@update')->name('house.update')->where('id', '[0-9]+');
	Route::get('/house/delete/{id}', 'HouseController@destroy')->name('house.delete')->where('id', '[0-9]+');

	Route::get('/vacancy/{house_id}', 'VacancyController@index')->name('vacancy.index')->where('house_id', '[0-9]+');
	Route::get('/vacancy/{house_id}/{id}', 'VacancyController@show')->name('vacancy.show')->where('house_id', '[0-9]+')->where('id', '[0-9]+');
	Route::get('/vacancy/add/{house_id}', 'VacancyController@create')->name('vacancy.create')->where('house_id', '[0-9]+');
	Route::post('/vacancy/', 'VacancyController@store')->name('vacancy.store');
	Route::get('/vacancy/{id}/edit', 'VacancyController@edit')->name('vacancy.edit')->where('id', '[0-9]+');
	Route::put('/vacancy/update/{id}', 'VacancyController@update')->name('vacancy.update')->where('id', '[0-9]+');
	Route::get('/vacancy/delete/{id}', 'VacancyController@destroy')->name('vacancy.destroy')->where('id', '[0-9]+');

	Route::get('/other-info/{id}', 'HostController@other_info_show')->name('other.info.show');
	Route::get('/other-info/{id}/edit', 'HostController@other_info_edit')->name('other.info.edit');
	Route::put('/other-info/{id}', 'HostController@other_info_update')->name('other.info.update');

	Route::get('/finish', 'HostController@register_finish')->name('register.finish');
});

// -------------------------------------------------------------------------------------------------------------

//BOOKING ROUTES

Route::group(['middleware' => 'auth',  'prefix' => 'booking'], function(){
	Route::get('/', 'BookingController@index')->name('booking.index');
	Route::get('/create', 'BookingController@create')->name('booking.create');
	Route::post('/', 'BookingController@store')->name('booking.store');
	Route::put('/{booking_id}', 'BookingController@update')->name('booking.update')->where('booking_id', '[0-9]+');
	Route::get('/{booking_id}/edit', 'BookingController@edit')->name('booking.edit')->where('booking_id', '[0-9]+');
	
	Route::put('/match/{booking_id}/{vacancy_id}', 'BookingController@booking')->name('booking.match.making');
	Route::get('/match/{booking_id}', 'BookingController@match')->name('booking.match');
});

// -------------------------------------------------------------------------------------------------------------

//ADMIN ROUTES
Route::group(['middleware' => 'auth',  'prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::get('/profile/{id}', 'AdminController@show')->name('admin.show');
	Route::get('/profile/{id}/edit', 'AdminController@edit')->name('admin.edit');
	Route::put('/profile/{id}', 'AdminController@update')->name('admin.update');

	//Working on it
	Route::get('/profile/download/{id}', 'AdminController@download')->name('admin.download');

	//BOOKING SUB-ROUTES

	Route::get('/booking', 'AdminController@booking')->name('admin.booking');
	Route::get('/booking/{booking_id}', 'BookingController@show')->name('admin.booking.show')->where('booking_id', '[0-9]+');
	Route::get('/booking/{booking_id}/edit', 'BookingController@edit')->name('admin.booking.edit')->where('booking_id', '[0-9]+');

	// -------------------------------------------------------------------------------------------------------------

	//STUDENT SUB-ROUTES
	Route::get('/students', 'AdminController@students')->name('admin.student');
	
	Route::get('/students/{student_id}', 'StudentController@show')->name('admin.student.show');
	Route::get('/students/{student_id}/edit', 'StudentController@edit')->name('admin.student.edit');
	
	Route::get('/students/logs/{student_id}', 'LogController@index')->name('admin.student.log')->where('student_id', '[0-9]+');
	Route::get('/students/logs/{student_id}/create', 'LogController@create')->name('admin.student.log.create')->where('student_id', '[0-9]+');
	Route::post('/students/logs/{student_id}', 'LogController@store')->name('admin.student.log.store')->where('student_id', '[0-9]+');
	// -------------------------------------------------------------------------------------------------------------

	//PICK-UPS SUB-ROUTES
	Route::get('/pickups', 'AdminController@pickups')->name('admin.pickup');
	// -------------------------------------------------------------------------------------------------------------

	//HOSTS SUB-ROUTES

	Route::get('/host', 'AdminController@hosts')->name('admin.host');
	Route::get('/host/{host_id}', 'HostController@show')->name('admin.host.show')->where('host_id', '[0-9]+');
	Route::get('/host/{host_id}/edit', 'HostController@edit')->name('admin.host.edit')->where('host_id', '[0-9]+');
	Route::get('/host/log/{host_id}', 'LogController@index')->name('admin.host.log')->where('host_id', '[0-9]+');
	Route::get('/host/log/{host_id}/create', 'LogController@create')->name('admin.host.log.create')->where('host_id', '[0-9]+');
	Route::post('/hosts/logs/{host_id}', 'LogController@store')->name('admin.host.log.store')->where('host_id', '[0-9]+');

	// -------------------------------------------------------------------------------------------------------------

	//PARTNERS SUB-ROUTES

	Route::get('/partner', 'AdminController@partners')->name('admin.partner');
	Route::get('/partner/{partner_id}', 'PartnerController@show')->name('admin.partner.show');
	Route::get('/partner/logs/{partner_id}', 'LogController@index')->name('admin.partner.log')->where('partner_id', '[0-9]+');
	Route::get('/partner/log/{partner_id}/create', 'LogController@create')->name('admin.partner.log.create')->where('partner_id', '[0-9]+');
	Route::post('/partner/log/{partner_id}', 'LogController@store')->name('admin.partner.log.store')->where('partner_id', '[0-9]+');

	// -------------------------------------------------------------------------------------------------------------

	//LOGS SUB-ROUTES
	Route::get('/log/{user_id?}', 'LogController@index')->name('admin.log.index')->where('user_id', '[0-9]+');
	Route::get('/log/{user_id}/create', 'LogController@create')->name('admin.log.create')->where('user_id', '[0-9]+');
	Route::post('/log/{user_id}', 'LogController@store')->name('admin.log.store')->where('user_id', '[0-9]+');

	// -------------------------------------------------------------------------------------------------------------

	//USERS SUB-ROUTES
	Route::get('/user', 'UserController@index')->name('admin.user.index');
	Route::get('/user/{id}', 'UserController@show')->name('admin.user.show')->where('id', '[0-9]+');
	Route::get('/user/create', 'UserController@create')->name('admin.user.create');
	Route::post('/user/{id}', 'UserController@store')->name('admin.user.store')->where('id', '[0-9]+');
	Route::get('/user/{id}/edit', 'UserController@edit')->name('admin.user.edit')->where('id', '[0-9]+');
	Route::put('/user/{id}', 'UserController@put')->name('admin.user.update')->where('id', '[0-9]+');

	//USER ROLES SUB-ROUTES
	Route::get('/role', 'RoleController@index')->name('admin.user.role.index')->where('id', '[0-9]+');
	Route::get('/role/create', 'RoleController@create')->name('admin.user.role.create')->where('id', '[0-9]+');
	Route::post('/role', 'RoleController@store')->name('admin.user.role.store')->where('id', '[0-9]+');
	Route::get('/role/{id}/edit', 'RoleController@edit')->name('admin.user.role.edit')->where('id', '[0-9]+');
	Route::put('/role/{id}', 'RoleController@update')->name('admin.user.role.update')->where('id', '[0-9]+');

	Route::get('/role/user/{id}', 'RoleController@show')->name('admin.user.role.show')->where('id', '[0-9]+');

});

// -------------------------------------------------------------------------------------------------------------

//PARTNER ROUTES

Route::group(['middleware' => 'auth',  'prefix' => 'partner'], function(){
	Route::get('/', 'PartnerController@index')->name('partner.index');
	Route::get('/profile/{id}', 'PartnerController@show')->name('partner.show')->where('id', '[0-9]+');
	Route::get('/profile/{id}/edit', 'PartnerController@edit')->name('partner.edit')->where('id', '[0-9]+');
	Route::put('/profile/{id}', 'PartnerController@update')->name('partner.update')->where('id', '[0-9]+');

	Route::get('/students', 'PartnerController@studentList')->name('partner.student');
	Route::get('/students/create', 'PartnerController@studentCreate')->name('partner.student.create');
	Route::get('/students/{id}', 'StudentController@show')->name('partner.student.show')->where('id', '[0-9]+');
	Route::get('/students/{id}/edit', 'StudentController@edit')->name('partner.student.edit')->where('id', '[0-9]+');

	Route::get('/host/{id}', 'HostController@show')->name('partner.host.show')->where('id', '[0-9]+');

	Route::get('/bookings', 'PartnerController@bookingList')->name('partner.booking');
	Route::get('/booking/{id}/create', 'PartnerController@bookingCreate')->name('partner.booking.create')->where('id', '[0-9]+');
	Route::post('/booking/{id}', 'BookingController@store')->name('partner.booking.store')->where('id', '[0-9]+');
	Route::get('/booking/{id}', 'BookingController@show')->name('partner.booking.show')->where('id', '[0-9]+');
	Route::get('/booking/{id}/edit', 'BookingController@edit')->name('partner.booking.edit')->where('id', '[0-9]+');
	Route::put('/booking/{id}', 'BookingController@update')->name('partner.booking.update')->where('id', '[0-9]+');
});

// -------------------------------------------------------------------------------------------------------------

//STUDENT ROUTES

Route::group(['middleware' => 'auth',  'prefix' => 'student'], function(){
	Route::get('/', 'StudentController@index')->name('student.index');
	Route::get('/profile/{student_id}', 'StudentController@show')->name('student.show');
	Route::put('/{id}', 'StudentController@Update')->name('student.update')->where('id', '[0-9]+');
	Route::get('/booking', 'StudentController@booking')->name('student.booking');
	Route::post('/add', 'StudentController@store')->name('student.store');
});

// -------------------------------------------------------------------------------------------------------------


// -------------------------------------------------------------------------------------------------------------
Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->to('andre@saystay.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

Route::get('chat/{student_id}/{host_id}', 'ChatController@chat')->name('chat');
Route::post('send', 'ChatController@send');
