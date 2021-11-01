<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\File;
use App\Folder;
use App\Subfolder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(){

        if (Auth::user()->role == 'Admin') {
            $files = File::latest()->take(5)->get();
            $fileCount = File::count();
            $sharedFiles = File::all();
        } else {
            $sharedFiles = File::all();
            $files = File::latest()->take(5)->where('role', Auth::user()->role)->get();
            $fileCount = File::where('role', Auth::user()->role)->count();
        }
            

        //$files = File::latest()->take(5)->where('role', Auth::user()->role)->get();
        $roles = Role::all();
        $folderCount = Folder::where('role', Auth::user()->role)->count();
        $subfolderCount = Subfolder::count();
        
        
        $lastActivity = Activity::all();

        return view('AAAstisla.dashboard.index', compact('fileCount', 'folderCount', 'subfolderCount', 'files', 'lastActivity', 'sharedFiles', 'roles'));

    }
}
