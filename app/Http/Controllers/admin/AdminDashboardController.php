<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminDashboardController extends Controller
{
    public function index(){
        // print_r(Route::currentRouteName());exit;
        return view('admin.index');
    }
}
