<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Archive;
use App\File;
use App\Subfolder;
class ArchiveController extends Controller
{

    public function index(Subfolder $subfolder){

        $archives = Archive::all();
        return view('AAAstisla.archive.index', compact('archives', $subfolder->id));
    }
    
    public function archive($id, Subfolder $subfolder){
        $file = File::findOrFail($id);

        $id = $file->id;
        $sufolder_id = $file->subfolder_id;
        $filename = $file->filename;
        $description = $file->description;
        $path = $file->path;
        $document = $file->document;
        $created_at = $file->created_at;
        $updated_at = $file->updated_at;

        $file->delete();
        $archive = new Archive();
        $archive->id = $id;
        $archive->subfolder_id = $sufolder_id;
        $archive->filename = $filename;
        $archive->description = $description;
        $archive->path = $path;
        $archive->document = $document;
        $archive->created_at = $created_at;
        $archive->updated_at = $updated_at;
        $archive->save();

        
        return redirect()->route('dashboard.index');
    }
    
    public function download($id){
        $download = Archive::find($id);
        return storage::download($download->path, $download->document);
    }
}
