<?php

namespace App\Http\Controllers;
use DateTime;
use DB;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $req)
    {
        $offset = $req->input('offset') != null ? $req->input('offset') : 0;
        $tag = $req->input('tag');
        $date = new DateTime;
        $formatted_date = $date->format('Y-m-d H:i:s');

        if ($tag) {
            $posts = DB::table('post')
                ->join('post_tag', 'post.id', '=', 'post_tag.post_id')
                ->join('tag', function ($join) use ($tag) {
                    $join->on('post_tag.tag_id', '=', 'tag.id')
                    ->where('tag.name', $tag);
                })
                ->where([
                    ['is_active', 1],
                    ['publish_at', '<=', $formatted_date]
                ])
                ->orderBy('publish_at', 'desc')
                ->skip($offset * 6)
                ->take(6)
                ->get();

            $count = DB::table('post')
                    ->join('post_tag', 'post.id', '=', 'post_tag.post_id')
                    ->join('tag', function ($join) use ($tag) {
                        $join->on('post_tag.tag_id', '=', 'tag.id')
                        ->where('tag.name', $tag);
                    })
                    ->where('is_active', 1)->count();
        } else {
            $posts = Post::where([
                    ['is_active', 1],
                    ['publish_at', '<=', $formatted_date]
                ])
                ->orderBy('publish_at', 'desc')
                ->skip($offset * 6)
                ->take(6)
                ->get();

            $count = Post::where('is_active', 1)->count();
        }

        $last = Post::where([
                ['is_active', 1],
                ['publish_at', '<=', $formatted_date]
            ])
            ->orderBy('publish_at', 'desc')
            ->take(6)
            ->get();

        $tags = Tag::whereNotNull('name')->where('name', '<>', '')->distinct()->get();

        return view('site.blog.index', compact('posts', 'offset', 'count', 'last', 'tags'));
    }

    public function detail(Request $req, $id)
    {
        $model = Post::where('id', $id)->first();

        $last = Post::where([
            ['is_active', '=', '1'],
            ['id', '<', $model->id]
        ])->first();

        $next = Post::where([
            ['is_active', '=', '1'],
            ['id', '>', $model->id]
        ])->first();

        return view('site.blog.detail', compact('model', 'last', 'next'));
    }
}
