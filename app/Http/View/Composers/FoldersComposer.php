<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Folder;

class FoldersComposer
{
    public function compose(View $view)
    {
        $userRole = auth()->user()->role;
        //dd($userRole);
        $view->with('folders', Folder::with('subfolders')
        ->orderByRaw('folder_name ASC')
        ->get());
    }
}