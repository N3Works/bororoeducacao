<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    public function all(Request $req)
    {
        $name = $req->query('name');
        $is_partner = $req->query('is_partner');

        $filter = \DataFilter::source(new Person());
        $filter->text('name', 'Nome');
        $filter->add('is_partner','Parceiro/Coletivo','checkboxgroup')->option('1', 'Parceiro')->option('0', 'Coletivo');
        $filter->submit('Pesquisar');
        $filter->reset('Limpar');
        $filter->build();

        $grid = \DataGrid::source($filter);

        $grid->add('name', 'Nome', true); //field name, label, sortable
        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Criado em', true);
        $grid->add('updated_at|strtotime|date[d/m/Y H:i]', 'Atualizado em', true);
        $grid->add('is_partner', 'Tipo')->cell(function ($value, $row) {
            if ($row->is_partner) {
                return 'Parceiro';
            } else {
                return 'Coletivo';
            }

        });
        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.persons.edit', $row->id) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.persons.create'), "Adicionar", "TR");  //add button
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.persons.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $id)
    {
        $model = Person::find($id);
        return view('admin.persons.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Person;

        return view('admin.persons.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Person;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.persons')
            ->with('message', 'Sucesso! Person salvo!');
    }

    public function remove(Request $req, $id)
    {
        $person = Person::find($id);
        $this->delete_file($person);
        $person->delete();
        return response(200);
    }

    public function update(Request $req, $id)
    {
        $model = Person::find($id);

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.persons')
            ->with('message', 'Sucesso! Person salvo!');
    }

    public function search(Request $req)
    {
        $name = $req->input('name');

        $results = DB::table('person')->where([
            ['name', 'like', '%' . $name . '%']
        ])->select('name as text', 'id')
            ->get();

        return response()->json([
            'results' => $results
        ]);
    }

    private function save_update($model, $req)
    {
        $model->name = $req->input('name');
        $model->url_facebook = $req->input('url_facebook');
        $model->url_linkedin = $req->input('url_linkedin');
        $model->url_instagram = $req->input('url_instagram');
        $model->description = $req->input('description');
        $model->position = $req->input('position');
        $model->content = $req->input('content');
        $model->is_partner = $req->input('is_partner') == 'on';
        $model->updated_at = Carbon::now();

        // Imagens

        $pic_thumbnail = $req->file('thumbnail_img');

        $model_uuid = uniqid();

        if ($req->hasFile('thumbnail_img')) {
            $pic_thumbnail_path = $this->save_image($model_uuid, $pic_thumbnail, 'thumbnail', isset($model->pic_thumbnail_path) ? $model->pic_thumbnail_path : null);
            $model->thumbnail_img = $pic_thumbnail_path;
        }

        $model->save();
    }

    private function save_image($model_uuid, $file, $pic_type, $file_path)
    {

        if (!isset($file_path)) {
            $file_uuid = uniqid();
            $file_path = $model_uuid . '/' . $pic_type . '/' . $file_uuid . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('public_persons')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

    private function delete_file($model) {
        if ($model->thumbnail_img) {
            Storage::disk('public_persons')->delete($model->thumbnail_img);
        }
    }
}
