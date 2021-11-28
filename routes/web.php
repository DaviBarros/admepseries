<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola',function(){
    echo "Olá mundo!";
});

Route::get('/series', 'SeriesController@index')->name('listaseries');
Route::get('/series/criar', 'SeriesController@create')->name('adicionarserie')->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->name('salvarserie')->middleware('autenticador');
Route::delete('/series/excluir/{id}', 'SeriesController@destroy')->name('excluirtemporada')->middleware('autenticador');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index')->name('temporadas.index');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('autenticador');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('temporadaepisodio');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->name('assistir')->middleware('autenticador');
Route::get('/entrar','EntrarController@index');
Route::post('/entrar','EntrarController@entrar');
Route::get('/erroemail','ErroEmailController@index');
Route::get('/registrar','RegistroController@create')->name('telaregistrousuario');
Route::post('/registrar','RegistroController@store');

Route::get('/sair', function(){
    Auth::logout();
    return redirect('/entrar');
});

