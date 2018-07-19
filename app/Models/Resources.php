<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resources extends Model
{
    //
    protected $table = 'resource';

    public function getFile()
    {
        return Storage::disk('private_resources')->get($this->resource_file);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:m');
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format('d/m/Y H:m');
    }

}
