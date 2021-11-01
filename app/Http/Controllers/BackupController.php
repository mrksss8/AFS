<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Storage;
use App\ListofBackup;


class backupController extends Controller
{

  public function index(){
    return view('AAAstisla.backup.index');
  }

     public function generateAndDownload(){
      Artisan::call('backup:run --only-files');


      $latestBackup = ListofBackup::latest()->first('path')->path;
       return Storage::download($latestBackup);

     }
}
