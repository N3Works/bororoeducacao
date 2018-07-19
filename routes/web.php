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


//Route::get('/importar-posts', 'HomeController@readXml');

Route::get('/', ['as' => 'site.index', 'uses' => 'HomeController@index']);
Route::post('/registro-newsletter', ['as' => 'site.register_newsletter', 'uses'=> 'HomeController@register_newsletter']);

Route::get('/o-que-fazemos/editora-bororo25/livros', ['as' => 'site.services.livros', 'uses' => 'ServiceController@livros']);
Route::get('/o-que-fazemos/editora-bororo25/ebooks', ['as' => 'site.services.ebooks', 'uses' => 'ServiceController@ebooks']);
Route::get('/o-que-fazemos/editora-bororo25/ead', ['as' => 'site.services.ead', 'uses' => 'ServiceController@ead']);
Route::post('/o-que-fazemos/editora-bororo25', ['as' => 'site.services.books.download', 'uses'=> 'ServiceController@ebook_download']);
Route::get('/o-que-fazemos/cursos-workshops-cine-grupo-reflexao', ['as' => 'site.services.cursos', 'uses' => 'ServiceController@cursos']);
Route::get('/o-que-fazemos/trabalho-emocional', ['as' => 'site.services.trabalho_terapeutico', 'uses' => 'ServiceController@trabalho_terapeutico']);
Route::get('/o-que-fazemos/espaco-terapeutico', ['as' => 'site.services.espaco', 'uses' => 'ServiceController@espaco_terapeutico']);
Route::get('/o-que-fazemos/coworking-b25', ['as' => 'site.coworking_b25', 'uses' => 'ServiceController@coworking_b25']);
Route::get('/o-que-fazemos/parceiros', ['as' => 'site.services.parceiros', 'uses' => 'ServiceController@parceiros']);
Route::get('/o-que-fazemos/para-empresas/produtos', ['as' => 'site.services.produtos', 'uses' => 'ServiceController@produtos']);
Route::get('/o-que-fazemos/para-empresas/tecnologia-de-gestao-emocional', ['as' => 'site.services.tge', 'uses' => 'ServiceController@tge']);
Route::get('/o-que-fazemos/grupo-de-reflexao', ['as' => 'site.services.grupo_reflexao', 'uses' => 'ServiceController@grupo_reflexao']);
Route::get('/o-que-fazemos/bororo-solidario', ['as' => 'site.services.bororo_solidario', 'uses' => 'ServiceController@bororo_solidario']);

Route::get('/quem-somos', ['as' => 'site.about', 'uses' => 'AboutController@index']);
Route::get('/quem-somos/metodo-curacao', ['as' => 'site.about_metodo_curacao', 'uses' => 'AboutController@metodo_curacao']);
Route::get('/quem-somos/carta-manifesto', ['as' => 'site.about_carta_manifesto', 'uses' => 'AboutController@carta_manifesto']);
Route::get('/quem-somos/coletivo/{id}', ['as' => 'site.about_coletivo_detail', 'uses' => 'AboutController@coletivo_detail']);

Route::get('/agenda-de-eventos', ['as' => 'site.events', 'uses' => 'EventController@index']);
Route::get('/agenda-de-eventos/{id}', ['as' => 'site.events.detail', 'uses' => 'EventController@detail']);
Route::post('/agenda-de-eventos/{slug}', ['as' => 'site.events.save', 'uses' => 'EventController@save']);

Route::get('/blog', ['as' => 'site.blog', 'uses' => 'BlogController@index']);
Route::get('/blog/{id}', ['as' => 'blog.post', 'uses' => 'BlogController@detail']);
Route::get('/contato', ['as' => 'site.contact', 'uses' => 'HomeController@contact']);
Route::post('/contato', 'HomeController@send');
Route::get('/conteudo', 'HomeController@content');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);

    Route::get('/postagem/listar', ['as' => 'admin.posts', 'uses' => 'PostController@all']);
    Route::get('/postagem', ['as' => 'admin.posts.create', 'uses' => 'PostController@create']);
    Route::post('/postagem', ['as' => 'admin.posts.save', 'uses' => 'PostController@save']);
    Route::get('/postagem/{slug}', ['as' => 'admin.posts.edit', 'uses' => 'PostController@edit']);
    Route::post('/postagem/{slug}', ['as' => 'admin.posts.update', 'uses' => 'PostController@update']);
    Route::post('/postagem/remover/{id?}', ['as' => 'admin.posts.remove', 'uses' => 'PostController@remove']);

    Route::get('/projeto/listar', ['as' => 'admin.projects', 'uses' => 'ProjectController@all']);
    Route::get('/projeto', ['as' => 'admin.projects.create', 'uses' => 'ProjectController@create']);
    Route::post('/projeto', ['as' => 'admin.projects.save', 'uses' => 'ProjectController@save']);
    Route::get('/projeto/{slug}', ['as' => 'admin.projects.edit', 'uses' => 'ProjectController@edit']);
    Route::post('/projeto/{slug}', ['as' => 'admin.projects.update', 'uses' => 'ProjectController@update']);
    Route::post('/projeto/remover/{id?}', ['as' => 'admin.projects.remove', 'uses' => 'ProjectController@remove']);

    Route::get('/pessoa/listar', ['as' => 'admin.persons', 'uses' => 'PersonController@all']);
    Route::get('/pessoa', ['as' => 'admin.persons.create', 'uses' => 'PersonController@create']);
    Route::post('/pessoa', ['as' => 'admin.persons.save', 'uses' => 'PersonController@save']);
    Route::get('/pessoa/{id}', ['as' => 'admin.persons.edit', 'uses' => 'PersonController@edit']);
    Route::post('/pessoa/{id}', ['as' => 'admin.persons.update', 'uses' => 'PersonController@update']);
    Route::post('/pessoa/remover/{id?}', ['as' => 'admin.persons.remove', 'uses' => 'PersonController@remove']);

    Route::get('/evento/listar', ['as' => 'admin.courses', 'uses' => 'CourseController@all']);
    Route::get('/evento', ['as' => 'admin.courses.create', 'uses' => 'CourseController@create']);
    Route::post('/evento', ['as' => 'admin.courses.save', 'uses' => 'CourseController@save']);
    Route::get('/evento/{id}', ['as' => 'admin.courses.edit', 'uses' => 'CourseController@edit']);
    Route::post('/evento/{id}', ['as' => 'admin.courses.update', 'uses' => 'CourseController@update']);
    Route::post('/evento/remover/{id?}', ['as' => 'admin.courses.remove', 'uses' => 'CourseController@remove']);

    Route::get('/recursos/listar', ['as' => 'admin.resources', 'uses' => 'ResourcesController@all']);
    Route::get('/recursos', ['as' => 'admin.resources.create', 'uses' => 'ResourcesController@create']);
    Route::post('/recursos', ['as' => 'admin.resources.save', 'uses' => 'ResourcesController@save']);
    Route::get('/recursos/{slug}', ['as' => 'admin.resources.edit', 'uses' => 'ResourcesController@edit']);
    Route::post('/recursos/{slug}', ['as' => 'admin.resources.update', 'uses' => 'ResourcesController@update']);
    Route::post('/recursos/remover/{id?}', ['as' => 'admin.resources.remove', 'uses' => 'ResourcesController@remove']);

    Route::get('/videos/listar', ['as' => 'admin.videos', 'uses' => 'VideosController@all']);
    Route::get('/videos', ['as' => 'admin.videos.create', 'uses' => 'VideosController@create']);
    Route::post('/videos', ['as' => 'admin.videos.save', 'uses' => 'VideosController@save']);
    Route::get('/videos/{id}', ['as' => 'admin.videos.edit', 'uses' => 'VideosController@edit']);
    Route::post('/videos/{id}', ['as' => 'admin.videos.update', 'uses' => 'VideosController@update']);
    Route::post('/videos/remover/{id?}', ['as' => 'admin.videos.remove', 'uses' => 'VideosController@remove']);

    Route::get('/relatorio', ['as' => 'admin.report.index', 'uses' => 'ReportController@index']);
    Route::post('/relatorio', ['as' => 'admin.report.index', 'uses' => 'ReportController@index']);
    Route::post('/relatorio/{id?}', ['as' => 'admin.report.remove', 'uses' => 'ReportController@remove']);
    Route::get('/relatorio/download/{id}', ['as' => 'admin.report.download', 'uses' => 'ReportController@download_csv']);
});

Route::group(['namespace' => 'Site'], function () {

    Route::get('/recursos/download/{slug?}', ['as' => 'resources.download', 'uses' => 'StorageController@download_resource']);

});
