<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'users' => User::all()
        ]);
    }
}
