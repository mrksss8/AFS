<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFolderRequest;
use App\Folder;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use App\Roles;
use Auth;
class FolderController extends Controller
{
    use HasRoles;

    public function create(){
        $roles = Roles::all();
        return view('AAAstisla.folder.create', compact('roles'));
    }

    public function store(AddFolderRequest $request){

            $folder = new Folder;
            $folder->folder_name = $request->foldername;
            $folder->role = Auth::user()->role;
            $folder->save();
           // auth()->user()->assignRole($request->folderrole);

        return redirect()->route('dashboard.index')->with('Folderadded', 'Folder added sucessfully!');
}
}
