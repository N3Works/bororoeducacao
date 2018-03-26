<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'description_seo',
        'keywords_seo',
        'content',
        'publish_at',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function tags_comma()
    {
        if (sizeof($this->tags) == 0) {
            return '';
        }

        $tags = [];

        foreach ($this->tags as $tag) {
            $tags[] = $tag->name;
        }

        return implode($tags, ',');
    }

    public function tags_id_array()
    {
        if (sizeof($this->tags) == 0) {
            return [];
        }

        $tags = [];

        foreach ($this->tags as $tag) {
            $tags[] = $tag->id;
        }

        return $tags;
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'publish_at'];
    }

}
