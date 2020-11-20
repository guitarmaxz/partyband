<?php

use App\Musico;
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
//FIXO
Auth::routes();


//ROTA INICIAL
Route::get('/', function () {
    return view('auth.login');
})->name('index'); 

/* Route::view('/', 'auth.login')->name('index'); */

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('cadastro', 'CadastroController@index')->name('cadastro');
Route::post('cadastro/store', 'CadastroController@store')->name('cadastro.store');




//ROTAS PARA ADMINISTRADOR

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        
        //GESTAO
        Route::get('inicio', 'UserController@index')->name('logado');
        Route::get('senha', 'UserController@senhaAdmin')->name('senha');
        Route::get('adicionar', 'UserController@adicionarAdmin')->name('adicionar');
        Route::put('senha/atualizar', 'UserController@updateSenha')->name('updatesenha');    
        Route::post('admin/atualizar', 'UserController@addAdmin')->name('store'); 
        Route::post('admin/postar', 'PostController@postar')->name('postar'); 
        //KRUD   
        Route::resource('instrumentos', 'InstrumentoController');
        Route::resource('generos', 'GeneroController');
        Route::resource('usuarios', 'UserController');
        Route::resource('bandas', 'BandaController');
        Route::resource('posts', 'PostController');
    }); 
});

//ROTAS PARA USUARIOS AUTENTICADOS
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mostrar', 'HomeController@show')->name('mostrar');
    Route::post('/postar', 'HomeController@postar')->name('postar');
    Route::post('/search', 'HomeController@search')->name('search');
    Route::get('/perfil', 'HomeController@perfil')->name('perfil');
    Route::put('/senha', 'HomeController@updateSenha')->name('updatesenhaa');
    Route::put('/dados', 'HomeController@update')->name('update');
    Route::get('/delete/completo', 'HomeController@destroy')->name('destroy');

}); 


