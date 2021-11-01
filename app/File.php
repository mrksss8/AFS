<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subfolder;

class File extends Model
{

    protected $guarded = [];
    public function subfolder()
    {
        return $this->belongsTo(Subfolder::class);
    }    

    protected $dates = ['created_at'];
}
