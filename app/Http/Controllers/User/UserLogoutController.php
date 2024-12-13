<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{
    public function index(){
        Auth::logout();
        return redirect()->route('user.home.index');
    }
}
