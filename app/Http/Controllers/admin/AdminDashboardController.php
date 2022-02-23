<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\UserRole;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function allUsers(){
        $data   =   [
            'users' =>  User::orderBy('id', 'DESC')->get(),
        ];
        return view('admin.users.index',$data);
    }
    public function allRoles(){
        $data   =   [
            'roles' =>  UserRole::all()
        ];
        return view('admin.roles.index',$data);
    }
}
