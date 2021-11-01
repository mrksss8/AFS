<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Folder;
use App\File;

class Subfolder extends Model
{
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
