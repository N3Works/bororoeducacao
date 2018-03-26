<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Professor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfessorController extends Controller
{
    public function all(Request $req)
    {

        $filter = \DataFilter::source(new Professor());
        $filter->text('src', 'Search');
        $filter->build();

        $grid = \DataGrid::source(new Professor());  //same source types of DataSet

        $grid->add('name', 'Nome', true); //field name, label, sortable
        $grid->add('created_at', 'Criado em');
        $grid->add('updated_at', 'Atualizado em');

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.professors.edit', $row->id) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.professors.create'), "Adicionar", "TR");  //add button

        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.professors.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $id)
    {
        $model = Professor::find($id);
        return view('admin.professors.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Professor;

        return view('admin.professors.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Professor;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.professors')
            ->with('message', 'Sucesso! Professor salvo!');
    }

    public function remove(Request $req, $id)
    {
        Professor::find($id)->delete();
        return response(200);
    }

    public function update(Request $req, $id)
    {
        $model = Professor::find($id);

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.professors')
            ->with('message', 'Sucesso! Professor salvo!');
    }

    public function search(Request $req)
    {
        $name = $req->input('name');

        $results = DB::table('professor')->where([
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
        $model->description = $req->input('description');
        $model->content = $req->input('content');
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

        Storage::disk('public_professors')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

}
