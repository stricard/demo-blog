<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $name = $request['name'] ?? null;
        $email = $request['email'] ?? null;
        //echo $name . ' - ' . $email;

        $userRequest = Request::create('api/users', 'POST', [
            'name' => $name,
            'email' => $email
        ]);
        $result = json_decode(Route::dispatch($userRequest)->getContent());
        dd($result);
    }
}
