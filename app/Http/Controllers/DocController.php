<?php

namespace App\Http\Controllers;


class DocController extends Controller
{
    public function swagger()
    {
        return view('doc-swagger', []);
    }
}
