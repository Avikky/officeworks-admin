<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'department-sections' => 'API\SectionController'
]);
Route::get('department-section/check-sec-head/{name}', 'API\SectionController@checkSectionHead');
// department route
Route::get('departments', 'API\DepartmentController@index' );
Route::get('department/get-hod/{id}', 'API\DepartmentController@getHod' );
Route::get('department/{param}', 'API\DepartmentController@show' );
Route::post('department', 'API\DepartmentController@store' );
Route::put('department/{id}', 'API\DepartmentController@update' );
Route::delete('department/{id}', 'API\DepartmentController@destroy' );

//employee routes
Route::get('employees', 'API\EmployeeController@index' );
Route::get('employees/without-head-title', 'API\EmployeeController@employeesWithOutTitle' );
Route::get('employee/{id}', 'API\EmployeeController@show');
Route::post('employee', 'API\EmployeeController@store');
Route::put('employee/{id}', 'API\EmployeeController@update');
Route::get('employee/with-dept/{id}', 'API\EmployeeController@getEmployeeDept');
Route::delete('employee/{id}', 'API\EmployeeController@destroy');
Route::get('employees/with-position', 'API\EmployeeController@getEmployee' );
Route::put('employee/assign-position/{id}', 'Api\EmployeeController@updateDepartmentAndPosition');
Route::put('employee/enable/{id}', 'Api\EmployeeController@enableEmployee');
Route::put('employee/disable/{id}', 'Api\EmployeeController@disableEmployee');
Route::delete('employee/admin-delete/{id}', 'API\EmployeeController@adminDelete');
//positions / rank routes
Route::get('positions', 'API\PositionController@index' );
Route::get('position/{id}', 'API\PositionController@show');
Route::post('position', 'API\PositionController@store');
Route::put('position/{id}', 'API\PositionController@update');
Route::put('position/assign/{id}', 'API\PositionController@updateEmployeePosition');
Route::delete('position/{id}', 'API\PositionController@destroy');



