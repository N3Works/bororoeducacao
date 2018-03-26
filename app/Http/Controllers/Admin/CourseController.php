<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function all(Request $req)
    {
        $title = $req->query('title');

        $filter = \DataFilter::source(new Course());
        $filter->text('title', 'Título');
        $filter->submit('Pesquisar');
        $filter->reset('Limpar');
        $filter->build();

        $grid = \DataGrid::source(Course::when($title, function ($query) use ($title) {
            return $query->where('title', 'like', '%' . $title . '%');
        }));  //same source types of DataSet
        $grid->add('title', 'Título', true); //field name, label, sortable
        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Criado em', true);
        $grid->add('updated_at|strtotime|date[d/m/Y H:i]', 'Atualizado em', true);

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.courses.edit', $row->slug) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.courses.create'), "Adicionar", "TR");  //add button
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.courses.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $slug)
    {
        $model = Course::where('slug', $slug)->first();
        return view('admin.courses.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Course;
        $model->is_active = true;
        $model->start_at = Carbon::now();
        $model->end_at = Carbon::now();

        return view('admin.courses.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Course;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.courses')
            ->with('message', 'Sucesso! Course salvo!');
    }

    public function remove(Request $req, $id)
    {
        $course = Course::find($id);
        $this->delete_file($course);
        $course->delete();
        return response(200);
    }

    public function update(Request $req, $slug)
    {
        $model = Course::where('slug', $slug)->first();

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.courses')
            ->with('message', 'Sucesso! Course salvo!');
    }

    private function save_update($model, $req)
    {
        $model->title = $req->input('title');
        $model->slug = str_slug($model->title);
        $model->description = $req->input('description');
        $model->video_link = $req->input('video_link');
        $model->price = $req->input('price');

        if ($model->price == '' ||  $model->price == null || !isset($model->price)) {
            $model->price = 0;
        }

        $model->pagseguro_code = $req->input('pagseguro_code');
        $model->pagseguro_button = $req->input('pagseguro_button');

        $model->address = $req->input('address');
        $model->location = $req->input('location');
        $model->latitude = $req->input('latitude');
        $model->longitude = $req->input('longitude');

        $model->description_seo = $req->input('description_seo');
        $model->keywords_seo = $req->input('keywords_seo');

        $model->duration = $req->input('duration');
        $model->start_at = Carbon::createFromFormat('d/m/Y', $req->input('start_at'));
        $model->start_time = $req->input('start_time');
        $model->end_at = Carbon::createFromFormat('d/m/Y', $req->input('end_at'));
        $model->end_time = $req->input('end_time');

        $model->content = $req->input('content');
        $model->is_active = $req->input('is_active') == 'on';
        $model->is_price_visible = $req->input('is_price_visible') == 'on';
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

        // Tags

        // $model->professors()->detach();
        // $professors = $req->input('professor');
        // $model->professors()->attach($professors);

        $model->save();
    }

    private function save_image($model_uuid, $file, $pic_type, $file_path)
    {

        if (!isset($file_path)) {
            $file_uuid = uniqid();
            $file_path = $model_uuid . '/' . $pic_type . '/' . $file_uuid . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('public_courses')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

    private function delete_file($model) {
        if ($model->thumbnail_img) {
            Storage::disk('public_courses')->delete($model->thumbnail_img);
        }

        if ($model->cover_img) {
            Storage::disk('public_courses')->delete($model->cover_img);
        }
    }
}
