<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tag';
    public $fillable = ['id', 'name'];
    public $timestamps = false;

}
