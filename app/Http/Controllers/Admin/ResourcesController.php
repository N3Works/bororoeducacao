<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResourcesController extends Controller
{
    public function all(Request $req)
    {
        $name = $req->query('name');

        $filter = \DataFilter::source(new Resources());
        $filter->text('name', 'Nome');
        $filter->submit('Pesquisar');
        $filter->reset('Limpar');
        $filter->build();

        $grid = \DataGrid::source(Resources::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }));

        $grid->add('name', 'Nome', true); //field name, label, sortable
        $grid->add('resource_type', 'Tipo')->cell(function ($value, $row) {
            if ($value == 'ebook')
                return 'E-book';

            if ($value == 'template')
                return 'Template';
        });
        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Criado em', true);
        $grid->add('updated_at|strtotime|date[d/m/Y H:i]', 'Atualizado em', true);

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.resources.edit', $row->slug) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.resources.create'), "Adicionar", "TR");  //add button
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.resources.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $slug)
    {
        $model = Resources::where('slug', $slug)->first();
        return view('admin.resources.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Resources;

        return view('admin.resources.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Resources;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.resources')
            ->with('message', 'Sucesso! Recurso salvo!');
    }

    public function remove(Request $req, $id)
    {
        $resource = Resources::find($id);
        $this->delete_file($resource);
        $resource->delete();
        return response(200);
    }

    public function update(Request $req, $slug)
    {
        $model = Resources::where('slug', $slug)->first();

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.resources')
            ->with('message', 'Sucesso! Resources salvo!');
    }

    private function save_update($model, $req)
    {
        $model->name = $req->input('name');
        $model->position = $req->input('position');
        $model->slug = str_slug($model->name);
        $model->description = $req->input('description');
        $model->resource_type = $req->input('resource_type');
        $model->resource_file_name = $req->input('resource_file_name');
        $model->is_active = $req->input('is_active') == 'on';
        $model->updated_at = Carbon::now();

        // Imagens

        $pic_thumbnail = $req->file('thumbnail_img');

        $model_uuid = uniqid();

        if ($req->hasFile('thumbnail_img')) {
            $pic_thumbnail_path = $this->save_image($model_uuid, $pic_thumbnail, 'thumbnail', isset($model->pic_thumbnail_path) ? $model->pic_thumbnail_path : null);
            $model->thumbnail_img = $pic_thumbnail_path;
        }

        $resource_file = $req->file('resource_file');

        if ($req->hasFile('resource_file')) {
            $file_path = $this->save_file($resource_file, $req->input('resource_file_name'), $model->resource_type, isset($model->resource_file) ? $model->resource_file : null);
            $model->resource_file = $file_path;
        }

        $model->save();
    }

    private function save_image($model_uuid, $file, $pic_type, $file_path)
    {

        if (!isset($file_path)) {
            $file_uuid = uniqid();
            $file_path = $model_uuid . '/' . $pic_type . '/' . $file_uuid . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('public_resources')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

    private function save_file($file, $file_name, $file_category, $file_path)
    {

        if (!isset($file_path)) {
            $file_path = $file_category . '/' . $file_name . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('private_resources')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

    private function delete_file($model) {
        if ($model->thumbnail_img) {
            Storage::disk('public_resources')->delete($model->thumbnail_img);
        }

        if ($model->resource_file) {
            Storage::disk('private_resources')->delete($model->resource_file);
        }
    }
}
