<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListofBackup extends Model
{
    protected $table = "listofbackup";
    protected $fillable = ['path'];
}
