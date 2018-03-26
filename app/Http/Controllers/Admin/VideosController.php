<?php

namespace App\Http\Controllers\Admin;

use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    public function all(Request $req)
    {

        $filter = \DataFilter::source(new Videos());
        $filter->text('src', 'Search');
        $filter->build();

        $grid = \DataGrid::source(new Videos());  //same source types of DataSet

        $grid->add('title', 'Título', true); //field name, label, sortable
        $grid->add('created_at_formatted', 'Criado em');
        $grid->add('updated_at_formatted', 'Atualizado em');

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.videos.edit', $row->id) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.videos.create'), "Adicionar", "TR");  //add button

        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.videos.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $id)
    {
        $model = Videos::find($id);
        return view('admin.videos.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Videos;

        return view('admin.videos.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Videos;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.videos')
            ->with('message', 'Sucesso! Recurso salvo!');
    }

    public function remove(Request $req, $id)
    {
        Videos::find($id)->delete();
        return response(200);
    }

    public function update(Request $req, $id)
    {
        $model = Videos::find($id);

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.videos')
            ->with('message', 'Sucesso! Videos salvo!');
    }

    private function save_update($model, $req)
    {
        $model->title = $req->input('title');
        $model->description = $req->input('description');
        $model->video_link = $req->input('video_link');

        $model->save();
    }

}
