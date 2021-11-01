<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subfolder;
use Spatie\Permission\Traits\Hasroles;


class Folder extends Model
{

    use Hasroles;
    
    protected $table = 'folders';
    protected $fillable = ['folder_name'];
    //public $timestamps = false;

    public function subfolders()
    {
        return $this->hasMany(Subfolder::class);
    }

    public function getNameIdAttribute()
    {
        return "folder{$this->id}";
    }
}
