<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserLogoutController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('pont')){
            //Cộng lại điểm cho user bằng session pont
            $user = User::findOrFail(auth()->user()->id);
            $user->update(['pont' => $user->pont + $request->session()->get('pont')]);
            $request->session()->forget('pont');
        }
        Auth::logout();
        return redirect()->route('user.home.index');
    }
}
