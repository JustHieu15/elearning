<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Test;

class HomeController extends Controller
{
    public function index()
    {
        $tests = Test::orderBy('id', 'desc')->limit(6)->get();

        return view('client.index', compact('tests'));
    }
}
