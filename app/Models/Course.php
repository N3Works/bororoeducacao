<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    protected $fillable = [
        'title',
        'description',
        'content',
        'thumbnail_img',
        'cover_img',
        'address',
        'latitude',
        'longitude',
        'location',
        'duration',
        'start_at',
        'end_at',
        'start_time',
        'end_time',
        'price',
        'is_price_visible',
        'created_at',
        'updated_at',
        'slug',
        'keywords_seo',
        'description_seo',
        'video_link',
        'is_active',
        'pagseguro_button',
        'pagseguro_code'
    ];

    /**
     * @return array
     */
    public function professors()
    {
        return $this->belongsToMany('App\Models\Professor', 'course_professor');
    }

    public function getPriceAttribute($value)
    {
        return converter_monetario_vw($value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = converter_monetario_db($value);
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'start_at', 'end_at'];
    }
}
