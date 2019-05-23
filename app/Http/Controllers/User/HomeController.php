<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        if(Auth::user()){
            $name = Auth::user()->name;
            return view('User.index',compact('name'));
        }else {
            return view('User.index');
        }
        

    }

    public function profile()
    {
        $this->data['name'] = Auth::user()->name;
        $this->data['email'] = Auth::user()->email;
        
        return view('User.profile', $this->data);

    }
}
