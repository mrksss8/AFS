<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddFileRequest;

use Auth;
use App\File;
use App\Folder;
use App\Subfolder;
use Spatie\Permission\Models\Role;

class FileController extends Controller
{
  
    public function index(Folder $folder, Subfolder $subfolder)
    {
        // $count_file = File::withcount('subfolder')
        //  ->where('subfolder_id', $subfolder->id)
        //   ->get();

        $roles = Role::all();
        $files = File::with('subfolder')
            ->where('subfolder_id', $subfolder->id)
            ->get();
        return view('AAAstisla.files.index', compact('files','subfolder','folder','roles'));


    }

    public function create($folder, $subfolder, $subfolder_id){

        return view('AAAstisla.files.create', compact('folder', 'subfolder' , 'subfolder_id'));
    }

    public function store(AddFileRequest $request, $folder, $subfolder, $subfolder_id){


        $file = new File;   
        if ($request->hasFile('file')) {
            $upload = $request->file('file');   
            $path = $upload->store("public/storage/$folder/$subfolder");  
            $file->document = $upload->getClientOriginalName();   
            $file->filename = $request->filename;
            $file->description = $request->description; 
            $file->path = $path;
            $file->subfolder_id = $request->subfolder_id;
            $file->role = Auth::user()->role;
            $file->status = "NotShared";
         }
         $file->save();

       return redirect()->route('dashboard.index')->with('Fileadded', 'File added sucessfully!');
       // return redirect()->route('files.index', $subfolder_id)->with('Fileadded', 'File added sucessfully!');
    

}

    public function edit($fileid){

         $file = File::findOrfail($fileid);
        return view('AAAstisla.files.edit', compact('file'));
    }

    public function update(Request $request, $fileid){
        
        $fileupdate = File::findOrfail($fileid);
        $fileupdate->update(
            $request->all()
        );
        return redirect()->route('dashboard.index');


   }

    public function download($id){
        $download = File::find($id);
        activity()->log(Auth::user()->name.' downloaded the file '. $download->filename);
        
        return storage::download($download->path, $download->document);
        
    }

    public function share(Request $request, $id){
        
        // dd($request->status);

         File::where('id','=',$id)->update([
             'status' => $request->status
         ]);

        return redirect()->back();
    }
    
        
}