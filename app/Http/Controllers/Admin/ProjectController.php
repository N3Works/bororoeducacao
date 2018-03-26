<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function all(Request $req)
    {

        $filter = \DataFilter::source(new Project());
        $filter->text('src', 'Search');
        $filter->build();

        $grid = \DataGrid::source(new Project());  //same source types of DataSet

        $grid->add('title', 'Título', true); //field name, label, sortable
        $grid->add('created_at', 'Criado em');
        $grid->add('updated_at', 'Atualizado em');

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.projects.edit', $row->slug) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.projects.create'), "Adicionar", "TR");  //add button

        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.projects.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $slug)
    {
        $model = Project::where('slug', $slug)->first();
        return view('admin.projects.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Project;

        return view('admin.projects.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Project;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.projects')
            ->with('message', 'Sucesso! Project salvo!');
    }

    public function remove(Request $req, $id)
    {
        Project::find($id)->delete();
        return response(200);
    }

    public function update(Request $req, $slug)
    {
        $model = Project::where('slug', $slug)->first();

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.projects')
            ->with('message', 'Sucesso! Project salvo!');
    }

    private function save_update($model, $req)
    {
        $model->title = $req->input('title');
        $model->slug = str_slug($model->title);
        $model->customer_name = $req->input('customer_name');
        $model->description = $req->input('description');

        $model->content = $req->input('content');
        $model->updated_at = Carbon::now();

        // Imagens

        $pic_thumbnail = $req->file('thumbnail_img');
        $pic_cover = $req->file('cover_img');

        $model_uuid = uniqid();

        if ($req->hasFile('thumbnail_img')) {
            $pic_thumbnail_path = $this->save_image($model_uuid, $pic_thumbnail, 'thumbnail', isset($model->pic_thumbnail_path) ? $model->pic_thumbnail_path : null);
            $model->thumbnail_img = $pic_thumbnail_path;
        }

        if ($req->hasFile('cover_img')) {
            $pic_cover_path = $this->save_image($model_uuid, $pic_cover, 'cover', isset($model->pic_cover_path) ? $model->pic_cover_path : null);
            $model->cover_img = $pic_cover_path;
        }

        $model->save();
    }

    private function save_image($model_uuid, $file, $pic_type, $file_path)
    {

        if (!isset($file_path)) {
            $file_uuid = uniqid();
            $file_path = $model_uuid . '/' . $pic_type . '/' . $file_uuid . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('public_projects')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

}
