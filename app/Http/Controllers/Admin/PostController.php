<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function all(Request $req)
    {
        $title = $req->query('title');

        $filter = \DataFilter::source(new Post());
        $filter->text('title', 'Título');
        $filter->submit('Pesquisar');
        $filter->reset('Limpar');
        $filter->build();

        $grid = \DataGrid::source(Post::when($title, function ($query) use ($title) {
            return $query->where('title', 'like', '%' . $title . '%');
        })); 

        $grid->add('title', 'Título', true); //field name, label, sortable
        $grid->add('publish_at|strtotime|date[d/m/Y]', 'Publicar em', true);
        $grid->add('created_at|strtotime|date[d/m/Y H:i]', 'Criado em', true);
        $grid->add('updated_at|strtotime|date[d/m/Y H:i]', 'Atualizado em', true);

        //cell closure
        $grid->add('actions', 'Ações')->cell(function ($value, $row) {
            return '<a href="' . route('admin.posts.edit', $row->id) . '" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>'
            . '<a href="#" class="btn btn-sm btn-remove btn-danger" data-id="' . $row->id . '"><i class="fa fa-trash"></i></a>';
        });


        $grid->link(route('admin.posts.create'), "Adicionar", "TR");  //add button
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->orderBy('id', 'desc'); //default orderby
        $grid->paginate(10); //pagination

        return view('admin.posts.all', compact('filter', 'grid'));
    }

    public function edit(Request $req, $id)
    {
        $model = Post::findOrFail($id);
        return view('admin.posts.edit', compact('model'));
    }

    public function create(Request $req)
    {
        $model = new Post;
        $model->is_active = true;
        $model->publish_at = Carbon::now();

        return view('admin.posts.edit', compact('model'));
    }

    public function save(Request $req)
    {
        $model = new Post;

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.posts')
            ->with('message', 'Sucesso! Post salvo!');
    }

    public function remove(Request $req, $id)
    {
        $post = Post::find($id);
        $this->delete_file($post);
        $post->delete();
        return response(200);
    }

    public function update(Request $req, $id)
    {
        $model = Post::findOrFail($id);

        $this->save_update($model, $req);

        return redirect()
            ->route('admin.posts')
            ->with('message', 'Sucesso! Post salvo!');
    }

    private function save_update($model, $req)
    {
        $model->title = $req->input('title');
        $model->publish_at = Carbon::createFromFormat('d/m/Y', trim($req->input('publish_at')));
        $model->slug = url('/') . '/' . $model->publish_at->format('Y') . '/' . $model->publish_at->format('m') . '/' . str_slug($model->title);

        $model->description = $req->input('description');

        $model->description_seo = $req->input('description_seo');
        $model->keywords_seo = $req->input('keywords_seo');

        $model->content = $req->input('content');
        $model->is_active = $req->input('is_active') == 'on';
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
        $tags_bd = $model->tags_id_array();
        $model->tags()->detach();

        if ($tags_bd) {
            Tag::whereIn('id', $tags_bd)->delete();
        }

        $tags = explode(',', $req->input('post_tags'));
        $stags = [];
        foreach ($tags as $tag) {
            $stags[] = new Tag([
                'name' => $tag
            ]);
        }

        // $model->tags()->insert($stags);
        $model->tags()->saveMany($stags);
        $model->save();
    }

    private function save_image($model_uuid, $file, $pic_type, $file_path)
    {

        if (!isset($file_path)) {
            $file_uuid = uniqid();
            $file_path = $model_uuid . '/' . $pic_type . '/' . $file_uuid . '.' . $file->getClientOriginalExtension();
        }

        Storage::disk('public_posts')->put(
            $file_path,
            file_get_contents($file->getRealPath())
        );

        return $file_path;
    }

    private function delete_file($model) {
        if ($model->thumbnail_img) {
            Storage::disk('public_posts')->delete($model->thumbnail_img);
        }

        if ($model->cover_img) {
            Storage::disk('public_posts')->delete($model->cover_img);
        }
    }
}
