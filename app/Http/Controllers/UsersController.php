<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
