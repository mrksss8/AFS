<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\FoldersComposer;
use Illuminate\Support\Facades\Gate;
//use App\Folder;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        

        ///enable this to add the user with permission;
               ///Role::create(['name'=>'Admin']);
               ///Role::create(['name'=>'Director']);
               ///Role::create(['name'=>'Registrar']);
               ///Role::create(['name'=>'Cashier']);
               ///Role::create(['name'=>'Academic-Head']);


            //    Permission::create(['name'=>'Director Permission']);
            //    Permission::create(['name'=>'Registrar Permission']);
            //    Permission::create(['name'=>'Cashier Permission']);
            //    Permission::create(['name'=>'Academic-Head Permission']);



        /* Add Permission to Role*/
        /* Select the Role and Permision 1 by 1 and give the permission*/

            //    $role = Role::findorfail(5);
            //    $permission = Permission::findorfail(4);
            //    $role->givePermissionTo($permission);


        
        // Option - 1:  Every single view.
        // View::share('folders', Folder::with('subfolders')->get());
        // Option - 2: Specific Views Only.
        // View::composer(['layouts._sidebar'], function($view){
        //     $view->with('folders', Folder::with('subfolders')->get());
        // });
        // Option - 3 : Dedicated Class
        



        //$userrole = auth()->user()->role;
        //$userRole = Auth::user()->id;
        //dd($userRole);

       
        
        
        View::composer(['AAAstisla.layouts._sidebar'], FoldersComposer::class);


    }
}
