<?php



Route::get('/', [
    'as' => 'home',
    'uses' => 'RoomsController@index'
]);

Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);


Route::post('/{id}/comments', [
    'as' => 'comment_path',
    'uses' => 'CommentsController@store'
]);

Route::post('/{id}/likes', [
    'as' => 'like_path',
    'uses' => 'LikesController@store'
]);

Route::post('/{id}/unlikes',[
    'as' => 'unlike_path',
    'uses' => 'LikesController@destroy'
]);

Route::get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

Route::post('follows', [
    'as' => 'follows_path',
    'uses' => 'FollowsController@store'
]);

Route::delete('follows/{id}', [
    'as' => 'follow_path',
    'uses' => 'FollowsController@destroy'
]);

Route::controller('password', 'RemindersController');

Route::post('upload', [
    'as' => 'upload_path',
    'uses' => 'UploadsController@index'
]);

Route::post('/uploadd', 'UploadsController@store');

Route::post('/', [
    'as' => 'uploading_path',
    'uses' => 'RoomsController@store']);

Route::post('delete-image','UploadsController@destroy');

Route::get('update', [
    'as' => 'update_path',
    'uses' => 'UpdateController@index']);

Route::get('/decisiontree',function(){
    return View::make('decisiontree.index');
});