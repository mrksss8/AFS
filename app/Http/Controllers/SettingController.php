<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Roles;
use App\User;
class SettingController extends Controller
{
    //

    public function index(){
        $users = User::all();
        $roles = Roles::all();
        return view('AAAstisla.settings.index', compact('roles', 'users'));

    }

    public function store(Request $request){
        $user = User::findOrfail($request->userid);
        $user->assignRole($request->folderrole);
        
        
        
        return redirect()->route('dashboard.index');


        
    }
}
