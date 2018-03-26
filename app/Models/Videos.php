<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Videos extends Model
{
    //
    protected $table = 'videos';

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:m');
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format('d/m/Y H:m');
    }

}
