<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * Home Controller
 */
Route::get('/','HomeController@welcome');

/**
 * AdminController
 */ 
Route::get('/admin', 'AdminController@index');
Route::get('/admin/user','AdminController@showuser');
Route::get('/admin/jobnumber','AdminController@showjobnumber');
Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/batch/interest','AdminController@showinterest');
Route::get('/admin/batch/aunews','AdminController@showaunews');
Route::get('/admin/batch/reanz','AdminController@showreanz');
Route::get('/admin/report/production','AdminController@showproduction');
Route::get('/admin/export/interest','AdminController@showinterestexport');

/**
 * Invalid
 * */
Route::get('/aunews/invalid/add', 'InvalidController@invalidadd');
Route::post('/aunews/invalid/add', 'InvalidController@invalidstore');
Route::get('/aunews/invalid/{invalid}/edit', 'InvalidController@invalidedit');
Route::post('/aunews/invalid/{invalid}/edit', 'InvalidController@invalidupdate');
Route::post('/aunews/invalid/delete', 'InvalidController@delete');

/**
 * Application Controller
 */
Route::get('/admin/setup/application/view', 'ApplicationController@applicationview');
Route::get('/admin/setup/application/add', 'ApplicationController@applicationadd');
Route::post('/admin/setup/application/add', 'ApplicationController@applicationstore');
Route::get('/admin/setup/application/{application}/edit', 'ApplicationController@applicationedit');
Route::post('/admin/setup/application/{application}/edit', 'ApplicationController@applicationupdate');
Route::post('/admin/setup/application/delete', 'ApplicationController@applicationdelete');

/**
 * Lookup Controller
 */
Route::get('/admin/setup/lookup/view', 'LookupController@lookupview');
Route::get('/admin/setup/lookup/add', 'LookupController@lookupadd');
Route::post('/admin/setup/lookup/add', 'LookupController@lookupstore');
Route::get('/admin/setup/lookup/{lookup}/edit', 'LookupController@lookupedit');
Route::post('/admin/setup/lookup/{lookup}/edit', 'LookupController@lookupupdate');
Route::post('/admin/setup/lookup/delete', 'LookupController@lookupdelete');

/**
 * UserController
 */
Route::get('/admin/setup/sysusers/view', 'UserController@sysusersview');
Route::get('/admin/setup/sysusers/add', 'UserController@sysusersadd');
Route::post('/admin/setup/sysusers/add', 'UserController@sysusersstore');
Route::get('/admin/setup/sysusers/{user}/edit', 'UserController@sysusersedit');
Route::post('/admin/setup/sysusers/{user}/edit', 'UserController@sysusersupdate');
Route::post('/admin/setup/sysusers/delete', 'UserController@sysusersdelete');

/**
 * States Controller
 */
Route::get('/admin/setup/states/view', 'StatesController@statesview');
Route::get('/admin/setup/states/add', 'StatesController@statesadd');
Route::post('/admin/setup/states/add', 'StatesController@statesstore');
Route::get('/admin/setup/states/{state}/edit', 'StatesController@statesedit');
Route::post('/admin/setup/states/{state}/edit', 'StatesController@statesupdate');
Route::post('/admin/setup/states/delete', 'StatesController@statesdelete');
 


/**
 * AUPost Code Controller
 */
Route::get('/admin/setup/aupostcode/view', 'AUPostCodeController@aupostcodeview');
Route::get('/admin/setup/aupostcode/add', 'AUPostCodeController@aupostcodeadd');
Route::post('/admin/setup/aupostcode/add', 'AUPostCodeController@aupostcodestore');
Route::get('/admin/setup/aupostcode/{aupostcode}/edit', 'AUPostCodeController@aupostcodeedit');
Route::post('/admin/setup/aupostcode/{aupostcode}/edit', 'AUPostCodeController@aupostcodeupdate');
Route::post('/admin/setup/aupostcode/delete', 'AUPostCodeController@aupostcodedelete');

/**
 * Publication Controller
 */
Route::get('/admin/setup/publication/view', 'PublicationController@pubview');
Route::get('/admin/setup/publication/add', 'PublicationController@pubadd'); //show form
Route::post('/admin/setup/publication/add', 'PublicationController@pubstore'); //submit form
Route::get('/admin/setup/publication/{publication}/edit', 'PublicationController@pubedit');
Route::post('/admin/setup/publication/{publication}/edit', 'PublicationController@pubupdate');
Route::post('/admin/setup/publication/delete', 'PublicationController@pubdelete');

/**
 * Job Number Controller
 */
Route::get('/admin/setup/jobnumber/view', 'JobNumberController@jobnumberview');
Route::get('/admin/setup/jobnumber/add', 'JobNumberController@jobnumberadd');
Route::post('/admin/setup/jobnumber/add', 'JobNumberController@jobnumberstore');
Route::get('/admin/setup/jobnumber/{jobnumber}/edit', 'JobNumberController@jobnumberedit');
Route::post('/admin/setup/jobnumber/{jobnumber}/edit', 'JobNumberController@jobnumberupdate');
Route::post('/admin/setup/jobnumber/delete', 'JobNumberController@jobnumberdelete');

/**
 * User Profile Controller
 */
Route::get('/admin/setup/userprofile/view', 'UserProfileController@userprofileview');
Route::get('/admin/setup/userprofile/{userprofile}/edit', 'UserProfileController@userprofileedit');
Route::post('/admin/setup/userprofile/{userprofile}/edit', 'UserProfileController@userprofileupdate');
Route::post('/admin/setup/userprofile/delete', 'UserProfileController@userprofiledelete');
Route::get('/profile/view', 'UserProfileController@showdetails');
Route::post('/profile/{userprofile}/edit', 'UserProfileController@updatedetails');
 
/**
 * Reports Controller
 */
Route::post('/admin/report/production','ReportController@productionreport');

/**
 * Exports Controller
 */
Route::post('/admin/export/interest','ExportController@show_interest');
Route::get('/admin/export/interest/{batch}','ExportController@export_interest_csv');
Route::get('/admin/export/interest/{batch}/excel','ExportController@export_interest_excel');

Route::get('/admin/export/aunews','ExportController@show_aunews');
Route::get('/admin/export/aunews/batch','ExportController@get_aunews');
Route::get('/admin/export/aunews/valid','ExportController@export_aunews');
Route::get('/admin/export/invalid/{batch}','ExportController@export_invalid');

Route::get('/admin/export/stats','ExportController@show_stats');
Route::post('/admin/export/stats','ExportController@get_stats');
Route::get('/admin/export/stats_output','ExportController@export_stats');


/**
 * Entry Logs Controller
 */
 Route::get('/admin/utilities/entrylogs','EntryLogController@view');



/**
 * Admin Auth Controller
 */ 
Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login','AdminAuth\AuthController@login');
Route::get('/admin/logout','AdminAuth\AuthController@logout');
Route::get('/admin/register', 'AdminAuth\AuthController@showRegistrationForm');
Route::post('/admin/register', 'AdminAuth\AuthController@register');

/**
 * Batch Contoller
 */

Route::get('/admin/batch/{batch_id}','BatchController@modify');
Route::post('/admin/batch','BatchController@store');
Route::post('/admin/batch/{batch_id}/edit','BatchController@update');
Route::post('/admin/batch/delete','BatchController@destroy');

 

/**
 * App Controller
 */
Route::get('/dataentry','AppController@index');
Route::get('/profile','AppController@profile');

/**
 * Sandbox Controller 
 */
 Route::get('/sandbox/entry',function(){
    return view('sandbox.entry');
 });
 
/**
 * User Auth Controller
 */ 
Route::auth();

/**
 * Interest Auction Results Controller
 */
Route::get('/interest','InterestController@index');
Route::post('/interest', 'BatchController@find');
Route::get('/interest/view', 'InterestController@view');
Route::get('/interest/entry', 'InterestController@entry');
Route::post('/interest/entry', 'InterestController@create');
Route::get('/interest/verify', 'InterestController@verify');
Route::post('/interest/verify/{record}','InterestController@storeverify');
Route::get('/interest/modify/{id}', 'InterestController@modify');
Route::post('/interest/{record}/update', 'InterestController@update');
Route::post('/interest/delete', 'InterestController@delete');
Route::get('/interest/search/{id}','InterestController@search');


/**
 * News Controller
 */
Route::get('/aunews', 'NewsController@index');
Route::post('/aunews', 'BatchController@find');
Route::get('/aunews/view', 'NewsController@view');
Route::get('/aunews/entry', 'NewsController@entry');
Route::get('/aunews/propdetails', 'NewsController@showproperty');
Route::post('/aunews/propdetails', 'NewsController@storeproperty');
Route::get('/aunews/modify/{record}', 'NewsController@modify'); // 1
Route::get('/aunews/{id}/propdetails', 'NewsController@modifypropertydetails'); //2
Route::post('/aunews/{aunews_address}/update', 'NewsController@update'); //3
Route::post('/aunews/delete', 'NewsController@delete');
Route::get('/aunews/verify', 'NewsController@verify'); // 1
Route::get('/aunews/verify/{id}/propdetails', 'NewsController@verifypropertydetails'); //2
Route::post('/aunews/verify/{aunews_address}/update', 'NewsController@verify_update'); //3



Route::get('/aunews/postcode/{suburb}','AUPostCodeController@search');
Route::get('/aunews/agent/{contact}','AUNewsAgencyController@search');

//REA NZ
Route::get('/reanz','ReanzController@index');
Route::post('/reanz', 'BatchController@find');
Route::get('/reanz/view', 'ReanzController@view');
Route::get('/reanz/add', 'ReanzController@entry'); //show form
Route::post('/reanz/add', 'ReanzController@create'); //submit form
Route::get('/reanz/{record}/edit', 'ReanzController@modify');
Route::post('reanz/{record}/update', 'ReanzController@update');
Route::post('/reanz/delete', 'ReanzController@delete');
Route::get('/reanz/search/{id}','ReanzController@search');

//LEAVE (USER)
Route::get('/leave/view', 'UserLeaveController@view');
Route::get('/leave/add', 'UserLeaveController@entry');
Route::post('/leave/add', 'UserLeaveController@create');
Route::get('/leave/{result}/edit', 'UserLeaveController@modify');
Route::post('leave/{results}/update', 'UserLeaveController@update');
Route::get('leave/{result}/status', 'UserLeaveController@status');
Route::post('leave/{results}/status', 'UserLeaveController@statusupdate');
Route::post('/leave/delete', 'UserLeaveController@delete');


//LEAVE (ADMIN)
Route::get('/admin/setup/leave/view', 'LeaveController@adminview');
Route::get('/admin/setup/leave/{results}/edit', 'LeaveController@edit');
Route::post('/admin/setup/leave/{results}/edit', 'LeaveController@save');

//EMPLOYEE LEAVE
Route::get('/admin/setup/eeleave/view', 'EeLeaveController@view');
Route::get('/admin/setup/eeleave/add', 'UserLeaveController@entry');
Route::post('/admin/setup/eeleave/add', 'UserLeaveController@create');
Route::get('/admin/setup/eeleave/{leave}/edit', 'LeaveController@edit');
Route::post('/admin/setup/eeleave/{leave}/edit', 'LeaveController@update');
Route::get('/admin/setup/eeleave/{leave}/delete', 'LeaveController@delete');

//LMS
Route::get('/admin/lms', 'LMSController@view');
Route::get('/admin/lms/{result}/forapproval', 'LMSController@forapproval');
Route::get('/admin/lms/{result}/fordeclinement', 'LMSController@fordeclinement');
Route::get('/admin/lms/all', 'LMSController@view');
Route::get('/admin/lms/pending', 'LMSController@pending');
Route::get('/admin/lms/approved', 'LMSController@approved');
Route::get('/admin/lms/declined', 'LMSController@declined');